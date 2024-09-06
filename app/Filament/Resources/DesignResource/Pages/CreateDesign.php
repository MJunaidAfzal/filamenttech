<?php

namespace App\Filament\Resources\DesignResource\Pages;

use App\Filament\Resources\DesignResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateDesign extends CreateRecord
{
    protected static string $resource = DesignResource::class;

    protected function getRedirectUrl():string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }
}
