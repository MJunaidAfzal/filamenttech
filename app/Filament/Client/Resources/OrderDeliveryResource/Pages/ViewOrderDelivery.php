<?php

namespace App\Filament\Client\Resources\OrderDeliveryResource\Pages;

use App\Filament\Client\Resources\OrderDeliveryResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use App\Filament\Traits\HasParentResource;
use Parallax\FilamentComments\Actions\CommentsAction;



class ViewOrderDelivery extends ViewRecord
{
    use HasParentResource;

    protected static string $resource = OrderDeliveryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CommentsAction::make()->label('Comments')->color('info')
            ->visible(fn () => auth()->user()->role->hasPermissionTo('can-comment-on-order-delivery')),
        ];
    }
}
