<?php

namespace App\Filament\Resources\ServicePremium;

use App\Filament\Resources\ServicePremium\Pages\CreateServicePremium;
use App\Filament\Resources\ServicePremium\Pages\EditServicePremium;
use App\Filament\Resources\ServicePremium\Pages\ListServicePremiums;
use App\Filament\Resources\ServicePremium\Schemas\ServicePremiumForm;
use App\Filament\Resources\ServicePremium\Tables\ServicePremiumsTable;
use App\Models\ServicePremium;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ServicePremiumResource extends Resource
{
    protected static ?string $model = ServicePremium::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleGroup;

    protected static ?string $navigationLabel = 'Layanan Premium';

    protected static ?string $modelLabel = 'Layanan Premium';

    protected static ?string $pluralModelLabel = 'Layanan Premium';

    protected static string|\UnitEnum|null $navigationGroup = 'Layanan & Portofolio';

    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return ServicePremiumForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ServicePremiumsTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListServicePremiums::route('/'),
            'create' => CreateServicePremium::route('/create'),
            'edit' => EditServicePremium::route('/{record}/edit'),
        ];
    }
}
