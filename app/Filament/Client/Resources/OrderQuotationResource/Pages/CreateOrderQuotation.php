<?php

namespace App\Filament\Client\Resources\OrderQuotationResource\Pages;

use App\Filament\Client\Resources\OrderQuotationResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\OrderResource;
use App\Filament\Traits\HasParentResource;

class CreateOrderQuotation extends CreateRecord
{
    use HasParentResource;

    protected static string $resource = OrderQuotationResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? static::getParentResource()::getUrl('order-quotations.index', [
            'parent' => $this->parent,
        ]);
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data[$this->getParentRelationshipKey()] = $this->parent->id;

        return $data;
    }
}

