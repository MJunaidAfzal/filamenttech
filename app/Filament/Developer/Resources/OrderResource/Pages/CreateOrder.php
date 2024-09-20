<?php

namespace App\Filament\Developer\Resources\OrderResource\Pages;

use App\Filament\Developer\Resources\OrderResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateOrder extends CreateRecord
{
    protected static string $resource = OrderResource::class;
}
