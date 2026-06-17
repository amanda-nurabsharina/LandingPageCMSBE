<?php

namespace App\Filament\Resources\Activity\Pages;

use App\Filament\Resources\Activity\ActivityResource;
use Filament\Resources\Pages\CreateRecord;

class CreateActivity extends CreateRecord
{
    protected static string $resource = ActivityResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
