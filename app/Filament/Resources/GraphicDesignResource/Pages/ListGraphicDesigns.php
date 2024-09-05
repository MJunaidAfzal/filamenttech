<?php

namespace App\Filament\Resources\GraphicDesignResource\Pages;

use App\Filament\Resources\GraphicDesignResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGraphicDesigns extends ListRecords
{
    protected static string $resource = GraphicDesignResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
