<?php

namespace App\Filament\Resources\Activity;

use App\Filament\Resources\Activity\Pages\CreateActivity;
use App\Filament\Resources\Activity\Pages\EditActivity;
use App\Filament\Resources\Activity\Pages\ListActivities;
use App\Filament\Resources\Activity\Schemas\ActivityForm;
use App\Filament\Resources\Activity\Tables\ActivitiesTable;
use App\Models\Activity;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ActivityResource extends Resource
{
    protected static ?string $model = Activity::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedSparkles;

    protected static ?string $recordTitleAttribute = 'title';

    protected static ?string $navigationLabel = 'Aktifitas';

    protected static ?string $modelLabel = 'Aktifitas';

    protected static ?string $pluralModelLabel = 'Aktifitas';

    protected static string|\UnitEnum|null $navigationGroup = 'Pengaturan Landing Page';

    protected static ?int $navigationSort = 9;

    public static function form(Schema $schema): Schema
    {
        return ActivityForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ActivitiesTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListActivities::route('/'),
            'create' => CreateActivity::route('/create'),
            'edit' => EditActivity::route('/{record}/edit'),
        ];
    }
}
