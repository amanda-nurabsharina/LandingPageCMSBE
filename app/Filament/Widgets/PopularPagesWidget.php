<?php

namespace App\Filament\Widgets;

use Filament\Widgets\TableWidget as BaseWidget;
use Filament\Tables;
use Filament\Tables\Table;
use App\Models\AnalyticsEvent;
use Illuminate\Support\Facades\DB;

class PopularPagesWidget extends BaseWidget
{
    protected static ?int $sort = 5;

    protected int | string | array $columnSpan = 'full';

    protected static ?string $heading = 'Halaman Terpopuler';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                AnalyticsEvent::query()
                    ->select(DB::raw('max(id) as id'), 'page_name', DB::raw('count(*) as views'))
                    ->where('event_type', 'page_view')
                    ->groupBy('page_name')
            )
            ->columns([
                Tables\Columns\TextColumn::make('page_name')
                    ->label('Nama Halaman')
                    ->searchable()
                    ->sortable()
                    ->icon(function ($state) {
                        $lower = strtolower($state);
                        if ($lower === 'home') {
                            return 'heroicon-o-home';
                        }
                        if (str_contains($lower, 'berita') || str_contains($lower, 'news')) {
                            return 'heroicon-o-document-text';
                        }
                        if (str_contains($lower, 'kegiatan') || str_contains($lower, 'aktifitas') || str_contains($lower, 'aktivitas')) {
                            return 'heroicon-o-sparkles';
                        }
                        return 'heroicon-o-document';
                    })
                    ->iconColor(function ($state) {
                        $lower = strtolower($state);
                        if ($lower === 'home') {
                            return 'primary';
                        }
                        if (str_contains($lower, 'berita') || str_contains($lower, 'news')) {
                            return 'success';
                        }
                        if (str_contains($lower, 'kegiatan') || str_contains($lower, 'aktifitas') || str_contains($lower, 'aktivitas')) {
                            return 'warning';
                        }
                        return 'gray';
                    })
                    ->weight('medium'),
                Tables\Columns\TextColumn::make('views')
                    ->label('Total Kunjungan (Views)')
                    ->numeric()
                    ->sortable()
                    ->badge()
                    ->color('success')
                    ->alignment('right'),
            ])
            ->defaultSort('views', 'desc')
            ->paginated(false);
    }
}
