<?php

namespace App\Filament\Resources\CtaSection;

use App\Filament\Resources\CtaSection\Pages\CreateCtaSection;
use App\Filament\Resources\CtaSection\Pages\EditCtaSection;
use App\Filament\Resources\CtaSection\Pages\ListCtaSections;
use App\Filament\Resources\CtaSection\Schemas\CtaSectionForm;
use App\Filament\Resources\CtaSection\Tables\CtaSectionsTable;
use App\Models\CtaSection;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CtaSectionResource extends Resource
{
    protected static ?string $model = CtaSection::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedMegaphone;

    protected static ?string $navigationLabel = 'Banner CTA';

    protected static ?string $modelLabel = 'Banner CTA';

    protected static ?string $pluralModelLabel = 'Banner CTA';

    protected static string|\UnitEnum|null $navigationGroup = 'Konten & Promosi';

    protected static ?int $navigationSort = 3;

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return CtaSectionForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CtaSectionsTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCtaSections::route('/'),
            'create' => CreateCtaSection::route('/create'),
            'edit' => EditCtaSection::route('/{record}/edit'),
        ];
    }
}
