<?php

namespace App\Filament\Resources\LandingSection\Pages;

use App\Filament\Resources\LandingSection\LandingSectionResource;
use Filament\Resources\Pages\EditRecord;

class EditLandingSection extends EditRecord
{
    protected static string $resource = LandingSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // No DeleteAction to prevent deleting fixed system sections
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
