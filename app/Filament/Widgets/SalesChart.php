<?php

namespace App\Filament\Widgets;

use App\Models\Sale;
use App\Models\Transaction;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Carbon;

class SalesChart extends ChartWidget
{
    protected ?string $heading = 'Analitik Penjualan & HPP (30 Hari Terakhir)';

    protected static ?int $sort = 3;

    protected int | string | array $columnSpan = 1;

    protected function getData(): array
    {
        $salesData = [];
        $hppData = [];
        $labels = [];

        for ($i = 29; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i);
            $dateStr = $date->toDateString();
            
            $labels[] = $date->format('d M');

            // Pendapatan hari ini
            $salesData[] = Transaction::where('type', 'income')
                ->where('transaction_date', $dateStr)
                ->sum('amount');

            // HPP hari ini
            $hppData[] = Sale::where('transaction_date', $dateStr)
                ->sum('total_hpp');
        }

        return [
            'datasets' => [
                [
                    'label' => 'Pendapatan (Revenue)',
                    'data' => $salesData,
                    'borderColor' => '#10b981',
                    'backgroundColor' => 'rgba(16, 185, 129, 0.1)',
                    'fill' => true,
                ],
                [
                    'label' => 'HPP (COGS)',
                    'data' => $hppData,
                    'borderColor' => '#ef4444',
                    'backgroundColor' => 'rgba(239, 68, 68, 0.1)',
                    'fill' => true,
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
