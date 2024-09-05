<?php

namespace App\Filament\Client\Resources\ProjectResource\Pages;

use App\Filament\Client\Resources\ProjectResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;
use Filament\Notifications\Notification;
use App\Models\User;
use App\Models\Service;
use App\Models\Attachment;
use App\Models\Platform;
use Filament\Forms\Form;
use Filament\Forms\Components\Tabs;
use Filament\Support\Enums\IconPosition;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\Actions;
use Filament\Forms\Components\Actions\Action;

class CreateProject extends CreateRecord
{
    protected static string $resource = ProjectResource::class;

    protected function getRedirectUrl():string
    {

        $name = Auth::user()->name;
         Notification::make()
            ->title('Project Created By '.$name)
            ->body('New Project Has Been Saved')
            ->sendToDatabase(User::where('name', 'admin')->first());

        return $this->previousUrl ?? $this->getResource()::getUrl('index');

    }

    // public function form(Form $form): Form
    // {
        // $services = Service::get()->pluck('id')->toArray();

        // $tabs = [];

        // foreach ($services as $serviceId) {
        //     $serviceName = Service::find($serviceId)->name;
        //     $tab = Tabs\Tab::make($serviceName)
        //         ->schema([]);

        //     if ($serviceId == 1) {
        //         $tab->schema([
        //         TextInput::make('name')
        //             ->required(),
        //         FileUpload::make('image')
        //             ->required()
        //             ->columnSpanFull()
        //             ->lazy(),
        //             Actions::make([
        //                 Action::make('Create Attachment')
        //                 ->icon('heroicon-o-folder')
        //                 ->iconPosition(IconPosition::After)
        //                 ->action(function () {
        //                     $data = $this->data;
        //                     $attachment = new Attachment();
        //                     $attachment->name = $data['name'];

        //                     if (isset($data['image'][0])) {
        //                         $attachment->image = $data['image'][0]->upload(
        //                             disk: 'attachments',
        //                             filename: function ($file) {
        //                                 return 'attachments/' . Str::uuid() . '.' . $file->getClientOriginalExtension();
        //                             }
        //                         );
        //                     } else {
        //                         $attachment->image = 'default-image.jpg';
        //                     }

        //                         $attachment->save();

        //                         Notification::make()
        //                         ->title('Attachment Created')
        //                         ->body('The attachment has been created successfully')
        //                         ->sendToDatabase(Auth::user());

        //                         return redirect()->route('filament.client.resources.projects.create');

        //                     }),
        //             ])
        //         ])
        //         ->icon('heroicon-o-folder')
        //         ->iconPosition(IconPosition::After);
        //         }



        //     $tabs[] = $tab;
        // }

    // }
}
