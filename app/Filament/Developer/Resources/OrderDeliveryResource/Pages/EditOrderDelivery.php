<?php

namespace App\Filament\Developer\Resources\OrderDeliveryResource\Pages;

use App\Filament\Developer\Resources\OrderDeliveryResource;
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

        // $order = $this->parent;
        // $filteredAssignees = $order->assignees->filter(function ($user) {
        //     return $user->can('manage-order-deliveries');
        // });

        // $orderAllUsers = User::permission('order-all')->get();

        // $combinedUsers = $filteredAssignees->merge($orderAllUsers);

        // $notified_users = $combinedUsers->unique('id');

        // $order_number = $this->parent->order_number;
        // $user = Auth::user()->name;
        // $notification = Notification::make()
        // ->title('Delivery update! '.$order_number)
        // ->body($user.' update a delivery '.$order_number)
        // ->actions([
        //     Action::make('View')
        //         ->button()
        //         ->color('primary')
        //         ->url(route('filament.admin.resources.orders.order-deliveries.edit', ['parent' => $this->parent, 'record' => $this->record]))
        //         ->label('View Order Delivery'),
        // ])
        // ->sendToDatabase($notified_users);

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
