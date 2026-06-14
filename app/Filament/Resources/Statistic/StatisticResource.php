<?php

namespace App\Filament\Resources\Statistic;

use App\Filament\Resources\Statistic\Pages\CreateStatistic;
use App\Filament\Resources\Statistic\Pages\EditStatistic;
use App\Filament\Resources\Statistic\Pages\ListStatistics;
use App\Filament\Resources\Statistic\Schemas\StatisticForm;
use App\Filament\Resources\Statistic\Tables\StatisticsTable;
use App\Models\Statistic;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class StatisticResource extends Resource
{
    protected static ?string $model = Statistic::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedPresentationChartBar;

    protected static ?string $navigationLabel = 'Statistik';

    protected static ?string $modelLabel = 'Statistik';

    protected static ?string $pluralModelLabel = 'Statistik';

    protected static string|\UnitEnum|null $navigationGroup = 'Pengaturan Landing Page';

    protected static ?int $navigationSort = 3;

    protected static ?string $recordTitleAttribute = 'label';

    public static function form(Schema $schema): Schema
    {
        return StatisticForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return StatisticsTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListStatistics::route('/'),
            'create' => CreateStatistic::route('/create'),
            'edit' => EditStatistic::route('/{record}/edit'),
        ];
    }
}
