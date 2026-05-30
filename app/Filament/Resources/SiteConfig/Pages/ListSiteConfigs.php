<?php

namespace App\Filament\Resources\SiteConfig\Pages;

use App\Filament\Resources\SiteConfig\SiteConfigResource;
use App\Models\SiteConfig;
use Filament\Resources\Pages\ListRecords;

class ListSiteConfigs extends ListRecords
{
    protected static string $resource = SiteConfigResource::class;

    public function mount(): void
    {
        $record = SiteConfig::firstOrCreate([
            'id' => 1
        ], [
            'site_name' => 'PrintHub',
            'whatsapp_number' => '628123456789',
        ]);
        
        $this->redirect($this->getResource()::getUrl('edit', ['record' => $record]));
    }
}
