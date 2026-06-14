<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;
use App\Models\AnalyticsEvent;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\HtmlString;

class PopularPagesWidget extends Widget
{
    protected static ?int $sort = 5;

    protected int | string | array $columnSpan = 'full';

    protected string $view = 'filament.widgets.popular-pages-widget';

    public function getHeading(): string|HtmlString
    {
        return new HtmlString('
            <div style="display:flex;align-items:center;gap:8px;">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width:20px;height:20px;color:#9ca3af;">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z" />
                </svg>
                Halaman Terpopuler
            </div>
        ');
    }

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
                    $iconColor = 'gray';

                    if ($lower === 'home') {
                        $icon = 'heroicon-o-home';
                        $iconColor = 'primary';
                    } elseif (str_contains($lower, 'berita') || str_contains($lower, 'news') || str_contains($lower, 'kumpulan')) {
                        $icon = 'heroicon-o-document-text';
                        $iconColor = 'success';
                    } elseif (str_contains($lower, 'kegiatan') || str_contains($lower, 'aktifitas') || str_contains($lower, 'aktivitas') || str_contains($lower, 'dokumentasi')) {
                        $icon = 'heroicon-o-sparkles';
                        $iconColor = 'warning';
                    }

                    return [
                        'name' => $name,
                        'views' => $item->views,
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
