<?php

namespace App\Filament\Developer\Resources\ProjectResource\Pages;

use App\Filament\Developer\Resources\ProjectResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProject extends CreateRecord
{
    protected static string $resource = ProjectResource::class;

    protected function getRedirectUrl():string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }
}
