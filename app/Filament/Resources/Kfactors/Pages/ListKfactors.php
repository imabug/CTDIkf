<?php

namespace App\Filament\Resources\Kfactors\Pages;

use App\Filament\Resources\Kfactors\KfactorResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListKfactors extends ListRecords
{
    protected static string $resource = KfactorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
