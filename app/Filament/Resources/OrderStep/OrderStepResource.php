<?php

namespace App\Filament\Resources\OrderStep;

use App\Filament\Resources\OrderStep\Pages\CreateOrderStep;
use App\Filament\Resources\OrderStep\Pages\EditOrderStep;
use App\Filament\Resources\OrderStep\Pages\ListOrderSteps;
use App\Filament\Resources\OrderStep\Schemas\OrderStepForm;
use App\Filament\Resources\OrderStep\Tables\OrderStepsTable;
use App\Models\OrderStep;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class OrderStepResource extends Resource
{
    protected static ?string $model = OrderStep::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedQueueList;

    protected static ?string $navigationLabel = 'Langkah Pemesanan';

    protected static ?string $modelLabel = 'Langkah Pemesanan';

    protected static ?string $pluralModelLabel = 'Langkah Pemesanan';

    protected static string|\UnitEnum|null $navigationGroup = 'Layanan & Portofolio';

    protected static ?int $navigationSort = 4;

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return OrderStepForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return OrderStepsTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListOrderSteps::route('/'),
            'create' => CreateOrderStep::route('/create'),
            'edit' => EditOrderStep::route('/{record}/edit'),
        ];
    }
}
