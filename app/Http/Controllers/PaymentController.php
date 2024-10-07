<?php

namespace App\Http\Controllers;

use App\Models\OrderQuotation;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function handleSuccess($recordId)
    {
        $record = OrderQuotation::findOrFail($recordId);

        (new \App\Filament\Resources\OrderQuotationResource\Pages\ViewOrderQuotation)->success($record);

        return redirect()->route('filament.client.resources.orders.order-quotations.view', ['parent' => $record->order_id, 'record' => $record->id]);
    }

    public function handleCancel($recordId)
    {
        $record = OrderQuotation::findOrFail($recordId);

        (new \App\Filament\Resources\OrderQuotationResource\Pages\ViewOrderQuotation)->cancel($record);

        return redirect()->route('filament.client.resources.orders.order-quotations.view', ['parent' => $record->order_id, 'record' => $record->id]);
    }
}
