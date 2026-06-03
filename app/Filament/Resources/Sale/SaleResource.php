<?php

namespace App\Filament\Resources\Sale;

use App\Filament\Resources\Sale\Pages\CreateSale;
use App\Filament\Resources\Sale\Pages\EditSale;
use App\Filament\Resources\Sale\Pages\ListSales;
use App\Filament\Resources\Sale\Schemas\SaleForm;
use App\Filament\Resources\Sale\Tables\SalesTable;
use App\Models\Sale;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SaleResource extends Resource
{
    protected static ?string $model = Sale::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedShoppingCart;

    protected static ?string $recordTitleAttribute = 'sale_number';

    protected static ?string $navigationLabel = 'Penjualan';

    protected static string|\UnitEnum|null $navigationGroup = 'ERP & Keuangan';

    public static function form(Schema $schema): Schema
    {
        return SaleForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SalesTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListSales::route('/'),
            'create' => CreateSale::route('/create'),
            'edit' => EditSale::route('/{record}/edit'),
        ];
    }
}
