<?php

namespace App\Filament\Developer\Resources\OrderResource\Pages;

use App\Filament\Developer\Resources\OrderResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOrders extends ListRecords
{
    protected static string $resource = OrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->visible(fn () => auth()->user()->hasPermissionTo('create-order')),
        ];
    }
}
