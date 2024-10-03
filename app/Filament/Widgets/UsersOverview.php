<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\User;
use App\Models\Order;
use App\Models\Permission;
use Filament\Widgets\StatsOverviewWidget\Card;
use App\Models\Role;
use App\Models\Design;
use App\Models\OrderDelivery;
use App\Models\OrderQuotation;
use App\Models\Development  ;

class UsersOverview extends BaseWidget
{
    protected static bool $isLazy = false;


 protected int | string | array $columnSpan = 'full';

    protected function getCards(): array
    {
        return [
            Card::make('Total Users', User::count())
            ->description('+5 users this month')
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ->chartColor('success')
            ->color('success')
            ->extraAttributes([
                'class' => 'rounded-lg shadow-lg p-4 bg-white',
            ])
            ->icon('heroicon-s-user-group'),

            Card::make('Total Roles', Role::count())
            ->description('+2 roles added this month')
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ->chartColor('success')
            ->color('success')
            ->extraAttributes([
                'class' => 'rounded-lg shadow-lg p-4 bg-white',
            ])
            ->icon('heroicon-s-user-circle'),



            Card::make('Total Permissions', Permission::count())
            ->description('+25 permissions granted this month')
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ->chartColor('success')
            ->color('success')
            ->extraAttributes([
                'class' => 'rounded-lg shadow-lg p-4 bg-white',
            ])
            ->icon('heroicon-s-shield-check'),



            Card::make('Total Orders', Order::count())
            ->description('+22 orders this month')
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ->chartColor('yee')
            ->color('yee')
            ->extraAttributes([
                'class' => 'rounded-lg shadow-lg p-4 bg-white',
            ])
            ->icon('heroicon-s-shopping-cart'),

            Card::make('Total Order Deliveries', OrderDelivery::count())
            ->description('+8 orders deliveries this month')
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ->chartColor('yee')
            ->color('yee')
            ->extraAttributes([
                'class' => 'rounded-lg shadow-lg p-4 bg-white',
            ])
            ->icon('heroicon-s-archive-box-arrow-down'),

            Card::make('Total Order Quotations', OrderQuotation::count())
            ->description('+8 orders quotations this month')
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ->chartColor('yee')
            ->color('yee')
            ->extraAttributes([
                'class' => 'rounded-lg shadow-lg p-4 bg-white',
            ])
            ->icon('heroicon-s-document-text'),

        ];
    }
}
