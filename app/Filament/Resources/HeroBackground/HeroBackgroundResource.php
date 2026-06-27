<?php

namespace App\Filament\Resources\HeroBackground;

use App\Filament\Resources\HeroBackground\Pages\CreateHeroBackground;
use App\Filament\Resources\HeroBackground\Pages\EditHeroBackground;
use App\Filament\Resources\HeroBackground\Pages\ListHeroBackgrounds;
use App\Filament\Resources\HeroBackground\Schemas\HeroBackgroundForm;
use App\Filament\Resources\HeroBackground\Tables\HeroBackgroundsTable;
use App\Models\HeroBackground;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class HeroBackgroundResource extends Resource
{
    protected static ?string $model = HeroBackground::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedPhoto;

    protected static ?string $navigationLabel = 'Hero with Background';

    protected static ?string $modelLabel = 'Hero with Background';

    protected static ?string $pluralModelLabel = 'Hero with Background';

    protected static string|\UnitEnum|null $navigationGroup = 'Pengaturan Landing Page';

    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return HeroBackgroundForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HeroBackgroundsTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListHeroBackgrounds::route('/'),
            'create' => CreateHeroBackground::route('/create'),
            'edit' => EditHeroBackground::route('/{record}/edit'),
        ];
    }
}
