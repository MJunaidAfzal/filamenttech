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

    protected static ?string $navigationIcon = 'heroicon-o-archive-box';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('user_id', auth()->user()->id);
    }

    public static function form(Form $form): Form
    {
        // $services = Service::get()->pluck('id')->toArray();

        // $tabs = [];

        // foreach ($services as $serviceId) {
        //     $serviceName = Service::find($serviceId)->name;
        //     $tab = Tabs\Tab::make($serviceName)
        //         ->schema([]);

        //     if ($serviceId == 1) {
        //         $tab->schema([
        //             Forms\Components\Select::make('user_id')
        //             ->label('User Name')
        //             ->options([
        //                 Auth::user()->id => Auth::user()->name,
        //             ])
        //             ->required(),
        //         Forms\Components\TextInput::make('order_id')
        //             ->required()
        //             ->hidden()
        //             ->numeric(),
        //         ])
        //         ->icon('heroicon-o-folder')
        //         ->iconPosition(IconPosition::After);
        //     } elseif ($serviceId == 2) {
        //         $tab->schema([
        //             Forms\Components\DatePicker::make('date')
        //             ->required(),
        //         Forms\Components\TextInput::make('pages')
        //             ->required()
        //             ->numeric(),
        //         Forms\Components\Select::make('status')
        //             ->options([
        //                 '1' => 'Active',
        //                 '2' => 'Un Active',
        //             ])
        //         ])
        //         ->icon('heroicon-o-computer-desktop')
        //         ->iconPosition(IconPosition::After);
        //     } elseif ($serviceId == 3) {
        //         $tab->schema([
        //             Forms\Components\RichEditor::make('detail')
        //                 ->required(),
        //              Forms\Components\RichEditor::make('about')
        //                 ->required(),
        //         ])
        //         ->icon('heroicon-o-clipboard-document-list')
        //         ->iconPosition(IconPosition::After);
        //     }
        //     else{
        //         // for next id
        //     }

        //     $tabs[] = $tab;
        // }

        return $form
            ->schema([

                // Tabs::make('Tabs')
                //     ->tabs($tabs)
                //     ->columnSpanFull(),

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
    ->columnSpanFull()
    ->lazy(),
    // ->maxSize(1024 * 1024 * 5) // 5MB
    // ->acceptedFileTypes(['pdf', 'docx', 'doc', 'zip', 'rar']),
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
