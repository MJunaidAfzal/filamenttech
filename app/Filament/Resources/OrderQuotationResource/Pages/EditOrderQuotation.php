<?php

namespace App\Filament\Resources\OrderQuotationResource\Pages;

use App\Filament\Resources\OrderQuotationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\OrderResource;
use App\Filament\Traits\HasParentResource;
use App\Models\User;
use App\Models\OrderQuotation;
use App\Models\RoleHasPermission;
use App\Models\Permission;
use Filament\Notifications\Notification;
use Filament\Forms\Components\Select;
use Filament\Notifications\Actions\Action;
// use Spatie\Permission\Models\Permission;
use Auth;



class EditOrderQuotation extends EditRecord
{
    use HasParentResource;

    protected static string $resource = OrderQuotationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }


    protected function getRedirectUrl(): string
    {

        $orderQuotation = $this->record;

        $permission = Permission::where('name', 'approve-order-quotation')->first();
        if ($permission) {
            $roleIdsWithPermission = RoleHasPermission::where('permission_id', $permission->id)->pluck('role_id');
            $usersWithPermission = User::whereIn('role_id', $roleIdsWithPermission)->get();
            $order_number = $this->parent->order_id;
            foreach ($usersWithPermission as $user) {
                if ($orderQuotation->approved_by == $user->id) {
                    $notification = Notification::make()
                        ->title('Quotation Approved!')
                        ->body('Quotation #' .  $orderQuotation->quotation_number . ' has been approved by ' . Auth::user()->name . '.')
                        ->actions([
                            Action::make('View')
                                ->button()
                                ->icon('heroicon-s-folder')
                                ->color('primary')
                                ->url(route('filament.client.resources.orders.order-quotations.view', [
                                    'parent' => $this->parent->id,
                                    'record' => $orderQuotation->id,
                                ]))
                                ->label('View Quotation'),
                        ]);
                    $notification->sendToDatabase($user);
                }
            }

        return $this->previousUrl ?? static::getParentResource()::getUrl('order-quotations.index', [
            'parent' => $this->parent,
        ]);
    }
    }


    protected function configureDeleteAction(Actions\DeleteAction $action): void
    {
        $resource = static::getResource();

        $action->authorize($resource::canDelete($this->getRecord()))
            ->successRedirectUrl(static::getParentResource()::getUrl('order-quotations.index', [
                'parent' => $this->parent,
            ]));
    }


}
