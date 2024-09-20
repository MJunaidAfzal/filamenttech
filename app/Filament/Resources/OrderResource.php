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
use DB;


class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationGroup = 'Order Management';

    protected static ?string $navigationIcon = 'heroicon-s-archive-box';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
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
                                ->relationship('assignees', 'name'),
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
        ];
    }
}
