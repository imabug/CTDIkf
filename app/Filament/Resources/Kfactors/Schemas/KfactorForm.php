<?php

namespace App\Filament\Resources\Kfactors\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class KfactorForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('scanner_id')
                    ->relationship('scanner', 'id')
                    ->required(),
                Select::make('manufacturer_id')
                    ->relationship('manufacturer', 'id')
                    ->required(),
                TextInput::make('phantom_diameter')
                    ->required()
                    ->numeric(),
                TextInput::make('shaped_filter'),
                TextInput::make('kv')
                    ->required()
                    ->numeric(),
                TextInput::make('spectral_filter'),
                TextInput::make('coll_N')
                    ->required()
                    ->numeric(),
                TextInput::make('coll_T')
                    ->required()
                    ->numeric(),
                TextInput::make('coll_width')
                    ->required()
                    ->numeric(),
                TextInput::make('ctdi100_center')
                    ->numeric(),
                TextInput::make('ctdi_w')
                    ->numeric(),
                TextInput::make('k_factor')
                    ->numeric(),
            ]);
    }
}
