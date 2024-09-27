<?php

namespace App\Filament\Client\Resources\OrderResource\Pages;

use App\Filament\Client\Resources\OrderResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Models\Development;
use App\Models\Design;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Filament\Notifications\Notification;
use Filament\Notifications\Actions\Action;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Filament\Support\Enums\IconPosition;

class CreateOrder extends CreateRecord
{
    protected static string $resource = OrderResource::class;

    protected function handleRecordCreation(array $data): Order
    {
        $order = parent::handleRecordCreation($data);

        if ($data['service_id'] == 1) {
            Design::create([
                'designer_id' => $order->user_id,
                'project_id' => $order->id,
                'title' => $data['title'],
                'category_id' => $data['design']['category_id'],
                'status' => $data['status'] ?? 'Pending',
                'file' => $data['file'],
                'deadline' => $data['deadline'],
                'description' => $data['description'],
            ]);
        } elseif ($data['service_id'] == 2) {
            Development::create([
                'developer_id' => $order->user_id,
                'project_id' => $order->id,
                'title' => $data['title'],
                'status' => $data['status'] ?? 'Pending',
                'file' => $data['file'],
                'code_repository_url' => $data['code_repository_url'],
                'deadline' => $data['deadline'],
                'description' => $data['description'],
            ]);
        }

        return $order;
    }

    protected function getRedirectUrl(): string
    {
        $name = Auth::user()->name;
        Notification::make()
           ->title('New Order!')
           ->body($name.' create a new order.')
           ->actions([
               Action::make('View Order')
                   ->button()
                   ->icon('heroicon-s-folder')
                   ->iconPosition(IconPosition::After)
                   ->url(route('filament.admin.resources.orders.view', ['record' => $this->record]))
                   ->color('primary')
                   ->label('View Order'),
           ])
           ->sendToDatabase(User::where('name', 'admin')->first());


           Notification::make()
            ->title('Order Brief has been created we will update you soon.')
            ->success()
            ->send();

        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }
}
