<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;
use App\Models\AnalyticsEvent;
use Illuminate\Support\Facades\DB;

class PopularPagesWidget extends Widget
{
    protected static ?int $sort = 5;

    protected int | string | array $columnSpan = 'full';

    protected string $view = 'filament.widgets.popular-pages-widget';

    public function getPageData(): array
    {
        try {
            return AnalyticsEvent::query()
                ->select('page_name', DB::raw('count(*) as views'))
                ->where('event_type', 'page_view')
                ->groupBy('page_name')
                ->orderByDesc(DB::raw('count(*)'))
                ->limit(10)
                ->get()
                ->map(function ($item) {
                    $name = $item->page_name ?? 'Unknown';
                    $lower = strtolower($name);

                    $icon = 'heroicon-o-document';
                    $iconColor = '#6b7280'; // gray

                    if ($lower === 'home') {
                        $icon = 'heroicon-o-home';
                        $iconColor = '#3b82f6'; // blue
                    } elseif (str_contains($lower, 'berita') || str_contains($lower, 'news')) {
                        $icon = 'heroicon-o-document-text';
                        $iconColor = '#10b981'; // green
                    } elseif (str_contains($lower, 'kegiatan') || str_contains($lower, 'aktifitas') || str_contains($lower, 'aktivitas') || str_contains($lower, 'dokumentasi')) {
                        $icon = 'heroicon-o-sparkles';
                        $iconColor = '#f59e0b'; // amber
                    }

                    return [
                        'name' => $name,
                        'views' => number_format($item->views, 0, ',', '.'),
                        'icon' => $icon,
                        'iconColor' => $iconColor,
                    ];
                })
                ->toArray();
        } catch (\Exception $e) {
            return [];
        }
    }
}
