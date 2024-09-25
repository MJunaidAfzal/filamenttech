<?php

namespace App\Filament\Resources\OrderQuotationResource\Pages;

use App\Filament\Resources\OrderQuotationResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use App\Filament\Traits\HasParentResource;


class ViewOrderQuotation extends ViewRecord
{
    use HasParentResource;

    protected static string $resource = OrderQuotationResource::class;

    // protected function getHeaderActions(): array
    // {
    //     return [
    //         Actions\EditAction::make()
    //             ->url(
    //                 fn (): string => static::getParentResource()::getUrl('order-quotations.view', [
    //                     'parent' => $this->parent,
    //                 ])
    //             ),
    //     ];
    // }
}
