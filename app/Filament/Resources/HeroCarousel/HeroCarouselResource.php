<?php

namespace App\Filament\Resources\HeroCarousel;

use App\Filament\Resources\HeroCarousel\Pages\CreateHeroCarousel;
use App\Filament\Resources\HeroCarousel\Pages\EditHeroCarousel;
use App\Filament\Resources\HeroCarousel\Pages\ListHeroCarousels;
use App\Filament\Resources\HeroCarousel\Schemas\HeroCarouselForm;
use App\Filament\Resources\HeroCarousel\Tables\HeroCarouselsTable;
use App\Models\HeroCarousel;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class HeroCarouselResource extends Resource
{
    protected static ?string $model = HeroCarousel::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedSquare2Stack;

    protected static ?string $navigationLabel = 'Hero with Carousel';

    protected static ?string $modelLabel = 'Hero with Carousel';

    protected static ?string $pluralModelLabel = 'Hero with Carousel';

    protected static string|\UnitEnum|null $navigationGroup = 'Hero';

    protected static ?int $navigationSort = 3;

    public static function form(Schema $schema): Schema
    {
        return HeroCarouselForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HeroCarouselsTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListHeroCarousels::route('/'),
            'create' => CreateHeroCarousel::route('/create'),
            'edit' => EditHeroCarousel::route('/{record}/edit'),
        ];
    }
}
