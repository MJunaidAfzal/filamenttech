<?php

namespace App\Filament\Widgets;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use App\Models\User;

class Users extends BaseWidget
{
    protected static ?int $sort = 2;

    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(User::query())
            ->defaultSort('created_at','desc')

            ->columns([
            Tables\Columns\TextColumn::make('name')
                ->searchable(),
            Tables\Columns\TextColumn::make('role.name')
                ->label('Role Name')
                ->searchable()
                ->toggleable()
                ->sortable(),
            Tables\Columns\TextColumn::make('email')
                ->searchable(),
            ]);
    }
}
