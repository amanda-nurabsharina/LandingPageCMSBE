<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class AnalyticsOverview extends BaseWidget
{
    protected static ?int $sort = 3;

    protected function getStats(): array
    {
        // Data berikut merupakan sampel awal (mockup).
        // Nanti dapat dihubungkan ke real data tracking dari Frontend CMS.
        $visitors = 5241;
        $pageViews = 14876;
        $waClicks = 356;
        $leads = 72;

        return [
            Stat::make('Visitor Bulan Ini', number_format($visitors, 0, ',', '.'))
                ->description('Pengunjung unik landing page')
                ->descriptionIcon('heroicon-m-users')
                ->color('info'),
            Stat::make('Page View', number_format($pageViews, 0, ',', '.'))
                ->description('Total halaman yang dilihat')
                ->descriptionIcon('heroicon-m-eye')
                ->color('success'),
            Stat::make('Klik WA', number_format($waClicks, 0, ',', '.'))
                ->description('Total klik tombol WhatsApp')
                ->descriptionIcon('heroicon-m-chat-bubble-left-right')
                ->color('success'),
            Stat::make('Leads Masuk', number_format($leads, 0, ',', '.'))
                ->description('Pesan / leads yang masuk')
                ->descriptionIcon('heroicon-m-envelope')
                ->color('warning'),
        ];
    }
}
