<?php

namespace App\Filament\Client\Resources\ProjectTypeResource\Pages;

use App\Filament\Client\Resources\ProjectTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProjectType extends EditRecord
{
    protected static string $resource = ProjectTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
