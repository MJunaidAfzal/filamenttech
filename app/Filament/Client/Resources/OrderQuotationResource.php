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
// use App\Filament\Client\Resources\OrderQuotationResource\Pages\ViewOrderDelivery;
use Auth;

class OrderQuotationResource extends Resource
{
    public static string $parentResource = OrderResource::class;

    public static function getRecordTitle(?Model $record): string|null|Htmlable
    {
        return $record->title;
    }

    protected static ?string $model = OrderQuotation::class;



    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public static function canCreate(): bool
    {
        return false;
    }

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
                    ->disabled()
                    ->required(),



                Forms\Components\DatePicker::make('deadline')
                    ->label('Deadline')
                    ->disabled()
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
                    ->nullable(),

                    Forms\Components\RichEditor::make('notes')
                        ->label('Notes')
                        ->disabled()
                        ->nullable(),

                        Forms\Components\RichEditor::make('description')
                        ->label('Description')
                        ->disabled()
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
                Tables\Actions\ViewAction::make()->url(
                    fn (Model $record): string => static::$parentResource::getUrl('order-quotations.view', [
                        'record' => $record,
                        'parent' => request()->route('parent'),
                    ])
                )->button(),
                Tables\Actions\EditAction::make()->button()
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

    public static function getEloquentQuery(): \Illuminate\Database\Eloquent\Builder
    {
        $parentId = request()->route('parent');

        return parent::getEloquentQuery()->where('order_id', $parentId);
    }
}
