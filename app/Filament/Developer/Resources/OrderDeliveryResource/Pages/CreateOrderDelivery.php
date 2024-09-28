<?php

namespace App\Filament\Developer\Resources\OrderDeliveryResource\Pages;

use App\Filament\Developer\Resources\OrderDeliveryResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
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


class CreateOrderDelivery extends CreateRecord
{
    protected static string $resource = OrderDeliveryResource::class;

    use HasParentResource;


    protected function getRedirectUrl(): string
    {
        $order = $this->parent;
        $filteredAssignees = $order->assignees->filter(function ($user) {
            return $user = Permission::where('name','manage-order-deliveries')->first();
        });

        $orderAllUsers = Permission::where('name','order-all')->first();

        $combinedUsers = $filteredAssignees->merge($orderAllUsers);

        $notified_users = $combinedUsers->unique('id');

        $order_number = $this->parent->order_id;
        $user = Auth::user()->name;
        $notification = Notification::make()
        ->title('Order delivery! '.$order_number)
        ->body($user.'  has delivered '.$order_number)
        ->actions([
            Action::make('View')
                ->button()
                ->color('primary')
                ->url(route('filament.admin.resources.orders.order-deliveries.edit', ['parent' => $this->parent, 'record' => $this->record]))
                ->label('View Order Delivery'),
        ])
        ->sendToDatabase($notified_users);

        $commentId = DB::table('filament_comments')->insertGetId(
            [
                'user_id'    =>   1,
                'subject_type'     =>  'App\Models\Order',
                'subject_id'     =>   2,
                'comment'     =>    $order_number.' order has been delivered',
                'created_at'     =>   '2024-09-02 15:14:00',
                'updated_at'   =>   '2024-09-02 15:14:00'
            ]
        );


        return $this->previousUrl ?? static::getParentResource()::getUrl('order-deliveries.index', [
            'parent' => $this->parent,
        ]);
    }

    // This can be moved to Trait, but we are keeping it here
    //   to avoid confusion in case you mutate the data yourself
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Set the parent relationship key to the parent resource's ID.
        $data[$this->getParentRelationshipKey()] = $this->parent->id;

        return $data;
    }
}
