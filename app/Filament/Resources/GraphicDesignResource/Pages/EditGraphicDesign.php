<?php

namespace App\Filament\Resources\GraphicDesignResource\Pages;

use App\Filament\Resources\GraphicDesignResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGraphicDesign extends EditRecord
{
    protected static string $resource = GraphicDesignResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
