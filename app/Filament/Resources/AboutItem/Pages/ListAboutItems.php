<?php

namespace App\Filament\Resources\AboutItem\Pages;

use App\Filament\Resources\AboutItem\AboutItemResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAboutItems extends ListRecords
{
    protected static string $resource = AboutItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
