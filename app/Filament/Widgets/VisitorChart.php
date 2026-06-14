<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class VisitorChart extends ChartWidget
{
    protected ?string $heading = 'Grafik Pengunjung (Visitor)';

    protected static ?int $sort = 4;

    protected int | string | array $columnSpan = 1;

    public ?string $filter = 'week';

    protected function getFilters(): ?array
    {
        return [
            'today' => 'Hari Ini',
            'week' => 'Minggu Ini',
            'month' => 'Bulan Ini',
        ];
    }

    protected function getData(): array
    {
        $activeFilter = $this->filter;

        $labels = [];
        $visitorData = [];

        // Query real-time data based on filter
        switch ($activeFilter) {
            case 'today':
                $labels = ['00:00 - 04:00', '04:00 - 08:00', '08:00 - 12:00', '12:00 - 16:00', '16:00 - 20:00', '20:00 - 00:00'];
                for ($i = 0; $i < 6; $i++) {
                    $startHour = $i * 4;
                    $endHour = ($i + 1) * 4 - 1;
                    $startTime = now()->startOfDay()->addHours($startHour);
                    $endTime = now()->startOfDay()->addHours($endHour)->addMinutes(59)->addSeconds(59);

                    $visitorData[] = \App\Models\AnalyticsEvent::whereBetween('created_at', [$startTime, $endTime])
                        ->distinct('session_id')
                        ->count('session_id');
                }
                break;

            case 'week':
                $dayNames = [
                    1 => 'Senin',
                    2 => 'Selasa',
                    3 => 'Rabu',
                    4 => 'Kamis',
                    5 => 'Jumat',
                    6 => 'Sabtu',
                    0 => 'Minggu',
                ];

                for ($i = 6; $i >= 0; $i--) {
                    $date = now()->subDays($i);
                    $labels[] = $dayNames[$date->dayOfWeek];
                    
                    $startTime = $date->copy()->startOfDay();
                    $endTime = $date->copy()->endOfDay();

                    $visitorData[] = \App\Models\AnalyticsEvent::whereBetween('created_at', [$startTime, $endTime])
                        ->distinct('session_id')
                        ->count('session_id');
                }
                break;

            case 'month':
                $labels = ['Minggu 1', 'Minggu 2', 'Minggu 3', 'Minggu 4'];
                
                // Week 1
                $visitorData[] = \App\Models\AnalyticsEvent::whereBetween('created_at', [
                    now()->startOfMonth(),
                    now()->startOfMonth()->addDays(6)->endOfDay()
                ])->distinct('session_id')->count('session_id');

                // Week 2
                $visitorData[] = \App\Models\AnalyticsEvent::whereBetween('created_at', [
                    now()->startOfMonth()->addDays(7)->startOfDay(),
                    now()->startOfMonth()->addDays(13)->endOfDay()
                ])->distinct('session_id')->count('session_id');

                // Week 3
                $visitorData[] = \App\Models\AnalyticsEvent::whereBetween('created_at', [
                    now()->startOfMonth()->addDays(14)->startOfDay(),
                    now()->startOfMonth()->addDays(20)->endOfDay()
                ])->distinct('session_id')->count('session_id');

                // Week 4
                $visitorData[] = \App\Models\AnalyticsEvent::whereBetween('created_at', [
                    now()->startOfMonth()->addDays(21)->startOfDay(),
                    now()->endOfMonth()
                ])->distinct('session_id')->count('session_id');
                break;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Visitor',
                    'data' => $visitorData,
                    'borderColor' => '#3b82f6', // Biru
                    'backgroundColor' => 'rgba(59, 130, 246, 0.1)',
                    'fill' => true,
                    'tension' => 0.4, // Membuat garis grafik melengkung (smooth)
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
