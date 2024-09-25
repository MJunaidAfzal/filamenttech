<?php

namespace App\Filament\Resources\OrderQuotationResource\Pages;

use App\Filament\Resources\OrderQuotationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\OrderResource;
use App\Filament\Traits\HasParentResource;

class ListOrderQuotations extends ListRecords
{
    use HasParentResource;

    protected static string $resource = OrderQuotationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->url(
                fn (): string => static::getParentResource()::getUrl('order-quotations.create', [
                    'parent' => $this->parent,
                ])
            ),
        ];
    }
}
