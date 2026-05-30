<?php

namespace App\Filament\Resources\SiteConfig;

use App\Filament\Resources\SiteConfig\Pages\CreateSiteConfig;
use App\Filament\Resources\SiteConfig\Pages\EditSiteConfig;
use App\Filament\Resources\SiteConfig\Pages\ListSiteConfigs;
use App\Filament\Resources\SiteConfig\Schemas\SiteConfigForm;
use App\Filament\Resources\SiteConfig\Tables\SiteConfigsTable;
use App\Models\SiteConfig;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SiteConfigResource extends Resource
{
    protected static ?string $model = SiteConfig::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCog;

    protected static ?string $navigationLabel = 'General Settings';

    protected static ?string $modelLabel = 'General Setting';

    public static function form(Schema $schema): Schema
    {
        return SiteConfigForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SiteConfigsTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListSiteConfigs::route('/'),
            'create' => CreateSiteConfig::route('/create'),
            'edit' => EditSiteConfig::route('/{record}/edit'),
        ];
    }
}
