<?php

namespace App\Filament\Widgets;

use App\Models\Sale;
use App\Models\Transaction;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Carbon;

class FinanceOverview extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        $startOfMonth = Carbon::now()->startOfMonth()->toDateString();
        $endOfMonth = Carbon::now()->endOfMonth()->toDateString();

        // Pendapatan bulan ini
        $revenue = Transaction::where('type', 'income')
            ->whereBetween('transaction_date', [$startOfMonth, $endOfMonth])
            ->sum('amount');

        // Pengeluaran operasional bulan ini
        $expenses = Transaction::where('type', 'expense')
            ->whereBetween('transaction_date', [$startOfMonth, $endOfMonth])
            ->sum('amount');

        // HPP penjualan bulan ini
        $cogs = Sale::whereBetween('transaction_date', [$startOfMonth, $endOfMonth])
            ->sum('total_hpp');

        $netProfit = $revenue - $cogs - $expenses;

        return [
            Stat::make('Pendapatan Bulan Ini', 'Rp ' . number_format($revenue, 0, ',', '.'))
                ->description('Total pemasukan kas & penjualan')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),
            Stat::make('Total Pengeluaran & HPP', 'Rp ' . number_format($expenses + $cogs, 0, ',', '.'))
                ->description('HPP: Rp ' . number_format($cogs, 0, ',', '.') . ' | Ops: Rp ' . number_format($expenses, 0, ',', '.'))
                ->descriptionIcon('heroicon-m-arrow-trending-down')
                ->color('danger'),
            Stat::make('Laba Bersih Bulan Ini', 'Rp ' . number_format($netProfit, 0, ',', '.'))
                ->description('Pendapatan - HPP - Pengeluaran')
                ->descriptionIcon($netProfit >= 0 ? 'heroicon-m-check-circle' : 'heroicon-m-x-circle')
                ->color($netProfit >= 0 ? 'success' : 'danger'),
        ];
    }
}
