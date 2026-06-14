<?php

namespace App\Filament\Widgets;

use Filament\Widgets\TableWidget as BaseWidget;
use Filament\Tables;
use Filament\Tables\Table;
use App\Models\AnalyticsEvent;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\HtmlString;

class PopularPagesWidget extends BaseWidget
{
    protected static ?int $sort = 5;

    protected int | string | array $columnSpan = 'full';

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

    public function table(Table $table): Table
    {
        return $table
            ->query(
                AnalyticsEvent::query()
                    ->select(DB::raw('max(id) as id'), 'page_name', DB::raw('count(*) as views'))
                    ->where('event_type', 'page_view')
                    ->groupBy('page_name')
                    ->orderByDesc(DB::raw('count(*)'))
            )
            ->columns([
                Tables\Columns\TextColumn::make('page_name')
                    ->label('Nama Halaman')
                    ->icon(function ($state) {
                        $lower = strtolower($state ?? '');
                        if ($lower === 'home') {
                            return 'heroicon-o-home';
                        }
                        if (str_contains($lower, 'berita') || str_contains($lower, 'news')) {
                            return 'heroicon-o-document-text';
                        }
                        if (str_contains($lower, 'kegiatan') || str_contains($lower, 'aktifitas') || str_contains($lower, 'aktivitas') || str_contains($lower, 'dokumentasi')) {
                            return 'heroicon-o-sparkles';
                        }
                        return 'heroicon-o-document';
                    })
                    ->iconColor(function ($state) {
                        $lower = strtolower($state ?? '');
                        if ($lower === 'home') {
                            return 'primary';
                        }
                        if (str_contains($lower, 'berita') || str_contains($lower, 'news')) {
                            return 'success';
                        }
                        if (str_contains($lower, 'kegiatan') || str_contains($lower, 'aktifitas') || str_contains($lower, 'aktivitas') || str_contains($lower, 'dokumentasi')) {
                            return 'warning';
                        }
                        return 'gray';
                    }),
                Tables\Columns\TextColumn::make('views')
                    ->label('Total Kunjungan (Views)')
                    ->numeric()
                    ->badge()
                    ->color('success'),
            ])
            ->paginated(false);
    }
}
