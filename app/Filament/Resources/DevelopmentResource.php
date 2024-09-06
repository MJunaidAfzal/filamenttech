<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DevelopmentResource\Pages;
use App\Filament\Resources\DevelopmentResource\RelationManagers;
use App\Models\Development;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;


class DevelopmentResource extends Resource
{
    protected static ?string $model = Development::class;

    protected static ?string $navigationIcon = 'heroicon-s-cog-6-tooth';

    protected static ?string $navigationGroup = 'Projects';

    protected static ?int $navigationSort = 6;

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('developer_id')
                    ->label('Developer Name')
                    ->relationship('developer','name')
                    ->options([
                        Auth::user()->id => Auth::user()->name,
                    ])
                    ->default(Auth::id())
                    ->disabled()
                    ->hidden()
                    ->required(),
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('status')
                    ->options([
                       'In Progress' => 'In Progress',
                       'Completed' => 'Completed',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('version')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('feedback')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('deadline')
                    ->required(),
                Forms\Components\TextInput::make('code_repository_url')
                    ->required(),
                Forms\Components\RichEditor::make('description')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\BadgeColumn::make('status')
                    ->getStateUsing(fn (Development $record) => $record->status)
                    ->colors([
                        'In Progress' => 'success',
                        'Completed' => 'primary',
                    ]),
                Tables\Columns\TextColumn::make('version')
                    ->searchable(),
                Tables\Columns\TextColumn::make('deadline')
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
            'index' => Pages\ListDevelopments::route('/'),
            'create' => Pages\CreateDevelopment::route('/create'),
            'edit' => Pages\EditDevelopment::route('/{record}/edit'),
        ];
    }
}
