<?php

namespace App\Filament\Resources\DevelopmentResource\Pages;

use App\Filament\Resources\DevelopmentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDevelopment extends EditRecord
{
    protected static string $resource = DevelopmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl():string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }
}
