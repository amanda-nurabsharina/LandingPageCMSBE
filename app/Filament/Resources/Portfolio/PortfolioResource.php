<?php

namespace App\Filament\Resources\Portfolio;

use App\Filament\Resources\Portfolio\Pages\CreatePortfolio;
use App\Filament\Resources\Portfolio\Pages\EditPortfolio;
use App\Filament\Resources\Portfolio\Pages\ListPortfolios;
use App\Filament\Resources\Portfolio\Schemas\PortfolioForm;
use App\Filament\Resources\Portfolio\Tables\PortfoliosTable;
use App\Models\Portfolio;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PortfolioResource extends Resource
{
    protected static ?string $model = Portfolio::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedPhoto;

    protected static ?string $navigationLabel = 'Portofolio';

    protected static ?string $modelLabel = 'Portofolio';

    protected static ?string $pluralModelLabel = 'Portofolio';

    protected static string|\UnitEnum|null $navigationGroup = 'Pengaturan Landing Page';

    protected static ?int $navigationSort = 5;

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return PortfolioForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PortfoliosTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPortfolios::route('/'),
            'create' => CreatePortfolio::route('/create'),
            'edit' => EditPortfolio::route('/{record}/edit'),
        ];
    }
}
