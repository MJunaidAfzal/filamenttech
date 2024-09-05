<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Filament\Resources\ProjectResource\RelationManagers;
use App\Models\Project;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;



class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationIcon = 'heroicon-o-archive-box';

    protected static ?string $navigationGroup = 'Project Management';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->label('Developer Name')
                    ->relationship('user','name')
                    ->required(),
                Forms\Components\TextInput::make('order_id')
                    ->required()
                    ->hidden()
                    ->numeric(),
                Forms\Components\Select::make('project_type_id')
                    ->label('Project type Name')
                    ->relationship('projectType','name')
                    ->required(),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
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
            Tables\Columns\TextColumn::make('projectType.name')
                ->label('Property Type Name')
                ->searchable()
                ->toggleable()
                ->sortable(),
            Tables\Columns\TextColumn::make('user.name')
                ->label('Developer Name')
                ->searchable()
                ->toggleable()
                ->sortable(),
            Tables\Columns\TextColumn::make('name')
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
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ViewAction::make(),
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
