<?php

namespace App\Filament\Resources\CtaSection\Pages;

use App\Filament\Resources\CtaSection\CtaSectionResource;
use App\Models\CtaSection;
use Filament\Resources\Pages\ListRecords;

class ListCtaSections extends ListRecords
{
    protected static string $resource = CtaSectionResource::class;

    public function mount(): void
    {
        $record = CtaSection::firstOrCreate([
            'id' => 1
        ], [
            'title' => 'Siap Mencetak Ide Anda?',
            'subtitle' => 'Yuk, mulai konsultasi gratis dengan tim ahli kami untuk mendapatkan hasil terbaik untuk bisnismu!',
            'btn_text' => 'Pesan Sekarang',
            'btn_url' => 'whatsapp',
        ]);
        
        $this->redirect($this->getResource()::getUrl('edit', ['record' => $record]));
    }
}
