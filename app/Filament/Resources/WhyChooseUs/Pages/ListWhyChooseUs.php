<?php

namespace App\Filament\Resources\WhyChooseUs\Pages;

use App\Filament\Resources\WhyChooseUs\WhyChooseUsResource;
use App\Models\WhyChooseUs;
use Filament\Resources\Pages\ListRecords;

class ListWhyChooseUs extends ListRecords
{
    protected static string $resource = WhyChooseUsResource::class;

    public function mount(): void
    {
        $record = WhyChooseUs::firstOrCreate([
            'id' => 1
        ], [
            'title' => 'Mengapa Memilih Kami?',
            'subtitle' => 'Prioritas utama kami adalah memberikan hasil cetak dengan kualitas premium, pengerjaan cepat, dan pelayanan terbaik untuk Anda.',
            'features' => [
                'Kualitas cetak tajam & presisi',
                'Tim desainer profesional',
                'Pengerjaan cepat & tepat waktu',
                'Harga terjangkau & kompetitif',
            ],
        ]);
        
        $this->redirect($this->getResource()::getUrl('edit', ['record' => $record]));
    }
}
