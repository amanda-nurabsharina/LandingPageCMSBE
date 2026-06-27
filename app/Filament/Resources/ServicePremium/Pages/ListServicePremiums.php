<?php

namespace App\Filament\Resources\ServicePremium\Pages;

use App\Filament\Resources\ServicePremium\ServicePremiumResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListServicePremiums extends ListRecords
{
    protected static string $resource = ServicePremiumResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
