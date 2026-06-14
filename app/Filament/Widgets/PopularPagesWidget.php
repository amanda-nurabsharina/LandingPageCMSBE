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
                    return [
                        'name' => $item->page_name ?? 'Unknown',
                        'views' => number_format($item->views, 0, ',', '.'),
                    ];
                })
                ->toArray();
        } catch (\Exception $e) {
            return [];
        }
    }
}
