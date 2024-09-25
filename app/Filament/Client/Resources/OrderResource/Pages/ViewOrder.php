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

class ViewOrder extends ViewRecord
{
    protected static string $resource = OrderResource::class;

    public function infolist(Infolist $infolist): Infolist
    {

    $order = static::getModel()::find(request()->route('record'));

    $serviceType = $order->service_id == 1 ? 'design' : 'development';

    return $infolist
        ->schema([
            Section::make('Order Info')
            ->columnSpan(12)
            ->schema([
                Infolists\Components\TextEntry::make('user.name')
                ->label('User Name')
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

                Infolists\Components\TextEntry::make('notes')
                ->label('Order Notes')
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
                            ->label('Design Title')
                            ->formatStateUsing(function ($state) {
                    return new \Illuminate\Support\HtmlString("
                        <span style='color:#99cc00' class='font-semibold'>
                            $state
                        </span>
                    ");
                }),
                            Infolists\Components\TextEntry::make('design.category')
                            ->label('Design Category')
                            ->formatStateUsing(function ($state) {
                                return new \Illuminate\Support\HtmlString("
                                    <span style='color:#99cc00' class='font-semibold'>
                                        $state
                                    </span>
                                ");
                            }),
                            Infolists\Components\TextEntry::make('design.status')
                            ->label('Design Status')
                            ->formatStateUsing(function ($state) {
                                return new \Illuminate\Support\HtmlString("
                                    <span style='color:#99cc00' class='font-semibold'>
                                        $state
                                    </span>
                                ");
                            }),
                            Infolists\Components\TextEntry::make('design.deadline')
                            ->label('Design Deadline')
                            ->formatStateUsing(function ($state) {
                    return new \Illuminate\Support\HtmlString("
                        <span style='color:#99cc00' class='font-semibold'>
                            $state
                        </span>
                    ");
                }),
                            Infolists\Components\TextEntry::make('design.feedback')
                            ->label('Design Feedback')
                            ->formatStateUsing(function ($state) {
                                return new \Illuminate\Support\HtmlString("
                                    <span style='color:#99cc00' class='font-semibold'>
                                        $state
                                    </span>
                                ");
                            }),
                    ] : [
                        Infolists\Components\TextEntry::make('development.title')
                            ->label('Development Title')
                            ->formatStateUsing(function ($state) {
                                return new \Illuminate\Support\HtmlString("
                                    <span style='color:#99cc00' class='font-semibold'>
                                        $state
                                    </span>
                                ");
                            }),
                            Infolists\Components\TextEntry::make('development.status')
                            ->label('Development Status')
                            ->formatStateUsing(function ($state) {
                                return new \Illuminate\Support\HtmlString("
                                    <span style='color:#99cc00' class='font-semibold'>
                                        $state
                                    </span>
                                ");
                            }),
                            Infolists\Components\TextEntry::make('development.version')
                            ->label('Development Version')
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
                                        $state
                                    </span>
                                ");
                            }),
                            Infolists\Components\TextEntry::make('development.deadline')
                            ->label('Development Deadline')
                            ->formatStateUsing(function ($state) {
                                return new \Illuminate\Support\HtmlString("
                                    <span style='color:#99cc00' class='font-semibold'>
                                        $state
                                    </span>
                                ");
                            }),
                            Infolists\Components\TextEntry::make('development.feedback')
                            ->label('Development Feedback')
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
                        ->hiddenLabel(),
                            Infolists\Components\TextEntry::make('design.description')
                            ->formatStateUsing(function ($state) {
                                return new \Illuminate\Support\HtmlString("
                                    <span style='color:#99cc00' class='font-semibold'>
                                        $state
                                    </span>
                                ");
                            })->label('Order Description'),
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
                        ->hiddenLabel(),
                            Infolists\Components\TextEntry::make('development.description')
                            ->formatStateUsing(function ($state) {
                                return new \Illuminate\Support\HtmlString("
                                    <span style='color:#99cc00' class='font-semibold'>
                                        $state
                                    </span>
                                ");
                            })->label('Order Description'),
                    ],

                )->columns(2),
        ]);
}
}
