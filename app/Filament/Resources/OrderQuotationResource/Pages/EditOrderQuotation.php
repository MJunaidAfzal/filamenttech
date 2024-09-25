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

class EditOrderQuotation extends EditRecord
{
    use HasParentResource;

    protected static string $resource = OrderQuotationResource::class;

    protected function getRedirectUrl(): string
    {

        $orderQuotation = $this->record;
        $approvedByUser = User::find($orderQuotation->approved_by);
        $permission = Permission::where('name', 'approve-order-quotation')->first();
        dd($approvedByUser);
        if ($approvedByUser && $permission) {
            $notification = Notification::make()
                ->title('Quotation Approved!')
                ->body('Quotation #' . $orderQuotation->quotation_number . ' has been sent for approval.')
                ->actions([
                    Action::make('View')
                        ->button()
                        ->color('primary')
                        ->icon('heroicon-s-folder')
                        ->url(route('filament.admin.resources.orders.order-quotations.view', [
                            'parent' => $this->parent->id,
                            'record' => $this->record->id,
                        ]))
                        ->label('View Quotation'),
                ]);

            $notification->sendToDatabase($approvedByUser);
        }

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

    // public function afterSave()
    // {

    // }

}
