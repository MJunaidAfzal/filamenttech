<?php

namespace App\Filament\Developer\Resources;

use App\Filament\Developer\Resources\ProjectResource\Pages;
use App\Filament\Developer\Resources\ProjectResource\RelationManagers;
use App\Models\Project;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationIcon = 'heroicon-s-archive-box';

    protected static ?string $navigationGroup = 'Project Management';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('user_id', auth()->user()->id);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                  Forms\Components\Select::make('user_id')
                    ->label('User Name')
                    ->relationship('user','name')
                    ->disabled()
                    ->required(),
                Forms\Components\TextInput::make('order_id')
                    ->required()
                    ->disabled()
                    ->numeric(),
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255)
                    ->disabled(),
                Forms\Components\Select::make('service_id')
                    ->options([
                        'development' => 'Development',
                        'design' => 'Design',
                    ])
                    ->required()
                    ->label('Service')
                    ->disabled(),
                Forms\Components\DatePicker::make('deadline')
                    ->required(),
                Forms\Components\TextInput::make('no_of_pages')
                    ->required()
                    ->numeric(),
                Forms\Components\Select::make('status')
                    ->options([
                        '1' => 'Active',
                        '2' => 'Un Active',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('price')
                    ->required()
                    ->maxLength(255),

                Forms\Components\Select::make('payment_status')
                    ->options([
                        'pending' => 'Pending',
                        'completed' => 'Completed',
                        'failed' => 'Failed',
                        'refunded' => 'Refunded',
                    ])
                    ->required(),
                Forms\Components\FileUpload::make('file')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\RichEditor::make('description')
                    ->required(),
                Forms\Components\RichEditor::make('notes')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
            Tables\Columns\TextColumn::make('order_id')
                ->numeric()
                ->sortable(),
            Tables\Columns\TextColumn::make('title')
                ->searchable(),
            Tables\Columns\TextColumn::make('service_id')
                ->label('Service')
                ->searchable(),
            // Tables\Columns\TextColumn::make('deadline')
            //     ->date()
            //     ->sortable(),
            // Tables\Columns\TextColumn::make('file')
            //     ->searchable(),
            // Tables\Columns\TextColumn::make('no_of_pages')
            //     ->numeric()
            //     ->sortable(),
            Tables\Columns\IconColumn::make('status')
                ->boolean(),
            // Tables\Columns\TextColumn::make('price')
            //     ->searchable(),
            // Tables\Columns\TextColumn::make('client_id')
            //     ->numeric()
            //     ->sortable(),
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
                Tables\Actions\EditAction::make()->button(),
                // Tables\Actions\DeleteAction::make()->button(),
                Tables\Actions\ViewAction::make()->button(),
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

    public static function canCreate(): bool
{
    return false;
}

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}
