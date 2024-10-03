<?php

namespace App\Filament\Developer\Resources;

use App\Filament\Developer\Resources\OrderResource\Pages;
use App\Filament\Developer\Resources\OrderResource\RelationManagers;
use App\Filament\Developer\Resources\OrderDeliveryResource\Pages\CreateOrderDelivery;
use App\Filament\Developer\Resources\OrderDeliveryResource\Pages\EditOrderDelivery;
use App\Filament\Developer\Resources\OrderDeliveryResource\Pages\ListOrderDeliveries;
use App\Filament\Developer\Resources\OrderDeliveryResource\Pages\ViewOrderDelivery;
use App\Filament\Developer\Resources\OrderQuotationResource\Pages\CreateOrderQuotation;
use App\Filament\Developer\Resources\OrderQuotationResource\Pages\EditOrderQuotation;
use App\Filament\Developer\Resources\OrderQuotationResource\Pages\ListOrderQuotations;
use App\Filament\Resources\OrderQuotationResource\Pages\ViewOrderQuotation;
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
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Model;
use DB;
use App\Models\Permission;
use Filament\Tables\Actions\Action;
use Filament\Support\Enums\ActionSize;




class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    public static function getRecordTitle(?Model $record): string|null|Htmlable
    {
        return $record->order_id;
    }

    protected static ?string $navigationGroup = 'Order Management';

    protected static ?string $navigationIcon = 'heroicon-s-archive-box';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('user_id', auth()->user()->id)
            ->orWhereExists(function ($query) {
                $query->select(DB::raw(1))
                    ->from('order_assignees')
                    ->whereColumn('order_assignees.order_id', 'orders.id')
                    ->where('order_assignees.user_id', auth()->user()->id);
            });
    }

    public static function shouldRegisterNavigation(): bool
    {
        return auth()->check() && auth()->user()->hasPermissionTo('order-all');
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
                                ->visible(fn () => auth()->user()->hasPermissionTo('assign_orders_to_developers'))
                                ->relationship('assignees', 'name'),
                        ])->columns(2),

                    Wizard\Step::make('Service')
                        ->schema(function (callable $get) {
                            $serviceType = $get('service_type');

                            if ($serviceType === 'design') {
                                return [
                                    Forms\Components\TextInput::make('title')
                                    ->label('Project Title')
                                    ->required(),
                                Forms\Components\Select::make('design.category_id')
                                    ->relationship('design.category', 'name')
                                    ->label('Project Category')
                                    ->required(),
                                Forms\Components\Select::make('status')
                                    ->label('Status')
                                    ->default('Pending')
                                    ->options([
                                        'Pending' => 'Pending',
                                        'In Progress' => 'In Progress',
                                        'Completed' => 'Completed',
                                    ]),
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
                                Forms\Components\Select::make('status')
                                    ->label('Status')
                                    ->default('Pending')
                                    ->options([
                                        'Pending' => 'Pending',
                                        'In Progress' => 'In Progress',
                                        'Completed' => 'Completed',
                                    ]),
                                Forms\Components\TextInput::make('code_repository_url')
                                    ->label('Code Repository URL')
                                    ->required()
                                    ->nullable(),
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
                        'warning' => 'In Progress',
                        'success' => 'Completed',
                        'primary' => 'Pending',
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
                    ->outlined()
                      ->badge(fn (Order $record) => $record->quotations()->count())
                      ->badgeColor('success')
                      ->visible(fn () => auth()->user()->hasPermissionTo('manage-order-quotations'))
                    ->label('Order Quotations')
                    ->size(ActionSize::Small)
                    ->color('warning')
                    ->icon('heroicon-s-document-text')
                    ->url(
                        fn (Order $record): string => static::getUrl('order-quotations.index', [
                            'parent' => $record->id,
                        ])
                    )->button(),
                    Action::make('Manage Delivery')
                    ->visible(fn () => auth()->user()->hasPermissionTo('manage-order-deliveries'))
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
                Tables\Actions\ViewAction::make()->button()->label('')->color('warning')
                ->size(ActionSize::Medium)
                ->visible(fn () => auth()->user()->hasPermissionTo('view-order')),
                Tables\Actions\EditAction::make()->button()->label('')->color('warning')
                ->size(ActionSize::Medium)
                ->visible(fn () => auth()->user()->hasPermissionTo('edit-order')),
                Tables\Actions\DeleteAction::make()->button()->label('')
                ->size(ActionSize::Medium)
                ->visible(fn () => auth()->user()->hasPermissionTo('delete-order'))
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
