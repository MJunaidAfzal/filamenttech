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
use Filament\Actions;
use App\Models\RoleHasPermission;
use App\Models\Permission;

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
                'server_credential' => $data['server_credential'],
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

        $permissionIds = Permission::whereIn('name', ['order-all'])->pluck('id');
        $roleIdsWithPermission = RoleHasPermission::whereIn('permission_id', $permissionIds)->pluck('role_id');
        $usersWithPermission = User::whereIn('role_id', $roleIdsWithPermission)->get();
        $orderId = $this->record->order_id;
        foreach ($usersWithPermission as $user) {
            if ($user->role_id == 1) {
                $url = route('filament.admin.resources.orders.view', [
                    'record' => $this->record->id,
                ]);
            }
            elseif ($user->role_id == 2) {
                $url = route('filament.developer.resources.orders.view', [
                    'record' => $this->record->id,
                ]);
            }
            elseif ($user->role_id == 4) {
                $url = route('filament.client.resources.orders.view', [
                    'record' => $this->record->id,
                ]);
            }
            $name = Auth::user()->name;
            $notification = Notification::make()
               ->title('New Order!')
               ->body($name.' create a new order '. $orderId)
            ->actions([
                Action::make('View')
                   ->button()
                   ->icon('heroicon-s-folder')
                   ->iconPosition(IconPosition::After)
                   ->url($url)
                   ->color('brown')
                   ->label('View Order'),
            ]);

            if ($user->role_id == 1) {
                $notification->sendToDatabase($user);

            }
            elseif ($user->role_id == 2) {
                if ($this->record->assignees()->where('user_id', $user->id)->exists()) {
                    $notification->sendToDatabase($user);
                }
            }
             elseif ($user->role_id == 4 && $this->record->user_id == $user->id) {
                $notification->sendToDatabase($user);
            }
        }


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
                       ->color('brown')
                       ->url(route('filament.developer.resources.orders.view', ['record' => $this->record]))
                       ->label('View Order')
                       ->icon('heroicon-s-folder'),
               ])
               ->sendToDatabase($usersWithOrderAssignee);

        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }
}
