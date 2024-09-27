<?php

namespace App\Filament\Resources\OrderQuotationResource\Pages;

use App\Filament\Resources\OrderQuotationResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use App\Filament\Resources\OrderResource;
use App\Filament\Traits\HasParentResource;
use Parallax\FilamentComments\Actions\CommentsAction;


class ViewOrderQuotation extends ViewRecord
{
    use HasParentResource;

    public static string $parentResource = OrderResource::class;

    protected static string $resource = OrderQuotationResource::class;

    protected function getHeaderActions(): array
{
    return [
        CommentsAction::make()->label('Comments')->color('info'),
        // Actions\EditAction::make()
        //     ->visible(fn () => ! request()->routeIs('filament.client.resources.orders.order-quotations.view'))
        //     ->label('Edit Order Quotation')
        //     ->button()
        //     ->url(
        //         fn (\App\Models\OrderQuotation $record): string => static::$parentResource::getUrl('order-quotations.edit', [
        //             'record' => $record,
        //             'parent' => request()->route('parent'),
        //         ])
        //     ),
    ];
}


}

