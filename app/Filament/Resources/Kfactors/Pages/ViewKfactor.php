<?php

namespace App\Filament\Resources\Kfactors\Pages;

use App\Filament\Resources\Kfactors\KfactorResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewKfactor extends ViewRecord
{
    protected static string $resource = KfactorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
