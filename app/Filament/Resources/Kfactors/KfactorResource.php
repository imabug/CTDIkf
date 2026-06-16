<?php

namespace App\Filament\Resources\Kfactors;

use App\Filament\Resources\Kfactors\Pages\CreateKfactor;
use App\Filament\Resources\Kfactors\Pages\EditKfactor;
use App\Filament\Resources\Kfactors\Pages\ListKfactors;
use App\Filament\Resources\Kfactors\Pages\ViewKfactor;
use App\Filament\Resources\Kfactors\Schemas\KfactorForm;
use App\Filament\Resources\Kfactors\Schemas\KfactorInfolist;
use App\Filament\Resources\Kfactors\Tables\KfactorsTable;
use App\Models\Kfactor;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KfactorResource extends Resource
{
    protected static ?string $model = Kfactor::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return KfactorForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return KfactorInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return KfactorsTable::configure($table);
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
            'index' => ListKfactors::route('/'),
            'create' => CreateKfactor::route('/create'),
            'view' => ViewKfactor::route('/{record}'),
            'edit' => EditKfactor::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
