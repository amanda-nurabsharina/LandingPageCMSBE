<?php

namespace App\Filament\Resources\WorkStep\Pages;

use App\Filament\Resources\WorkStep\WorkStepResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListWorkSteps extends ListRecords
{
    protected static string $resource = WorkStepResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
