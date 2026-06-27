<?php

namespace App\Filament\Resources\WorkStep\Pages;

use App\Filament\Resources\WorkStep\WorkStepResource;
use Filament\Resources\Pages\EditRecord;

class EditWorkStep extends EditRecord
{
    protected static string $resource = WorkStepResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
