<?php

namespace App\Filament\Resources\LandingSection;

use App\Filament\Resources\LandingSection\Pages\EditLandingSection;
use App\Filament\Resources\LandingSection\Pages\ListLandingSections;
use App\Filament\Resources\LandingSection\Schemas\LandingSectionForm;
use App\Filament\Resources\LandingSection\Tables\LandingSectionsTable;
use App\Models\LandingSection;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class LandingSectionResource extends Resource
{
    protected static ?string $model = LandingSection::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBars3BottomLeft;

    protected static ?string $navigationLabel = 'Urutan & Aktifasi Menu';

    protected static ?string $modelLabel = 'Urutan Menu';

    protected static ?string $pluralModelLabel = 'Urutan Menu';

    protected static string|\UnitEnum|null $navigationGroup = 'Pengaturan Landing Page';

    protected static ?int $navigationSort = 13;

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return LandingSectionForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return LandingSectionsTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListLandingSections::route('/'),
            'edit' => EditLandingSection::route('/{record}/edit'),
        ];
    }
}
