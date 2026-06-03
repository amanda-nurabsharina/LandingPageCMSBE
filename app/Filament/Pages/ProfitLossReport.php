<?php

namespace App\Filament\Pages;

use App\Models\Sale;
use App\Models\Transaction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Form;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Pages\Page;
use Illuminate\Support\Carbon;

class ProfitLossReport extends Page implements HasForms
{
    use InteractsWithForms;
    protected static \BackedEnum|string|null $navigationIcon = 'heroicon-o-document-chart-bar';

    protected string $view = 'filament.pages.profit-loss-report';

    protected static ?string $title = 'Laporan Laba Rugi';

    protected static ?string $navigationLabel = 'Laporan Laba Rugi';

    protected static string|\UnitEnum|null $navigationGroup = 'ERP & Keuangan';

    public ?string $fromDate = null;
    public ?string $toDate = null;

    public function mount(): void
    {
        $this->fromDate = Carbon::now()->startOfMonth()->toDateString();
        $this->toDate = Carbon::now()->endOfMonth()->toDateString();
    }

    public function form(\Filament\Schemas\Schema $schema): \Filament\Schemas\Schema
    {
        return $schema
            ->components([
                DatePicker::make('fromDate')
                    ->label('Dari Tanggal')
                    ->live()
                    ->required(),
                DatePicker::make('toDate')
                    ->label('Sampai Tanggal')
                    ->live()
                    ->required(),
            ])
            ->columns(2);
    }

    public function getReportData(): array
    {
        $from = $this->fromDate ?? Carbon::now()->startOfMonth()->toDateString();
        $to = $this->toDate ?? Carbon::now()->endOfMonth()->toDateString();

        // 1. Total Revenue (Income Transactions)
        $revenue = Transaction::where('type', 'income')
            ->whereBetween('transaction_date', [$from, $to])
            ->sum('amount');

        // 2. Total HPP (COGS of sold items)
        $cogs = Sale::whereBetween('transaction_date', [$from, $to])
            ->sum('total_hpp');

        // 3. Operational Expenses (Expense Transactions)
        $expenses = Transaction::where('type', 'expense')
            ->whereBetween('transaction_date', [$from, $to])
            ->sum('amount');

        $grossProfit = $revenue - $cogs;
        $netProfit = $grossProfit - $expenses;

        // Detailed Transactions
        $transactions = Transaction::whereBetween('transaction_date', [$from, $to])
            ->orderBy('transaction_date', 'desc')
            ->get();

        return [
            'revenue' => $revenue,
            'cogs' => $cogs,
            'gross_profit' => $grossProfit,
            'expenses' => $expenses,
            'net_profit' => $netProfit,
            'transactions' => $transactions,
        ];
    }
}
