<?php

namespace App\Filament\Resources\DevelopmentResource\Pages;

use App\Filament\Resources\DevelopmentResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateDevelopment extends CreateRecord
{
    protected static string $resource = DevelopmentResource::class;

    protected function getRedirectUrl():string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }
}
