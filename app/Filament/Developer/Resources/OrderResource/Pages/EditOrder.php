<?php

namespace App\Filament\Developer\Resources\OrderResource\Pages;

use App\Filament\Developer\Resources\OrderResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Models\Design;
use App\Models\Development;
use App\Models\Order;
use Illuminate\Database\Eloquent\Model;

class EditOrder extends EditRecord
{
    protected static string $resource = OrderResource::class;

    // protected function getHeaderActions(): array
    // {
    //     return [
    //         Actions\DeleteAction::make(),
    //     ];
    // }

    public function mount(string|int $record): void
    {
        parent::mount($record);

        $this->form->fill($this->record->toArray());

        if ($this->record->service_id == 1) {
            $design = Design::where('project_id', $this->record->id)->first();
            if ($design) {
                $this->form->fill([
                    'title' => $design->title,
                    'category_id' => $design->category_id,
                    'status' => $design->status,
                    'file' => $design->file,
                    'deadline' => $design->deadline,
                    'description' => $design->description,
                    'service_type' => 'design',
                ]);
            }
        } elseif ($this->record->service_id == 2) {
            $development = Development::where('project_id', $this->record->id)->first();
            if ($development) {
                $this->form->fill([
                    'title' => $development->title,
                    'server_credential' => $development->server_credential,
                    'status' => $development->status,
                    'code_repository_url' => $development->code_repository_url,
                    'deadline' => $development->deadline,
                    'file' => $development->file,
                    'description' => $development->description,
                    'service_type' => 'development',
                ]);
            }
        }
    }
    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        $order = parent::handleRecordUpdate($record, $data);

        if ($record->service_id == 1) {
            $design = Design::where('project_id', $record->id)->first();
            if ($design) {
                $design->update([
                    'title' => $data['title'],
                    'category_id' => $data['category_id'],
                    'status' => $data['status'],
                    'file' => $data['file'],
                    'deadline' => $data['deadline'],
                    'description' => $data['description'],
                ]);
            }
        } elseif ($record->service_id == 2) {
            $development = Development::where('project_id', $record->id)->first();
            if ($development) {
                $development->update([
                    'title' => $data['title'],
                    'server_credential' => $data['server_credential'],
                    'status' => $data['status'],
                    'code_repository_url' => $data['code_repository_url'],
                    'deadline' => $data['deadline'],
                    'description' => $data['description'],
                ]);
            }
        }

        return $order;
    }

    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }

}
