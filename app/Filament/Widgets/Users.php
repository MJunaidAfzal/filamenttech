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

    protected static bool $isLazy = false;


    public function table(Table $table): Table
    {
        return $table
            ->query(User::query())
            ->defaultSort('created_at', 'desc')

            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('User Name')
                    ->searchable()
                    ->sortable()
                    ->tooltip(fn (User $record) => 'User: ' . $record->name),

                Tables\Columns\TextColumn::make('role.name')
                    ->label('Role Name')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('email')
                    ->label('Email Address')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Registered On')
                    ->dateTime('d M Y')
                    ->sortable(),
            ]);
    }
}
