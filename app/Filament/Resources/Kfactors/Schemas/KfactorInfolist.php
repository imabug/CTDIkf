<?php

namespace App\Filament\Resources\Kfactors\Schemas;

use App\Models\Kfactor;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class KfactorInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('scanner.id')
                    ->label('Scanner'),
                TextEntry::make('manufacturer.id')
                    ->label('Manufacturer'),
                TextEntry::make('phantom_diameter')
                    ->numeric(),
                TextEntry::make('shaped_filter')
                    ->placeholder('-'),
                TextEntry::make('kv')
                    ->numeric(),
                TextEntry::make('spectral_filter')
                    ->placeholder('-'),
                TextEntry::make('coll_N')
                    ->numeric(),
                TextEntry::make('coll_T')
                    ->numeric(),
                TextEntry::make('coll_width')
                    ->numeric(),
                TextEntry::make('ctdi100_center')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('ctdi_w')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('k_factor')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('deleted_at')
                    ->dateTime()
                    ->visible(fn(Kfactor $record): bool => $record->trashed()),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
