<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderQuotationResource\Pages;
use App\Filament\Resources\OrderQuotationResource\RelationManagers;
use App\Models\OrderQuotation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Auth;
use Filament\Tables\Actions\Action;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
use Filament\Notifications\Notification;
use Filament\Tables\Actions\DeleteAction;
use Parallax\FilamentComments\Tables\Actions\CommentsAction;
use Filament\Support\Enums\ActionSize;




class OrderQuotationResource extends Resource
{
    protected static ?string $model = OrderQuotation::class;

    public static string $parentResource = OrderResource::class;

    public static function getRecordTitle(?Model $record): string|null|Htmlable
    {
        return $record->order->order_id;
    }

    protected static ?string $navigationIcon = 'heroicon-o-document-text';


    public static function shouldRegisterNavigation(): bool
{
    return false;
}


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
                        'primary' => 'Pending',
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
                CommentsAction::make()->button()->color('info')
                ->size(ActionSize::Small),
                Tables\Actions\ViewAction::make()->url(
                    fn (Model $record): string => static::$parentResource::getUrl('order-quotations.view', [
                        'record' => $record,
                        'parent' => request()->route('parent'),
                    ])
                )->button()->color('success'),
                Tables\Actions\EditAction::make()->button()
                ->url(
                    fn (Model $record): string => static::$parentResource::getUrl('order-quotations.edit', [
                        'record' => $record,
                        'parent' => request()->route('parent'),
                    ])
                ),
                // Tables\Actions\DeleteAction::make()->button()
                ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }


    // public static function getPages(): array
    // {
    //     return [
    //         'index' => Pages\ListOrderQuotations::route('/'),
    //         'create' => Pages\CreateOrderQuotation::route('/create'),
    //         'edit' => Pages\EditOrderQuotation::route('/{record}/edit'),
    //     ];
    // }

    public static function getEloquentQuery(): \Illuminate\Database\Eloquent\Builder
    {
        $parentId = request()->route('parent');

        return parent::getEloquentQuery()->where('order_id', $parentId);
    }
}

