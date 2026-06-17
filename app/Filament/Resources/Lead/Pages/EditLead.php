<?php

namespace App\Filament\Resources\Lead\Pages;

use App\Filament\Resources\Lead\LeadResource;
use Filament\Resources\Pages\EditRecord;

class EditLead extends EditRecord
{
    protected static string $resource = LeadResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Hanya izinkan hapus dari detail, tidak ada aksi edit/update data
            \Filament\Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
