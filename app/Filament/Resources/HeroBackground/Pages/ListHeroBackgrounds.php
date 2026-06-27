<?php

namespace App\Filament\Resources\HeroBackground\Pages;

use App\Filament\Resources\HeroBackground\HeroBackgroundResource;
use App\Models\HeroBackground;
use Filament\Resources\Pages\ListRecords;

class ListHeroBackgrounds extends ListRecords
{
    protected static string $resource = HeroBackgroundResource::class;

    public function mount(): void
    {
        $record = HeroBackground::firstOrCreate([
            'id' => 1
        ], [
            'badge' => 'Bisnis Digital',
            'title' => 'Wujudkan Ide Anda Dalam Cetakan',
            'subtitle' => 'Temukan solusi percetakan digital berkualitas terbaik untuk spanduk, brosur, stiker, dan kemasan Anda.',
            'primary_btn_text' => 'Pesan Sekarang',
            'secondary_btn_text' => 'Layanan Kami',
        ]);
        
        $this->redirect($this->getResource()::getUrl('edit', ['record' => $record]));
    }
}
