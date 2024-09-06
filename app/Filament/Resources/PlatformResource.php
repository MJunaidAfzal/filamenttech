<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PlatformResource\Pages;
use App\Filament\Resources\PlatformResource\RelationManagers;
use App\Models\Platform;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PlatformResource extends Resource
{
    protected static ?string $model = Platform::class;

    protected static ?string $navigationIcon = 'heroicon-s-computer-desktop';

    protected static ?string $navigationGroup = 'System Management';

    public static function getNavigationLabel(): string
    {
        return 'Platforms';
    }

    public static function shouldRegisterNavigation(): bool
    {
        return false;
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('no_of_pages')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('website_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('reference')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('reference_link')
                    ->required()
                    ->maxLength(255),

                Forms\Components\FileUpload::make('document_attachment')
                            ->label('Document Attachment')
                            ->downloadable()
                            ->required()
                            ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Tables\Columns\ImageColumn::make('document_attachment')
                // ->square(),
                Tables\Columns\TextColumn::make('no_of_pages')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('website_name')
                    ->searchable(),
                // Tables\Columns\TextColumn::make('reference')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('reference_link')
                //     ->searchable(),
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
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListPlatforms::route('/'),
            'create' => Pages\CreatePlatform::route('/create'),
            'edit' => Pages\EditPlatform::route('/{record}/edit'),
        ];
    }
}
