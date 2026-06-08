<?php

namespace App\Filament\Resources\LandingSection\Pages;

use App\Filament\Resources\LandingSection\LandingSectionResource;
use Filament\Resources\Pages\ListRecords;

class ListLandingSections extends ListRecords
{
    protected static string $resource = LandingSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // No CreateAction to prevent manual insertions of non-existent sections
        ];
    }
}
