<?php

namespace App\Filament\Resources\OrderStep\Pages;

use App\Filament\Resources\OrderStep\OrderStepResource;
use Filament\Resources\Pages\EditRecord;

class EditOrderStep extends EditRecord
{
    protected static string $resource = OrderStepResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
