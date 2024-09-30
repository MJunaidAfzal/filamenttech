<?php

namespace App\Filament\Resources\OrderDeliveryResource\Pages;

use App\Filament\Resources\OrderDeliveryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasParentResource;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use App\Models\Permission;
use App\Models\User;

class ListOrderDeliveries extends ListRecords
{
    protected static string $resource = OrderDeliveryResource::class;

    use HasParentResource;


    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->visible(fn () => auth()->user()->hasPermissionTo('create-order-deliveries'))
                ->url(
                    fn (): string => static::getParentResource()::getUrl('order-deliveries.create', [
                        'parent' => $this->parent,
                    ])
                ),
        ];
    }

    protected function getTableQuery(): Builder
    {

        $query = parent::getTableQuery();

        return $query->orderBy('id', 'DESC');

    }
}
