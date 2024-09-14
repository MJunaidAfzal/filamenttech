<?php

namespace App\Filament\Resources\ProjectResource\Pages;

use App\Filament\Resources\ProjectResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;
use Filament\Notifications\Actions\Action;
use App\Models\User;
use App\Models\ProjectAssignee;
use Illuminate\Support\Facades\Auth;
use Filament\Support\Enums\IconPosition;


class CreateProject extends CreateRecord
{
    protected static string $resource = ProjectResource::class;

    protected function getRedirectUrl():string
    {

        $name = Auth::user()->name;
        Notification::make()
           ->title('New Project!')
           ->body($name.' create a new project.')
           ->actions([
               Action::make('View')
                   ->button()
                   ->icon('heroicon-s-folder')
                   ->iconPosition(IconPosition::After)
                   ->url(route('filament.admin.resources.projects.view', ['record' => $this->record]))
                   ->color('primary')
                   ->label('View Project'),
           ])
           ->sendToDatabase(User::where('id', auth()->user()->id)->first());

           $projectId = $this->record->id;
           $projectAssignees = ProjectAssignee::where('project_id', $projectId)->pluck('user_id');
           $usersWithProjectAssignee = User::whereIn('id', $projectAssignees)->get();

           $name = Auth::user()->name;
           $notification = Notification::make()
               ->title('Project assigned!')
               ->body($name.' assigned a project to you')
               ->actions([
                   Action::make('View')
                       ->button()
                       ->url(route('filament.developer.resources.projects.edit', ['record' => $this->record]))
                       ->color('primary')
                       ->label('View Project')
                       ->icon('heroicon-s-folder'),
               ])
               ->sendToDatabase($usersWithProjectAssignee);

        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }

}
