<?php

namespace App\Filament\Resources\HeroCarousel\Pages;

use App\Filament\Resources\HeroCarousel\HeroCarouselResource;
use App\Models\HeroCarousel;
use Filament\Resources\Pages\ListRecords;

class ListHeroCarousels extends ListRecords
{
    protected static string $resource = HeroCarouselResource::class;

    public function mount(): void
    {
        $record = HeroCarousel::firstOrCreate([
            'id' => 1
        ], [
            'badge' => 'Promo Unggulan',
            'title' => 'Wujudkan Ide Anda Dalam Cetakan',
            'subtitle' => 'Temukan solusi percetakan digital berkualitas terbaik untuk spanduk, brosur, stiker, dan kemasan Anda.',
            'primary_btn_text' => 'Pesan Sekarang',
            'secondary_btn_text' => 'Layanan Kami',
        ]);
        
        $this->redirect($this->getResource()::getUrl('edit', ['record' => $record]));
    }
}
