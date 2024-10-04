<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOrders extends ListRecords
{
    protected static string $resource = OrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->color('brown')
            ->icon('heroicon-s-archive-box')
            ->visible(fn () => auth()->user()->role->hasPermissionTo('create-order'))
            ,
        ];
    }
}
