<?php

namespace App\Filament\Client\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderDelivery;
use App\Models\OrderQuotation;
use App\Models\Permission;
use Filament\Widgets\StatsOverviewWidget\Card;
use Auth;

class OrdersOverview extends BaseWidget
{
    protected static bool $isLazy = false;


    protected function getStats(): array
    {

        return [
            Card::make('My Orders', Order::where('user_id', Auth::user()->id)->count())
            ->description(' Make +2 orders in this month')
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ->chartColor('primary')
            ->color('primary')
            ->extraAttributes([
                'class' => 'rounded-lg shadow-lg p-4 bg-white',
            ])
            ->icon('heroicon-s-shopping-cart'),

            Card::make('My Orders Deliveries', OrderDelivery::where('user_id', Auth::user()->id)->count())
            ->description('+10 orders delivered in this month')
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ->chartColor('primary')
            ->color('primary')
            ->extraAttributes([
                'class' => 'rounded-lg shadow-lg p-4 bg-white',
            ])
            ->icon('heroicon-s-archive-box-arrow-down'),

            Card::make('Orders Quotations Approved', OrderQuotation::where('approved_by',auth()->user()->id)->count())
            ->description('+3 quotations approved in this month')
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ->chartColor('primary')
            ->color('primary')
            ->extraAttributes([
                'class' => 'rounded-lg shadow-lg p-4 bg-white',
            ])
            ->icon('heroicon-s-document-text'),
        ];
    }
}
