<?php

namespace App\Filament\Resources\Kfactors\Tables;

use App\Models\Kfactor;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Grouping\Group;
use Filament\Tables\Table;
use Illuminate\Support\Facades\DB;

class KfactorsTable
{
    private function scanners(): array
    {
        /**
         * Return an array of scanners to be used in filter options
         */

        return [];
    }

    private function manufacturers(): array
    {
        /**
         * return an array of manufacturers to be used in filter options
         */
        return [];
    }

    private function nt(): array
    {
        /**
         * Return an array of collimated widths to be used in filter options
         */
        return [];
    }

    private function kv(): array
    {
        /**
         * Return an array of tube voltages to be used in filter options
         */
        return [];
    }

    private function width(): array
    {
        /**
         * Return an array of collimated widths to be used in filter options
         */
        return [];
    }

    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('scanner')
                    ->searchable()
                    ->visible(function ($livewire) {
                        $filterState = $livewire->getTableFilterState('scanner');
                        if ($filterState == null
                        || (is_array($filterState) && $filterState['value'] == "")
                        ) {
                            return true;
                        } else {
                            return false;
                        }
                    }),
                TextColumn::make('manufacturer')
                    ->searchable()
                    ->visible(function ($livewire) {
                        $filterState = $livewire->getTableFilterState('scanner');
                        if ($filterState == null
                        || (is_array($filterState) && $filterState['value'] == "")
                        ) {
                            return true;
                        } else {
                            return false;
                        }
                    }),
                TextColumn::make('phantom_diameter')
                    ->label('Phantom diameter (cm)')
                    ->numeric()
                    ->sortable()
                    ->wrap(),
                TextColumn::make('shaped_filter')
                    ->searchable()
                    ->wrap(),
                TextColumn::make('kv')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('spectral_filter')
                    ->searchable()
                    ->wrap(),
                TextColumn::make('coll_NT')
                    ->label('NxT')
                    ->sortable(),
                TextColumn::make('coll_width')
                    ->label('Collimation width (mm)')
                    ->numeric()
                    ->sortable()
                    ->wrap(),
                TextColumn::make('ctdi100_center')
                    ->label('CTDI(100) center')
                    ->numeric()
                    ->sortable()
                    ->wrap(),
                TextColumn::make('ctdi_w')
                    ->label('CTDIw')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('k_factor')
                    ->numeric()
                    ->sortable(),
            ])
            ->groups([
                Group::make('manufacturer')
                    ->collapsible(),
                Group::make('scanner')
                    ->collapsible(),
                Group::make('phantom_diameter')
                    ->label('Phantom Diameter')
                    ->collapsible(),
            ])
            ->defaultGroup('scanner')
            ->filters([
                TrashedFilter::make(),
                SelectFilter::make('scanner')
                    ->options(Kfactor::get()->pluck('scanner')->unique())
                    ->searchable(),
                SelectFilter::make('phantom_diameter')
                    ->options([
                        '16' => '16 cm',
                        '32' => '32 cm',
                    ]),
                SelectFilter::make('coll_width')
                    ->label('Collimated width (mm)'),
                SelectFilter::make('kv')
                    ->label('kV'),
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
