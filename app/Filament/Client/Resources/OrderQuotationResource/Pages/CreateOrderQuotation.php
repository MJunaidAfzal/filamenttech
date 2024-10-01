<?php

namespace App\Filament\Client\Resources\OrderQuotationResource\Pages;

use App\Filament\Client\Resources\OrderQuotationResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\OrderResource;
use App\Filament\Traits\HasParentResource;
use Illuminate\Support\Facades\Auth;
use Filament\Notifications\Notification;
use App\Models\User;
use App\Models\RoleHasPermission;
use App\Models\Permission;
use Filament\Notifications\Actions\Action;

class CreateOrderQuotation extends CreateRecord
{
    use HasParentResource;

    protected static string $resource = OrderQuotationResource::class;

    protected function getRedirectUrl(): string
    {

        $permission = Permission::where('name', 'view-order-quotation')->first();
        $roleIdsWithPermission = RoleHasPermission::where('permission_id', $permission->id)->pluck('role_id');
        $usersWithPermission = User::whereIn('role_id', $roleIdsWithPermission)->get();
        $order_number = $this->parent->order_id;
        foreach ($usersWithPermission as $user) {
            if ($user->role_id == 1) {
                $url = route('filament.admin.resources.orders.order-quotations.view', [
                    'parent' => $this->parent->id,
                    'record' => $this->record->id,
                ]);
            } elseif ($user->role_id == 4) {
                $url = route('filament.client.resources.orders.order-quotations.view', [
                    'parent' => $this->parent->id,
                    'record' => $this->record->id,
                ]);
            }
            $notification = Notification::make()
                ->title('New Quotation Created!')
                ->body(Auth::user()->name . ' create a new quotation for this order ' . $order_number . '.')
                ->actions([
                    Action::make('View')
                        ->button()
                        ->icon('heroicon-s-folder')
                        ->color('brown')
                        ->url($url)
                        ->label('View Quotation'),
                ]);

            if ($user->role_id == 1) {
                $notification->sendToDatabase($user);
            } elseif ($user->role_id == 4 && $this->parent->user_id == $user->id) {
                $notification->sendToDatabase($user);
            }
        }


        return $this->previousUrl ?? static::getParentResource()::getUrl('order-quotations.index', [
            'parent' => $this->parent,
        ]);
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data[$this->getParentRelationshipKey()] = $this->parent->id;

        return $data;
    }
}

