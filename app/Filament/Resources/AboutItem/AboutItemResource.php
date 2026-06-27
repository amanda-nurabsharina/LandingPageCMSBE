<?php

namespace App\Filament\Resources\AboutItem;

use App\Filament\Resources\AboutItem\Pages\CreateAboutItem;
use App\Filament\Resources\AboutItem\Pages\EditAboutItem;
use App\Filament\Resources\AboutItem\Pages\ListAboutItems;
use App\Filament\Resources\AboutItem\Schemas\AboutItemForm;
use App\Filament\Resources\AboutItem\Tables\AboutItemsTable;
use App\Models\AboutItem;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class AboutItemResource extends Resource
{
    protected static ?string $model = AboutItem::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedInformationCircle;

    protected static ?string $navigationLabel = 'Tentang Kami';

    protected static ?string $modelLabel = 'Tentang Kami';

    protected static ?string $pluralModelLabel = 'Tentang Kami';

    protected static string|\UnitEnum|null $navigationGroup = 'Pengaturan Landing Page';

    protected static ?int $navigationSort = 3;

    public static function form(Schema $schema): Schema
    {
        return AboutItemForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AboutItemsTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListAboutItems::route('/'),
            'create' => CreateAboutItem::route('/create'),
            'edit' => EditAboutItem::route('/{record}/edit'),
        ];
    }
}
