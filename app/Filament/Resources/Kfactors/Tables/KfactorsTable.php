<?php

namespace App\Filament\Resources\Kfactors\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class KfactorsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('scanner.id')
                    ->searchable(),
                TextColumn::make('manufacturer.id')
                    ->searchable(),
                TextColumn::make('phantom_diameter')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('shaped_filter')
                    ->searchable(),
                TextColumn::make('kv')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('spectral_filter')
                    ->searchable(),
                TextColumn::make('coll_N')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('coll_T')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('coll_width')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('ctdi100_center')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('ctdi_w')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('k_factor')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ]);
    }
}
