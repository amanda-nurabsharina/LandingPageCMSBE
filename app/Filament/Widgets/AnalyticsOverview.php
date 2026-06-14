<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class AnalyticsOverview extends BaseWidget
{
    protected static ?int $sort = 2;

    protected function getStats(): array
    {
        $startOfMonth = now()->startOfMonth();
        $endOfMonth = now()->endOfMonth();

        // Count unique visitors by session_id in the current month
        $visitors = \App\Models\AnalyticsEvent::whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->distinct('session_id')
            ->count('session_id');

        // Count page views in the current month
        $pageViews = \App\Models\AnalyticsEvent::where('event_type', 'page_view')
            ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->count();

        // Count WA clicks in the current month
        $waClicks = \App\Models\AnalyticsEvent::where('event_type', 'click_wa')
            ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->count();

        // Count leads in the current month
        $leads = \App\Models\AnalyticsEvent::where('event_type', 'lead_submitted')
            ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->count();

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
