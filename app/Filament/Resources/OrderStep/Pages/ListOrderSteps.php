<?php

namespace App\Filament\Resources\OrderStep\Pages;

use App\Filament\Resources\OrderStep\OrderStepResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListOrderSteps extends ListRecords
{
    protected static string $resource = OrderStepResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
