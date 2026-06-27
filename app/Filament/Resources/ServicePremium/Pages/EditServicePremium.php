<?php

namespace App\Filament\Resources\ServicePremium\Pages;

use App\Filament\Resources\ServicePremium\ServicePremiumResource;
use Filament\Resources\Pages\EditRecord;

class EditServicePremium extends EditRecord
{
    protected static string $resource = ServicePremiumResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
