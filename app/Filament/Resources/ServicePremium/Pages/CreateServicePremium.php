<?php

namespace App\Filament\Resources\ServicePremium\Pages;

use App\Filament\Resources\ServicePremium\ServicePremiumResource;
use Filament\Resources\Pages\CreateRecord;

class CreateServicePremium extends CreateRecord
{
    protected static string $resource = ServicePremiumResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
