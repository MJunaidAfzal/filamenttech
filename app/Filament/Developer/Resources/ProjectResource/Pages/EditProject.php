<?php

namespace App\Filament\Developer\Resources\ProjectResource\Pages;

use App\Filament\Developer\Resources\ProjectResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProject extends EditRecord
{
    protected static string $resource = ProjectResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl():string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }
}
