<?php

namespace App\Filament\Resources\HeroSection\Pages;

use App\Filament\Resources\HeroSection\HeroSectionResource;
use App\Models\HeroSection;
use Filament\Resources\Pages\ListRecords;

class ListHeroSections extends ListRecords
{
    protected static string $resource = HeroSectionResource::class;

    public function mount(): void
    {
        $record = HeroSection::firstOrCreate([
            'id' => 1
        ], [
            'badge' => 'Percetakan Digital',
            'title' => 'Wujudkan Ide Anda Dalam Cetakan',
            'subtitle' => 'Temukan solusi percetakan digital berkualitas terbaik untuk spanduk, brosur, stiker, dan kemasan Anda.',
            'primary_btn_text' => 'Pesan Sekarang',
            'secondary_btn_text' => 'Layanan Kami',
        ]);
        
        $this->redirect($this->getResource()::getUrl('edit', ['record' => $record]));
    }
}
