<?php

namespace App\Filament\Client\Resources;

use App\Filament\Client\Resources\OrderQuotationResource\Pages;
use App\Filament\Client\Resources\OrderQuotationResource\RelationManagers;
use App\Models\OrderQuotation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Client\Resources\OrderResource;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Model;
use App\Filament\Client\Resources\OrderQuotationResource\Pages\CreateOrderQuotation;
use App\Filament\Client\Resources\OrderQuotationResource\Pages\EditOrderQuotation;
use App\Filament\Client\Resources\OrderQuotationResource\Pages\ListOrderQuotations;
use App\Models\Permission;
use Filament\Support\Enums\IconPosition;
// use App\Filament\Client\Resources\OrderQuotationResource\Pages\ViewOrderDelivery;
use Filament\Support\Enums\ActionSize;
use Parallax\FilamentComments\Tables\Actions\CommentsAction;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use Auth;

class OrderQuotationResource extends Resource
{
    public static string $parentResource = OrderResource::class;

    public static function getRecordTitle(?Model $record): string|null|Htmlable
    {
        return $record->title;
    }

    protected static ?string $model = OrderQuotation::class;

    public static function getEloquentQuery(): Builder
    {
        $parentId = request()->route('parent');

        return parent::getEloquentQuery()
            ->where('approved_by', auth()->user()->id)
            ->where('order_id', $parentId);
    }

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static bool $shouldRegisterNavigation = false;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('quotation_number')
                    ->label('Quotation Number')
                    ->unique()
                    ->hidden()
                    ->required(),

                // Forms\Components\Select::make('created_by')
                //     ->options([Auth::user()->id => Auth::user()->name])
                //     ->default(Auth::id())
                //     ->disabled()
                //     // ->hidden()
                //     ->required(),

                    // Forms\Components\Select::make('order_id')
                    // ->label('Order')
                    // ->relationship('order','id')
                    // ->default(request()->route('parent'))
                    // // ->hidden()
                    // // ->disabled()
                    // ->required(),

                Forms\Components\TextInput::make('estimated_cost')
                    ->label('Estimated Cost')
                    ->numeric()
                    ->required(),



                Forms\Components\DatePicker::make('deadline')
                    ->label('Deadline')
                    ->nullable(),

                Forms\Components\Select::make('status')
                    ->label('Status')
                    ->options([
                        'Pending' => 'Pending',
                        'Approved' => 'Approved',
                        'Rejected' => 'Rejected',
                    ])
                    ->default('Pending')
                    ->required(),


                    Forms\Components\Select::make('approved_by')
                    ->label('Approved Quotation')
                    ->relationship('approver', 'name')
                    ->visible(fn () => auth()->user()->role->hasPermissionTo('can-approve-quotation'))
                    ->nullable(),

                    Forms\Components\RichEditor::make('notes')
                        ->label('Notes')
                        ->nullable(),

                        Forms\Components\RichEditor::make('description')
                        ->label('Description')
                        ->nullable(),
                ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('quotation_number')
                    ->label('Quotation Number')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('estimated_cost')
                    ->label('Estimated Cost')
                    ->sortable(),

                Tables\Columns\TextColumn::make('deadline')
                    ->label('Deadline')
                    ->sortable(),

                Tables\Columns\BadgeColumn::make('status')
                    ->label('Status')
                    ->colors([
                        'success' => 'Approved',
                        'warning' => 'Pending',
                        'danger' => 'Rejected',
                    ]),

            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'Pending' => 'Pending',
                        'Approved' => 'Approved',
                        'Rejected' => 'Rejected',
                    ]),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
            ->visible(fn () => auth()->user()->role->hasPermissionTo('view-order-quotation'))
                ->url(
                    fn (Model $record): string => static::$parentResource::getUrl('order-quotations.view', [
                        'record' => $record,
                        'parent' => request()->route('parent'),
                    ])
                )->button()->color('primary'),

                Tables\Actions\EditAction::make()->button()->color('warning')
            ->visible(fn () => auth()->user()->role->hasPermissionTo('edit-order-quotation'))
                ->url(
                    fn (Model $record): string => static::$parentResource::getUrl('order-quotations.edit', [
                        'record' => $record,
                        'parent' => request()->route('parent'),
                    ])
                ),


            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }


    public static function getPages(): array
    {
        return [
            'index' => ListOrderQuotations::route('/'),
            'create' => CreateOrderQuotation::route('/create'),
            'edit' => EditOrderQuotation::route('/{record}/edit'),
        ];
    }
}
