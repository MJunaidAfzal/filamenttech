<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DesignResource\Pages;
use App\Filament\Resources\DesignResource\RelationManagers;
use App\Models\Design;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;


class DesignResource extends Resource
{
    protected static ?string $model = Design::class;

    protected static ?string $navigationIcon = 'heroicon-s-paint-brush';

    protected static ?string $navigationGroup = 'Projects';

    protected static ?int $navigationSort = 5;

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('designer_id')
                    ->label('Design Created By')
                    ->relationship('designer','name')
                    // ->options([
                    //     Auth::user()->id => Auth::user()->name,
                    // ])
                    // ->default(Auth::id())
                    // ->disabled()
                    // // ->hidden()
                    ->required(),
                Forms\Components\Select::make('project_id')
                    ->label('Order Number')
                    ->relationship('order','order_id')
                    ->required(),
                Forms\Components\TextInput::make('title')
                    ->label('Project Title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('category_id')
                    ->relationship('category','name')
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
                Forms\Components\FileUpload::make('file')
                    ->label('Reference File')
                    ->required()
                    ->lazy()
                    ->downloadable()
                    ->columnSpanFull(),
                Forms\Components\RichEditor::make('description')
                    ->label('Project Description')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Project Title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('category.name')
                ->label('Project Category')
                    ->searchable(),
                Tables\Columns\BadgeColumn::make('status')
                    ->label('Status')
                    ->colors([
                        'primary' => 'In Progress',
                        'success' => 'Completed',
                        'info' => 'Pending',
                    ]),
                Tables\Columns\TextColumn::make('deadline')
                ->label('Expented Daytime Date')
                    ->date()
                    ->sortable(),
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
                Tables\Actions\ViewAction::make()->button()->color('info'),
                // Tables\Actions\EditAction::make()->button(),
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDesigns::route('/'),
            'create' => Pages\CreateDesign::route('/create'),
            'edit' => Pages\EditDesign::route('/{record}/edit'),
        ];
    }
}
