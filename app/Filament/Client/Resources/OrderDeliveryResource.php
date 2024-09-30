<?php

namespace App\Filament\Client\Resources;

use App\Filament\Client\Resources\OrderDeliveryResource\Pages;
use App\Filament\Client\Resources\OrderDeliveryResource\RelationManagers;
use App\Models\OrderDelivery;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use App\Models\Order;
use ZipArchive;
use Illuminate\Support\Facades\Storage;
use App\Filament\Client\Resources\OrderResource;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;

class OrderDeliveryResource extends Resource
{
    public static string $parentResource = OrderResource::class;

    public static function getRecordTitle(?Model $record): string|null|Htmlable
    {
        return $record->order->order_id;
    }

    protected static ?string $model = OrderDelivery::class;

    protected static bool $shouldRegisterNavigation = false;

    protected static ?string $navigationIcon = 'heroicon-o-archive-box-arrow-down';

    protected static ?string $navigationGroup = 'Order Management';

    public static function getEloquentQuery(): \Illuminate\Database\Eloquent\Builder
    {
        $parentId = request()->route('parent');

        return parent::getEloquentQuery()->where('order_id', $parentId);
    }

    public static function form(Form $form): Form
    {


        return $form
            ->schema([

                Grid::make(2) // Two columns
                    ->schema([

                        // First Column: All input fields stacked vertically
                        Grid::make(1)
                            ->schema([
                                Forms\Components\RichEditor::make('delivery_note')
                                    ->label('Delivery Note')
                                    ->required(),

                                Select::make('status')
                                    ->label('Status')
                                    ->options([
                                        'Pending' => 'Pending',
                                        'Approved' => 'Approved',
                                        'Rejected' => 'Rejected',

                                    ])->default('Pending')
                                    ->required(),
                                Select::make('user_id')
                                    ->label('User')
                                    ->options([
                                        Auth::user()->id => Auth::user()->name,
                            ])
                                    ->default(Auth::id())
                                    // ->disabled()
                                    ->required(),
                                // Select::make('order_id')
                                //     ->label('Order')
                                //     ->options(\App\Models\Order::pluck('order_id', 'id'))
                                //     ->required(),
                            ])->columnSpan(1),
                        Grid::make(1)
                            ->schema([
                                FileUpload::make('delivery_files')
                                    ->label('Delivery Files')
                                    ->downloadable()
                                    ->multiple()
                                    ->required()
                                    ->hintAction(
                                        Forms\Components\Actions\Action::make('download-order-deliveries')
                                            ->label('Download Order Deliveries')
                                            ->button()
                                            ->color('success')
                                            ->action(function ($record) {
                                                $zip = new ZipArchive;
                                                $fileName = 'order-delivery-'.$record->order->order_id.'.zip';
                                                $zipFilePath = storage_path('app/public/'.$fileName);

                                                if ($zip->open($zipFilePath, ZipArchive::CREATE) === true) {
                                                    foreach ($record->delivery_files as $image) {
                                                        // dd($image);
                                                        $filePath = Storage::path('\public/'.$image); // Adjust according to your image path
                                                        // dd($image , $filePath);

                                                        $zip->addFile($filePath, basename($filePath));
                                                    }
                                                    $zip->close();
                                                }

                                                return response()->download($zipFilePath)->deleteFileAfterSend(true);
                                            })
                                            ->icon('heroicon-o-arrow-down-tray')
                                            ->visible(fn () => !request()->routeIs('filament.client.resources.orders.order-deliveries.create'))
                                        ),

                            ])->columnSpan(1),

                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Tables\Columns\TextColumn::make('id')
                //     ->label('ID')
                //     ->sortable(),

                Tables\Columns\TextColumn::make('order.order_id')
                    ->label('Order')
                    ->sortable(),

                // Tables\Columns\TextColumn::make('delivery_note')
                //     ->label('Delivery Note')
                //     ->sortable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Deliver By')
                    ->sortable(),

                    Tables\Columns\BadgeColumn::make('status')
                    ->label('Status')
                    ->colors([
                        'danger' => 'Rejected',
                        'success' => 'Approved',
                        'warning' => 'Pending',
                    ])
            ])
            ->filters([
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                ->visible(fn () => auth()->user()->hasPermissionTo('view-order-deliveries'))
                ->url(
                    fn (Model $record): string => static::$parentResource::getUrl('order-deliveries.view', [
                        'record' => $record,
                        'parent' => request()->route('parent'),
                    ])
                )->button()->color('success'),
                Tables\Actions\EditAction::make()->button()->color('warning')
                ->visible(fn () => auth()->user()->hasPermissionTo('edit-order-deliveries'))
                ->url(
                    fn (Model $record): string => static::$parentResource::getUrl('order-deliveries.edit', [
                        'record' => $record,
                        'parent' => request()->route('parent'),
                    ])
                ),

                    // Tables\Actions\DeleteAction::make()->button(),
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

    // public static function getPages(): array
    // {
    //     return [
    //         'index' => Pages\ListOrderDeliveries::route('/'),
    //         'create' => Pages\CreateOrderDelivery::route('/create'),
    //         'view' => Pages\ViewOrderDelivery::route('/{record}'),
    //         'edit' => Pages\EditOrderDelivery::route('/{record}/edit'),
    //     ];
    // }
}
