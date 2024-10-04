<?php

namespace App\Filament\Client\Resources\OrderResource\Pages;

use App\Filament\Client\Resources\OrderResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use App\Models\Order;
use App\Models\Design;
use App\Models\Development;
use Filament\Infolists;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\Actions\Action;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\RichEditor;
use Auth;
use Parallax\FilamentComments\Actions\CommentsAction;


class ViewOrder extends ViewRecord
{
    protected static string $resource = OrderResource::class;


    protected function getHeaderActions(): array
    {
        return [
            CommentsAction::make()->label('Comments')->color('info')
            ->visible(fn () => auth()->user()->role->hasPermissionTo('can-comment-on-order')),
        ];
    }

    public function infolist(Infolist $infolist): Infolist
    {

    $order = static::getModel()::find(request()->route('record'));

    $serviceType = null;
    if ($order) {
        $serviceType = $order->service_id == 1 ? 'design' : 'development';
    }

    return $infolist
        ->schema([
            Section::make('Order Info')
            ->columnSpan(12)
            ->schema([
                Infolists\Components\TextEntry::make('order_id')
                ->label('Order Number')
                ->formatStateUsing(function ($state) {
                    return new \Illuminate\Support\HtmlString("
                        <span style='color:#99cc00' class='font-semibold'>
                           $state
                        </span>
                    ");
                }),

                Infolists\Components\TextEntry::make('user.name')
                ->label('Order Created By')
                ->formatStateUsing(function ($state) {
                    return new \Illuminate\Support\HtmlString("
                        <span style='color:#99cc00' class='font-semibold'>
                           $state
                        </span>
                    ");
                }),
                Infolists\Components\TextEntry::make('service.name')
                ->label('Service Name')
                ->formatStateUsing(function ($state) {
                    return new \Illuminate\Support\HtmlString("
                        <span style='color:#99cc00' class='font-semibold'>
                           $state
                        </span>
                    ");
                }),
                Infolists\Components\TextEntry::make('assignees.name')
                ->label('Assignees Name')
                ->formatStateUsing(function ($state) {
                    return new \Illuminate\Support\HtmlString("
                        <span style='color:#99cc00' class='font-semibold'>
                           $state
                        </span>
                    ");
                }),

            ])->columns(2),

            Section::make('Service Details')
                ->columnSpan(12)
                ->schema(
                    $serviceType === 'design' ? [
                        Infolists\Components\TextEntry::make('design.title')
                            ->label('Project Title')
                            ->formatStateUsing(function ($state) {
                    return new \Illuminate\Support\HtmlString("
                        <span style='color:#99cc00' class='font-semibold'>
                            $state
                        </span>
                    ");
                }),
                            Infolists\Components\TextEntry::make('design.category.name')
                            ->label('Project Category')
                            ->formatStateUsing(function ($state) {
                                return new \Illuminate\Support\HtmlString("
                                    <span style='color:#99cc00' class='font-semibold'>
                                        $state
                                    </span>
                                ");
                            }),
                            Infolists\Components\TextEntry::make('design.status')
                            ->label('Status')
                            ->formatStateUsing(function ($state) {
                                return new \Illuminate\Support\HtmlString("
                                    <span style='color:#99cc00' class='font-semibold'>
                                        $state
                                    </span>
                                ");
                            }),
                            Infolists\Components\TextEntry::make('design.deadline')
                            ->label('Expented Daytime Date')
                            ->formatStateUsing(function ($state) {
                    return new \Illuminate\Support\HtmlString("
                        <span style='color:#99cc00' class='font-semibold'>
                            $state
                        </span>
                    ");
                }),

                    ] : [
                        Infolists\Components\TextEntry::make('development.title')
                            ->label('Project Title')
                            ->formatStateUsing(function ($state) {
                                return new \Illuminate\Support\HtmlString("
                                    <span style='color:#99cc00' class='font-semibold'>
                                        $state
                                    </span>
                                ");
                            }),
                            Infolists\Components\TextEntry::make('development.status')
                            ->label('Status')
                            ->formatStateUsing(function ($state) {
                                return new \Illuminate\Support\HtmlString("
                                    <span style='color:#99cc00' class='font-semibold'>
                                        $state
                                    </span>
                                ");
                            }),

                            Infolists\Components\TextEntry::make('development.server_credential')
                            ->label('Server Credential')
                            ->formatStateUsing(function ($state) {
                                return new \Illuminate\Support\HtmlString("
                                    <span style='color:#99cc00' class='font-semibold'>
                                        $state
                                    </span>
                                ");
                            }),

                            Infolists\Components\TextEntry::make('development.code_repository_url')
                            ->label('Code Repository URL')
                            ->formatStateUsing(function ($state) {
                                return new \Illuminate\Support\HtmlString("
                                    <span style='color:#99cc00' class='font-semibold'>
                                         <ins><a target='_blank' href='$state'>$state</a></ins>
                                    </span>
                                ");
                            }),
                            Infolists\Components\TextEntry::make('development.deadline')
                            ->label('Expented Daytime Date')
                            ->formatStateUsing(function ($state) {
                                return new \Illuminate\Support\HtmlString("
                                    <span style='color:#99cc00' class='font-semibold'>
                                        $state
                                    </span>
                                ");
                            }),

                    ]
                )->columns(2),

                Section::make('Order Details')
                ->columnSpan(12)
                ->schema(

                    $serviceType === 'design' ? [
                        TextEntry::make('design.file')
                        ->formatStateUsing(function ($state) {
                            $imageUrl = asset('storage/' . $state);
                            return new \Illuminate\Support\HtmlString("
                                <a href='$imageUrl' target='_blank'>
                                    <button type='button' style='padding: 8px 16px; background-color: #99cc00; color: black; border: none; cursor: pointer;'>
                                        View Order File
                                    </button>
                                </a>
                            ");
                        })
                        ->label('Reference File'),
                            Infolists\Components\TextEntry::make('design.description')
                            ->formatStateUsing(function ($state) {
                                return new \Illuminate\Support\HtmlString("
                                    <span style='color:#99cc00' class='font-semibold'>
                                        $state
                                    </span>
                                ");
                            })->label('Project Description'),
                    ] : [
                        TextEntry::make('development.file')
                        ->formatStateUsing(function ($state) {
                            $imageUrl = asset('storage/' . $state);
                            return new \Illuminate\Support\HtmlString("
                                <a href='$imageUrl' target='_blank'>
                                    <button type='button' style='padding: 8px 16px; background-color: #99cc00; color: black; border: none; cursor: pointer;'>
                                        View Order File
                                    </button>
                                </a>
                            ");
                        })
                        ->label('Reference File'),
                            Infolists\Components\TextEntry::make('development.description')
                            ->formatStateUsing(function ($state) {
                                return new \Illuminate\Support\HtmlString("
                                    <span style='color:#99cc00' class='font-semibold'>
                                        $state
                                    </span>
                                ");
                            })->label('Project Description'),
                    ],

                )->columns(2),

                Section::make('Order Notes')
                ->columnSpan(12)
                ->schema([
                    Infolists\Components\TextEntry::make('notes')
                    ->label('Additional Notes')
                    ->formatStateUsing(function ($state) {
                        return new \Illuminate\Support\HtmlString("
                            <span style='color:#99cc00' class='font-semibold'>
                                $state
                            </span>
                        ");
                    }),
                ])->columns(1),
        ]);
}
}
