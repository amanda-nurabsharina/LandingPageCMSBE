<?php

namespace App\Filament\Resources\OrderStep\Pages;

use App\Filament\Resources\OrderStep\OrderStepResource;
use Filament\Resources\Pages\CreateRecord;

class CreateOrderStep extends CreateRecord
{
    protected static string $resource = OrderStepResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
