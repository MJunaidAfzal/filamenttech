<?php

namespace App\Filament\Client\Resources;

use App\Filament\Client\Resources\ProjectResource\Pages;
use App\Filament\Client\Resources\ProjectResource\RelationManagers;
use App\Models\Project;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Tabs;
use Filament\Support\Enums\IconPosition;
use App\Models\Service;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationGroup = 'Project Management';

    protected static ?string $navigationIcon = 'heroicon-s-archive-box';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('user_id', auth()->user()->id);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make('Project Details')
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\Select::make('user_id')
                                    ->label('User Name')
                                    ->options([
                                        Auth::user()->id => Auth::user()->name,
                                    ])
                                    ->default(Auth::id())
                                    ->disabled()
                                    ->hidden()
                                    ->required(),
                                Forms\Components\TextInput::make('order_id')
                                    ->required()
                                    ->hidden()
                                    ->numeric(),
                                Forms\Components\TextInput::make('title')
                                    ->required()
                                    ->maxLength(255),
                                // Forms\Components\Select::make('service_id')
                                //     ->relationship('service','name')
                                //     ->required()
                                //     ->label('Service')
                                //     ->reactive()
                                //     ->afterStateUpdated(function (callable $set, $state) {
                                //         $set('service_type', static::getServiceType($state));
                                //     }),
                                // Forms\Components\TextInput::make('service_type')
                                //     ->label('Service Type')
                                //     ->hidden()
                                //     ->disabled(),
                                Forms\Components\Select::make('service_id')
                                ->relationship('service', 'name')
                                ->required()
                                ->label('Service')
                                ->reactive()
                                ->afterStateUpdated(function ($set, $state) {
                                    $service = Service::find($state);
                                    if ($service) {
                                        $set('service_type', $service->type);
                                    } else {
                                        $set('service_type', null);
                                    }
                                }),
                            ]),

                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\DatePicker::make('deadline')
                                    ->required(),
                                Forms\Components\TextInput::make('no_of_pages')
                                    ->required()
                                    ->numeric(),

                            ]),
                            Forms\Components\Grid::make(3)
                            ->schema([

                                Forms\Components\Select::make('status')
                                    ->options([
                                        '1' => 'Active',
                                        '2' => 'Un Active',
                                    ])
                                    ->required(),
                                Forms\Components\TextInput::make('price')
                                    ->required()
                                    ->numeric(),
                                Forms\Components\Select::make('payment_status')
                                    ->options([
                                        'pending' => 'Pending',
                                        'completed' => 'Completed',
                                        'failed' => 'Failed',
                                        'refunded' => 'Refunded',
                                    ])
                                    ->required(),
                            ]),

                    ]),
                Forms\Components\Card::make('File and Description')
                    ->schema([
                        Forms\Components\FileUpload::make('file')
                            ->required()
                            ->columnSpanFull()
                            ->lazy(),
                            Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\RichEditor::make('description')
                                ->required(),
                            Forms\Components\RichEditor::make('notes')
                                ->required(),
                            ]),



                    ]),
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
                Tables\Columns\TextColumn::make('service.name')
                    ->label('Service')
                    ->searchable(),
                Tables\Columns\IconColumn::make('status')
                    ->boolean(),
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
                Tables\Actions\DeleteAction::make()->button(),
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }


}
