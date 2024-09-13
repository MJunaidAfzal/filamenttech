<?php

namespace App\Filament\Resources\ProjectResource\Pages;

use App\Filament\Resources\ProjectResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Notifications\Notification;
use Filament\Notifications\Actions\Action;
use App\Models\User;
use App\Models\ProjectAssignee;
use Illuminate\Support\Facades\Auth;

class EditProject extends EditRecord
{
    protected static string $resource = ProjectResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];

    }

    protected function afterSave(): void
    {
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
    }

    protected function getRedirectUrl(): string
    {
        // $developerId = $this->record->user_id;
        // $user  = Auth::user()->name;
        // Notification::make()
        //     ->title('You are Asign By '.$user )
        //     ->body('Admin asign you for this Project')
        //     ->actions([
        //         Action::make('markAsUnread')
        //             ->button()
        //             ->markAsUnread(),
        //     ])
        //     ->sendToDatabase(User::where('id', $developerId)->get());

        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }
}
