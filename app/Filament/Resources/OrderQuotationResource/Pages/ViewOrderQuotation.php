<?php

namespace App\Filament\Resources\OrderQuotationResource\Pages;

use App\Filament\Resources\OrderQuotationResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use App\Filament\Resources\OrderResource;
use App\Filament\Traits\HasParentResource;
use Parallax\FilamentComments\Actions\CommentsAction;
use App\Filament\Client\Resources\OrderQuotationResource\Pages\EditOrderQuotation;
use App\Filament\Client\Resources\OrderQuotationResource\Pages\ListOrderQuotations;
use Filament\Support\Enums\IconPosition;
use Filament\Support\Enums\ActionSize;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use Filament\Notifications\Notification;
use Filament\Notifications\Notify;
use App\Models\User;
use Filament\Notifications\Actions\Action;




class ViewOrderQuotation extends ViewRecord
{
    use HasParentResource;

    public static string $parentResource = OrderResource::class;

    protected static string $resource = OrderQuotationResource::class;

    protected function getHeaderActions(): array
{
    return [


        Actions\Action::make('Start Order')
        ->visible(fn () => auth()->user()->role->hasPermissionTo('start-order-payment'))
            ->button()
            ->color('warning')
            ->icon('heroicon-s-arrow-right-start-on-rectangle')
            ->iconPosition(IconPosition::After)
            ->action(function ($record) {
                Stripe::setApiKey(env('STRIPE_SECRET'));

                $checkoutSession = Session::create([
                    'payment_method_types' => ['card'],
                    'line_items' => [[
                        'price_data' => [
                            'currency' => 'usd',
                            'product_data' => [
                               'name' => 'Order #' . $record->order->order_id . ' - Quotation #' . $record->quotation_number,
                            ],
                            'unit_amount' => $record->estimated_cost * 100,
                        ],
                        'quantity' => 1,
                    ]],
                    'mode' => 'payment',
                  'success_url' => route('filament.client.resources.orders.order-quotations.view', ['parent' => $record->order_id, 'record' => $record]),
                  'cancel_url' => route('filament.client.resources.orders.order-quotations.view', ['parent' => $record->order_id, 'record' => $record]),
                ]);

                $checkoutSession->save();

                $record->update(['status' => 'Approved']);

                if ($record->order->service_id == 1) {
                    $design = $record->order->design;
                    $design->update(['status' => 'In Progress']);
                } elseif ($record->order->service_id == 2) {
                    $development = $record->order->development;
                    $development->update(['status' => 'In Progress']);
                }

                Notification::make()
                ->title('Payment successful! Your order has been started.')
                ->success()
                ->send();

                $url = route('filament.admin.resources.orders.order-quotations.view', [
                    'parent' => $this->parent->id,
                    'record' => $this->record->id,

                ]);

                Notification::make()
                    ->title('Payment received for Order #' . $record->order->order_id)
                    ->body('Payment was successfully completed for Quotation #' . $record->quotation_number . '.')
                    ->actions([
                        Action::make('View Order Quotation')
                            ->button()
                            ->icon('heroicon-s-folder')
                            ->url($url)
                            ->color('brown')
                            ->label('View Order Quotation'),
                    ])
                    ->success()
                    ->sendToDatabase(User::where('role_id', 1)->first());


                return redirect($checkoutSession->url);
            }),


        CommentsAction::make()->label('Comments')->color('info')
        ->visible(fn () => auth()->user()->role->hasPermissionTo('can-comment-on-order-quotation'))
    ];
}


}

