<?php

namespace App\Filament\Resources\OrderDeliveryResource\Pages;

use App\Filament\Resources\OrderDeliveryResource;
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
            ->visible(fn () => auth()->user()->hasPermissionTo('can-comment-on-order-delivery')),
        ];
    }
}
