<?php

namespace App\Filament\Client\Resources\OrderQuotationResource\Pages;

use App\Filament\Client\Resources\OrderQuotationResource;
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
use Auth;


class EditOrderQuotation extends EditRecord
{
    use HasParentResource;


    protected static string $resource = OrderQuotationResource::class;

    protected function getRedirectUrl(): string
    {
        // $orderQuotation = $this->record;
        // if ($orderQuotation->status) {
        //     $adminUsers = User::where('role_id', 1)->get();
        //     $notification = Notification::make()
        //         ->title('Order Quotation Status Updated!')
        //         ->body('The status of quotation #' . $orderQuotation->quotation_number . ' has been updated to ' . $orderQuotation->status . ' by ' .Auth::user()->name)
        //         ->actions([
        //             Action::make('View')
        //                 ->button()
        //                 ->icon('heroicon-s-folder')
        //                 ->color('primary')
        //                 ->url(route('filament.admin.resources.orders.order-quotations.view', [
        //                     'parent' => $this->parent->id,
        //                     'record' => $orderQuotation->id,
        //                 ]))
        //                 ->label('View Quotation'),
        //         ]);

        //     foreach ($adminUsers as $user) {
        //         $notification->sendToDatabase($user);
        //     }
        // }



        return $this->previousUrl ?? static::getParentResource()::getUrl('order-quotations.index', [
            'parent' => $this->parent,
        ]);
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
