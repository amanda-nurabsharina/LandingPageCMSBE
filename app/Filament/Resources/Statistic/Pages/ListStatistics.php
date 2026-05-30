<?php

namespace App\Filament\Resources\Statistic\Pages;

use App\Filament\Resources\Statistic\StatisticResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListStatistics extends ListRecords
{
    protected static string $resource = StatisticResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
