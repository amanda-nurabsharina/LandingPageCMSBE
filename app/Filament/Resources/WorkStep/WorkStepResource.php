<?php

namespace App\Filament\Resources\WorkStep;

use App\Filament\Resources\WorkStep\Pages\CreateWorkStep;
use App\Filament\Resources\WorkStep\Pages\EditWorkStep;
use App\Filament\Resources\WorkStep\Pages\ListWorkSteps;
use App\Filament\Resources\WorkStep\Schemas\WorkStepForm;
use App\Filament\Resources\WorkStep\Tables\WorkStepsTable;
use App\Models\WorkStep;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class WorkStepResource extends Resource
{
    protected static ?string $model = WorkStep::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedArrowPath;

    protected static ?string $navigationLabel = 'Cara Kerja';

    protected static ?string $modelLabel = 'Langkah Kerja';

    protected static ?string $pluralModelLabel = 'Langkah Kerja';

    protected static string|\UnitEnum|null $navigationGroup = 'Pengaturan Landing Page';

    protected static ?int $navigationSort = 7;

    public static function form(Schema $schema): Schema
    {
        return WorkStepForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return WorkStepsTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListWorkSteps::route('/'),
            'create' => CreateWorkStep::route('/create'),
            'edit' => EditWorkStep::route('/{record}/edit'),
        ];
    }
}
