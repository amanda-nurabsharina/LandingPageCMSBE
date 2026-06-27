<?php

namespace App\Filament\Resources\AboutItem\Pages;

use App\Filament\Resources\AboutItem\AboutItemResource;
use Filament\Resources\Pages\CreateRecord;

class CreateAboutItem extends CreateRecord
{
    protected static string $resource = AboutItemResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
