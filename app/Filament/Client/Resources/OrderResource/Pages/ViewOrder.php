<?php

namespace App\Filament\Client\Resources\OrderResource\Pages;

use App\Filament\Client\Resources\OrderResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use App\Models\Order;
use App\Models\Design;
use App\Models\Development;

class ViewOrder extends ViewRecord
{
    protected static string $resource = OrderResource::class;

    public function mount(string|int $record): void
    {
        parent::mount($record);

        $this->form->fill($this->record->toArray());

        if ($this->record->service_id == 1) {
            $design = Design::where('project_id', $this->record->id)->first();
            if ($design) {
                $this->form->fill([
                    'title' => $design->title,
                    'category' => $design->category,
                    'status' => $design->status,
                    'file' => $design->file,
                    'feedback' => $design->feedback,
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
                    'status' => $development->status,
                    'version' => $development->version,
                    'code_repository_url' => $development->code_repository_url,
                    'feedback' => $development->feedback,
                    'deadline' => $development->deadline,
                    'file' => $development->file,
                    'description' => $development->description,
                    'service_type' => 'development',
                ]);
            }
        }
    }
}
