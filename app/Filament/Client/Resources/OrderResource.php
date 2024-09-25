<?php

namespace App\Filament\Client\Resources;

use App\Filament\Client\Resources\OrderResource\Pages;
use App\Filament\Client\Resources\OrderResource\RelationManagers;
use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Wizard;
use Illuminate\Support\Facades\Auth;
use App\Models\Service;
use App\Models\Design;
use App\Models\Development;
use Filament\Notifications\Notification;
use Filament\Tables\Actions\Action;
use App\Filament\Client\Resources\OrderQuotationResource\Pages\CreateOrderQuotation;
use App\Filament\Client\Resources\OrderQuotationResource\Pages\EditOrderQuotation;
use App\Filament\Client\Resources\OrderQuotationResource\Pages\ListOrderQuotations;
use App\Filament\Resources\OrderQuotationResource\Pages\ViewOrderQuotation;
use Illuminate\Support\Facades\Route;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Model;
use DB;
use App\Models\Permission;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    public static function getRecordTitle(?Model $record): string|null|Htmlable
    {
        return $record->name;
    }

    protected static ?string $navigationGroup = 'Order Management';

    protected static ?string $navigationIcon = 'heroicon-s-archive-box';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('user_id', auth()->user()->id);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Wizard::make([
                    // Step 1: Order Details and Service Selection
                    Wizard\Step::make('Project')
                        ->schema([
                            Forms\Components\Select::make('user_id')
                                ->label('User Name')
                                ->options([Auth::user()->id => Auth::user()->name])
                                ->default(Auth::id())
                                ->disabled()
                                ->hidden()
                                ->required(),

                            Forms\Components\TextInput::make('order_id')
                                ->required()
                                ->hidden()
                                ->numeric(),

                            Forms\Components\Select::make('service_id')
                                ->relationship('service', 'name')
                                ->required()
                                ->label('Service')
                                ->reactive()
                                ->afterStateUpdated(function ($set, $state) {
                                    if ($state == 1) {
                                        $set('service_type', 'design');
                                    } elseif ($state == 2) {
                                        $set('service_type', 'development');
                                    } else {
                                        $set('service_type', null);
                                    }
                                }),
                        ])->columns(2),

                    Wizard\Step::make('Service')
                        ->schema(function (callable $get) {
                            $serviceType = $get('service_type');

                            if ($serviceType === 'design') {
                                return [
                                    Forms\Components\TextInput::make('title')
                                        ->label('Design Title')
                                        ->required(),
                                    Forms\Components\TextInput::make('category')
                                        ->label('Design Category')
                                        ->required(),
                                    Forms\Components\Select::make('status')
                                        ->label('Design Status')
                                        ->options([
                                            '1' => 'In Progress',
                                            '2' => 'Completed',
                                        ])
                                        ->required(),
                                    Forms\Components\DatePicker::make('deadline')
                                        ->label('Design Deadline')
                                        ->required(),
                                    Forms\Components\Textarea::make('feedback')
                                        ->label('Design Feedback')
                                        ->columnSpanFull(),
                                ];
                            } elseif ($serviceType === 'development') {
                                return [
                                    Forms\Components\TextInput::make('title')
                                        ->label('Development Title')
                                        ->required(),
                                    Forms\Components\Select::make('status')
                                        ->label('Development Status')
                                        ->options([
                                            '1' => 'In Progress',
                                            '2' => 'Completed',
                                        ])
                                        ->required(),
                                    Forms\Components\TextInput::make('version')
                                        ->label('Development Version')
                                        ->required(),
                                    Forms\Components\TextInput::make('code_repository_url')
                                        ->label('Code Repository URL')
                                        ->required(),
                                    Forms\Components\DatePicker::make('deadline')
                                        ->label('Development Deadline')
                                        ->required(),
                                    Forms\Components\Textarea::make('feedback')
                                        ->label('Development Feedback'),
                                ];
                            }

                            return [];
                        })->columns(2)
                        ->reactive(),

                    Wizard\Step::make('Details')
                        ->schema([
                            Forms\Components\FileUpload::make('file')
                                ->label('Order File')
                                ->required()
                                ->columnSpanFull(),
                            Forms\Components\RichEditor::make('notes'),
                                // ->required(),
                            Forms\Components\RichEditor::make('description')
                                ->label('Description'),
                        ])->columns(2),
                ])->columnSpanFull()
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                ->label('Project Creator')
                ->searchable(),
                    Tables\Columns\TextColumn::make('order_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('service.name')
                    ->label('Service')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                ])
            ->filters([
                //
            ])
            ->actions([
                Action::make('Manage Quotation')
                ->visible(fn () => Permission::where('name','view-order-quotation')->first())
                ->label('')
                ->color('warning')
                ->icon('heroicon-o-document-text')
                ->url(
                    fn (Order $record): string => static::getUrl('order-quotations.index', [
                        'parent' => $record->id,
                    ])
                )->button(),
                Tables\Actions\ViewAction::make()->button(),
                Tables\Actions\EditAction::make()->button(),
                Tables\Actions\DeleteAction::make()->button(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
         //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
            'view' => Pages\ViewOrder::route('/{record}/view'),

            'order-quotations.index' => ListOrderQuotations::route('/{parent}/order-quotations'),
            'order-quotations.create' => CreateOrderQuotation::route('/{parent}/order-quotations/create'),
            'order-quotations.edit' => EditOrderQuotation::route('/{parent}/order-quotations/{record}/edit'),
            'order-quotations.view' => ViewOrderQuotation::route('/{parent}/order-quotations/{record}/view'),
        ];
    }
}
