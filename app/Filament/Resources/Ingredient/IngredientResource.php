<?php

namespace App\Filament\Resources\Ingredient;

use App\Filament\Resources\Ingredient\Pages\CreateIngredient;
use App\Filament\Resources\Ingredient\Pages\EditIngredient;
use App\Filament\Resources\Ingredient\Pages\ListIngredients;
use App\Filament\Resources\Ingredient\Schemas\IngredientForm;
use App\Filament\Resources\Ingredient\Tables\IngredientsTable;
use App\Models\Ingredient;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class IngredientResource extends Resource
{
    protected static ?string $model = Ingredient::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCube;

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $navigationLabel = 'Bahan Baku';

    protected static ?string $modelLabel = 'Bahan Baku';

    protected static ?string $pluralModelLabel = 'Bahan Baku';

    protected static string|\UnitEnum|null $navigationGroup = 'ERP & Keuangan';

    public static function form(Schema $schema): Schema
    {
        return IngredientForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return IngredientsTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListIngredients::route('/'),
            'create' => CreateIngredient::route('/create'),
            'edit' => EditIngredient::route('/{record}/edit'),
        ];
    }
}
