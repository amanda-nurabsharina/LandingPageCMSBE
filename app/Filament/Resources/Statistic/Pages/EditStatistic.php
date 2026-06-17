<?php

namespace App\Filament\Resources\Statistic\Pages;

use App\Filament\Resources\Statistic\StatisticResource;
use Filament\Resources\Pages\EditRecord;

class EditStatistic extends EditRecord
{
    protected static string $resource = StatisticResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
