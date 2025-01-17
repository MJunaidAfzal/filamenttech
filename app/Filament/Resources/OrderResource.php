<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
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
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use DB;
use Filament\Tables\Actions\Action;
use App\Filament\Resources\OrderQuotationResource\Pages\CreateOrderQuotation;
use App\Filament\Resources\OrderQuotationResource\Pages\EditOrderQuotation;
use App\Filament\Resources\OrderQuotationResource\Pages\ListOrderQuotations;
use App\Filament\Resources\OrderQuotationResource\Pages\ViewOrderQuotation;
use App\Filament\Resources\OrderDeliveryResource\Pages\CreateOrderDelivery;
use App\Filament\Resources\OrderDeliveryResource\Pages\EditOrderDelivery;
use App\Filament\Resources\OrderDeliveryResource\Pages\ListOrderDeliveries;
use App\Filament\Resources\OrderDeliveryResource\Pages\ViewOrderDelivery;
use App\Models\Permission;
use Filament\Support\Enums\ActionSize;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Model;



class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    public static function getRecordTitle(?Model $record): string|null|Htmlable
    {
        return $record->order_id;
    }

    protected static ?string $navigationGroup = 'Order Management';

    protected static ?string $navigationIcon = 'heroicon-s-archive-box';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function shouldRegisterNavigation(): bool
    {
        return auth()->user()->role->hasPermissionTo('order-all');
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

                            Forms\Components\Select::make('assignees')
                                ->multiple()
                                ->visible(fn () => auth()->user()->role->hasPermissionTo('assign_orders_to_developers'))
                                ->relationship('assignees', 'name'),


                                Forms\Components\Select::make('customers')
                                ->visible(fn () => auth()->user()->role->hasPermissionTo('manage_customers_order'))
                                ->relationship('customers', 'name'),
                        ])->columns(3),

                    Wizard\Step::make('Service')
                        ->schema(function (callable $get) {
                            $serviceType = $get('service_type');

                            if ($serviceType === 'design') {
                                return [
                                    Forms\Components\TextInput::make('title')
                                        ->label('Project Title')
                                        ->required(),
                                    Forms\Components\Select::make('category_id')
                                        ->relationship('design.category', 'name')
                                        ->label('Project Category')
                                        ->required(),
                                    // Forms\Components\Select::make('status')
                                    //     ->label('Status')
                                    //     ->default('Pending')
                                    //     ->options([
                                    //         'Pending' => 'Pending',
                                    //         'In Progress' => 'In Progress',
                                    //         'Completed' => 'Completed',
                                    //     ]),
                                    Forms\Components\DatePicker::make('deadline')
                                        ->label('Expented Daytime Date')
                                        ->required(),
                                ];
                            } elseif ($serviceType === 'development') {
                                return [
                                    Forms\Components\TextInput::make('title')
                                    ->label('Project Title')
                                    ->required(),
                                    Forms\Components\TextInput::make('server_credential')
                                        ->label('Server Credential')
                                        ->required(),
                                // Forms\Components\Select::make('status')
                                //     ->label('Status')
                                //     ->default('Pending')
                                //     ->options([
                                //         'Pending' => 'Pending',
                                //         'In Progress' => 'In Progress',
                                //         'Completed' => 'Completed',
                                //     ]),
                                // Forms\Components\TextInput::make('code_repository_url')
                                //     ->label('Code Repository URL')
                                //     ->required()
                                //     ->nullable(),
                                Forms\Components\DatePicker::make('deadline')
                                    ->label('Expented Daytime Date')
                                    ->required(),
                            ];
                            }

                            return [];
                        })->columns(2)
                        ->reactive(),

                    Wizard\Step::make('Details')
                        ->schema([
                        Forms\Components\FileUpload::make('file')
                            ->label('Reference File')
                            ->required()
                            ->columnSpanFull(),
                        Forms\Components\RichEditor::make('description')
                            ->label('Project Description'),
                        Forms\Components\RichEditor::make('notes')
                            ->label('Additional Notes'),
                            // ->required(),
                        ])->columns(2),
                ])->columnSpanFull()
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Tables\Columns\TextColumn::make('user.name')
                // ->label('Project Creator')
                // ->searchable(),

                Tables\Columns\TextColumn::make('order_id')
                    ->label('Order Name')
                    ->numeric()
                    ->sortable(),

                Tables\Columns\TextColumn::make('title')
                    ->label('Title')
                    ->getStateUsing(function ($record) {
                        if ($record->service_id == 1) {
                            return $record->design->title ?? '';
                        } elseif ($record->service_id == 2) {
                            return $record->development->title ?? '';
                        }
                        return '';
                    }),

                Tables\Columns\TextColumn::make('service_id')
                    ->label('Service')
                    ->formatStateUsing(fn ($state) => $state == 1 ? 'Design' : 'Development'),

                    Tables\Columns\BadgeColumn::make('status')
                    ->label('Status')
                    ->colors([
                        'primary' => 'In Progress',
                        'success' => 'Completed',
                        'info' => 'Pending',
                    ])
                    ->icons([
                        'heroicon-s-arrow-path' => 'In Progress',
                        'heroicon-s-check-circle' => 'Completed',
                        'heroicon-s-clock' => 'Pending',
                    ])
                    ->getStateUsing(function ($record) {
                        if ($record->service_id == 1) {
                            return $record->design->status ?? '';
                        } elseif ($record->service_id == 2) {
                            return $record->development->status ?? '';
                        }
                        return '';
                    }),

                    Tables\Columns\BadgeColumn::make('quotations.status')
                    ->label('Quotation Status')
                    ->colors([
                        'success' => 'Approved',
                        'danger' => 'Rejected',
                        'info' => 'Pending',
                    ])
                    ->icons([
                        'heroicon-s-check-circle' => 'Approved',
                        'heroicon-s-x-circle' => 'Rejected',
                        'heroicon-s-clock' => 'Pending',
                    ])
                    ->getStateUsing(function ($record) {
                        $latestQuotation = $record->quotations()->latest('created_at', 'desc')->first();
                        return $latestQuotation ? $latestQuotation->status : 'No Quotations';
                    }),




                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                ])->defaultSort('created_at', 'desc')
            ->filters([
                //
            ])
            ->actions([

                Action::make('Manage Quotation')
                ->visible(fn () => auth()->check() && auth()->user()->role->hasPermissionTo('manage-order-quotations'))
                ->outlined()
                  ->badge(fn (Order $record) => $record->quotations()->count())
                  ->badgeColor('info')
                ->label('Order Quotations')
                ->size(ActionSize::Small)
                ->color('success')
                ->icon('heroicon-s-document-text')
                ->url(
                    fn (Order $record): string => static::getUrl('order-quotations.index', [
                        'parent' => $record->id,
                    ])
                )->button(),
                Action::make('Manage Delivery')
                ->visible(fn () => auth()->check() && auth()->user()->role->hasPermissionTo('manage-order-deliveries'))
                    ->label('')
                    ->size(ActionSize::Medium)
                    ->badge(fn (Order $record) => $record->orderDeliveries()->count())
                    ->badgeColor('primary')
                    ->color('brown')
                    ->icon('heroicon-s-archive-box-arrow-down')
                    ->url(
                        fn (Order $record): string => static::getUrl('order-deliveries.index', [
                            'parent' => $record->id,
                        ])
                    )->button(),
                Tables\Actions\ViewAction::make()
                ->visible(fn () => auth()->user()->role->hasPermissionTo('view-order'))
                    ->button()
                    ->label("")
                    ->color('info')
                    ->size(ActionSize::Medium),
                Tables\Actions\EditAction::make()
                ->visible(fn () => auth()->user()->role->hasPermissionTo('edit-order'))
                    ->button()
                    ->label("")
                    ->size(ActionSize::Medium),
                Tables\Actions\DeleteAction::make()
                ->visible(fn () => auth()->user()->role->hasPermissionTo('delete-order'))
                    ->button()
                    ->label("")
                    ->size(ActionSize::Medium),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                ,
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

            'order-deliveries.index' => ListOrderDeliveries::route('/{parent}/order-deliveries'),
            'order-deliveries.create' => CreateOrderDelivery::route('/{parent}/order-deliveries/create'),
            'order-deliveries.edit' => EditOrderDelivery::route('/{parent}/order-deliveries/{record}/edit'),
            'order-deliveries.view' => ViewOrderDelivery::route('/{parent}/order-deliveries/{record}'),

            'order-quotations.index' => ListOrderQuotations::route('/{parent}/order-quotations'),
            'order-quotations.create' => CreateOrderQuotation::route('/{parent}/order-quotations/create'),
            'order-quotations.edit' => EditOrderQuotation::route('/{parent}/order-quotations/{record}/edit'),
            'order-quotations.view' => ViewOrderQuotation::route('/{parent}/order-quotations/{record}/view'),
        ];
    }
}

