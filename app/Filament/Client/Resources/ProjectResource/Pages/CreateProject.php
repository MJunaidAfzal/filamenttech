<?php

namespace App\Filament\Client\Resources\ProjectResource\Pages;

use App\Filament\Client\Resources\ProjectResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;
use Filament\Notifications\Notification;
use App\Models\User;

class CreateProject extends CreateRecord
{
    protected static string $resource = ProjectResource::class;

    protected function getRedirectUrl():string
    {
        $name = Auth::user()->name;
         Notification::make()
            ->title('Project Created By'.$name)
            ->body('New Project Has Been Saved')
            ->sendToDatabase(User::where('name', 'admin')->first());

        return $this->previousUrl ?? $this->getResource()::getUrl('index');

    }
}
