<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use Filament\Resources\Pages\CreateRecord;
use App\Models\Development;
use App\Models\Design;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Filament\Notifications\Notification;
use Filament\Notifications\Actions\Action;
use App\Models\User;
use App\Models\OrderAssignee;
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
                'category' => $data['category'],
                'status' => $data['status'],
                'file' => $data['file'],
                'feedback' => $data['feedback'],
                'deadline' => $data['deadline'],
                'description' => $data['description'],
            ]);
        } elseif ($data['service_id'] == 2) {
            Development::create([
                'developer_id' => $order->user_id,
                'project_id' => $order->id,
                'title' => $data['title'],
                'status' => $data['status'],
                'version' => $data['version'],
                'file' => $data['file'],
                'code_repository_url' => $data['code_repository_url'],
                'deadline' => $data['deadline'],
                'feedback' => $data['feedback'],
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
               Action::make('View')
                   ->button()
                   ->icon('heroicon-s-folder')
                   ->iconPosition(IconPosition::After)
                   ->url(route('filament.admin.resources.orders.view', ['record' => $this->record]))
                   ->color('primary')
                   ->label('View Order'),
           ])
           ->sendToDatabase(User::where('id', auth()->user()->id)->first());

           $orderId = $this->record->id;
           $orderAssignees = OrderAssignee::where('order_id', $orderId)->pluck('user_id');
           $usersWithOrderAssignee = User::whereIn('id', $orderAssignees)->get();

           $name = Auth::user()->name;
           $notification = Notification::make()
               ->title('Order assigned!')
               ->body($name.' assigned a order to you')
               ->actions([
                   Action::make('View')
                       ->button()
                       ->url(route('filament.developer.resources.orders.view', ['record' => $this->record]))
                       ->color('primary')
                       ->label('View Order')
                       ->icon('heroicon-s-folder'),
               ])
               ->sendToDatabase($usersWithOrderAssignee);

        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }
}
