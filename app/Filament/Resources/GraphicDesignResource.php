<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GraphicDesignResource\Pages;
use App\Filament\Resources\GraphicDesignResource\RelationManagers;
use App\Models\GraphicDesign;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GraphicDesignResource extends Resource
{
    protected static ?string $model = GraphicDesign::class;

    protected static ?string $navigationIcon = 'heroicon-s-tv';

    protected static ?string $navigationGroup = 'System Management';

    public static function getNavigationLabel(): string
    {
        return 'Graphic Designs';
    }

    public static function shouldRegisterNavigation(): bool
    {
        return true;
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                    Forms\Components\TextInput::make('category')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('format')
                ->options(
                    [
                        'jpg' => 'JPG',
                        'png' => 'PNG',
                        'gif' => 'GIF',
                        'svg' => 'SVG',
                        'webp' => 'WEBP',
                        'avif' => 'AVIF',
                        'jpeg' => 'JPEG',
                        'ai' => 'AI',
                        'tiff' => 'TIFF',
                        'raw' => 'RAW',
                        'psd' => 'PSD',
                        'doc' => 'DOC',
                        'pdf' => 'PDF',
                        'xls' => 'XLS',
                        'zip' => 'ZIP',
                    ]
                )
                ->required(),
                Forms\Components\TextInput::make('size')
                ->required()
                ->maxLength(255),
                Forms\Components\TextInput::make('revision')
                ->required()
                ->numeric(),
                Forms\Components\TextInput::make('concept')
                ->required()
                ->numeric(),
                Forms\Components\FileUpload::make('file')
                ->required()
                ->downloadable()
                ->lazy()
                ->columnSpanFull(),
                Forms\Components\RichEditor::make('description')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('category')
                    ->searchable(),
                // Tables\Columns\ImageColumn::make('file')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('format')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('size')
                //     ->searchable(),
                Tables\Columns\TextColumn::make('revision')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('concept')
                    ->numeric()
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
            'index' => Pages\ListGraphicDesigns::route('/'),
            'create' => Pages\CreateGraphicDesign::route('/create'),
            'edit' => Pages\EditGraphicDesign::route('/{record}/edit'),
        ];
    }
}
