<?php

namespace App\Filament\Client\Resources\OrderDeliveryResource\Pages;

use App\Filament\Client\Resources\OrderDeliveryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\OrderResource;
use App\Filament\Traits\HasParentResource;
use Illuminate\Support\Facades\Auth;
use Filament\Notifications\Notification;
use App\Models\User;
use App\Models\RoleHasPermission;
use Filament\Notifications\Actions\Action;
use App\Models\OrderAssignee;
use Illuminate\Support\Facades\DB;
use App\Models\Permission;

class EditOrderDelivery extends EditRecord
{
    use HasParentResource;

    protected static string $resource = OrderDeliveryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {

        $permissionIds = Permission::whereIn('name', ['order-all', 'view-order-deliveries'])->pluck('id');
        $roleIdsWithPermission = RoleHasPermission::whereIn('permission_id', $permissionIds)->pluck('role_id');
        $usersWithPermission = User::whereIn('role_id', $roleIdsWithPermission)->get();
        $order_number = $this->parent->order_id;
        foreach ($usersWithPermission as $user) {
            if ($user->role_id == 1) {
                $url = route('filament.admin.resources.orders.order-deliveries.view', [
                    'parent' => $this->parent->id,
                    'record' => $this->record->id,
                ]);
            }
            elseif ($user->role_id == 2) {
                $url = route('filament.developer.resources.orders.order-deliveries.view', [
                    'parent' => $this->parent->id,
                    'record' => $this->record->id,
                ]);
            }
            elseif ($user->role_id == 4) {
                $url = route('filament.client.resources.orders.order-deliveries.view', [
                    'parent' => $this->parent->id,
                    'record' => $this->record->id,
                ]);
            }
            $notification = Notification::make()
            ->title('Order delivery updated! ' . $order_number)
            ->body(Auth::user()->name . ' has updated order delivery ' . $order_number)
            ->actions([
                Action::make('View Order Delivery')
                    ->button()
                    ->icon('heroicon-s-folder')
                    ->color('brown')
                    ->url($url)
                    ->label('View Order Delivery'),
            ]);

            if ($user->role_id == 1) {
                $notification->sendToDatabase($user);
            }
            elseif ($user->role_id == 2) {
                if ($this->parent->assignees()->where('user_id', $user->id)->exists()) {
                    $notification->sendToDatabase($user);
                }
            }
            elseif ($user->role_id == 4 && $this->parent->user_id == $user->id) {
                $notification->sendToDatabase($user);
            }
        }

        $commentId = DB::table('filament_comments')->insertGetId(
            [
                'user_id'    =>   1,
                'subject_type'     =>  'App\Models\Order',
                'subject_id'     =>   2,
                'comment'     =>   $order_number .' order delivery has been updated',
                'created_at'     =>   '2024-09-02 15:14:00',
                'updated_at'   =>   '2024-09-02 15:14:00'
            ]
        );

        return $this->previousUrl ?? static::getParentResource()::getUrl('order-deliveries.index', [
            'parent' => $this->parent,
        ]);
    }

    protected function configureDeleteAction(Actions\DeleteAction $action): void
    {
        $resource = static::getResource();

        $action->authorize($resource::canDelete($this->getRecord()))
            ->successRedirectUrl(static::getParentResource()::getUrl('order-deliveries.index', [
                'parent' => $this->parent,
            ]));
    }
}
