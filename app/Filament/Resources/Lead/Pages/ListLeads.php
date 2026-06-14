<?php

namespace App\Filament\Resources\Lead\Pages;

use App\Filament\Resources\Lead\LeadResource;
use Filament\Resources\Pages\ListRecords;

class ListLeads extends ListRecords
{
    protected static string $resource = LeadResource::class;

    protected function getHeaderActions(): array
    {
        return []; // Leads hanya dibuat dari frontend
    }
}
