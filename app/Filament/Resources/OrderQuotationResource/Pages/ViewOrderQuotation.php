<?php

namespace App\Filament\Resources\OrderQuotationResource\Pages;

use App\Filament\Resources\OrderQuotationResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use App\Filament\Resources\OrderResource;
use App\Filament\Traits\HasParentResource;


class ViewOrderQuotation extends ViewRecord
{
    use HasParentResource;

    public static string $parentResource = OrderResource::class;

    protected static string $resource = OrderQuotationResource::class;

    protected function getHeaderActions(): array
{
    return [
        Actions\EditAction::make()
            ->label('Edit Order Quotation')
            ->button()
            ->url(
                fn (\App\Models\OrderQuotation $record): string => static::$parentResource::getUrl('order-quotations.edit', [
                    'record' => $record,
                    'parent' => request()->route('parent'),
                ])
            ),
    ];
}

}
