@use('Illuminate\Support\Carbon')

<x-filament-panels::page>
    <form wire:submit.prevent style="margin-bottom: 24px;">
        {{ $this->form }}
    </form>

    @php
        $data = $this->getReportData();
    @endphp

    <!-- Dashboard Cards Grid (Flexbox) -->
    <div style="display: flex; flex-wrap: wrap; gap: 16px; margin-bottom: 24px;">
        
        <!-- Revenue Card -->
        <div style="flex: 1 1 200px; background-color: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.05); transition: transform 0.2s;" onmouseover="this.style.transform='translateY(-2px)'" onmouseout="this.style.transform='translateY(0)'">
            <span style="font-size: 11px; font-weight: 700; color: #64748b; text-transform: uppercase; letter-spacing: 0.05em; display: block; margin-bottom: 6px;">Total Pendapatan</span>
            <span style="font-size: 20px; font-weight: 800; color: #0f172a; display: block;">
                Rp {{ number_format($data['revenue'], 0, ',', '.') }}
            </span>
            <span style="font-size: 10px; font-weight: 600; color: #10b981; display: block; margin-top: 8px;">Pemasukan Kas & Penjualan</span>
        </div>

        <!-- HPP (COGS) Card -->
        <div style="flex: 1 1 200px; background-color: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.05); transition: transform 0.2s;" onmouseover="this.style.transform='translateY(-2px)'" onmouseout="this.style.transform='translateY(0)'">
            <span style="font-size: 11px; font-weight: 700; color: #64748b; text-transform: uppercase; letter-spacing: 0.05em; display: block; margin-bottom: 6px;">Total HPP (COGS)</span>
            <span style="font-size: 20px; font-weight: 800; color: #e11d48; display: block;">
                Rp {{ number_format($data['cogs'], 0, ',', '.') }}
            </span>
            <span style="font-size: 10px; font-weight: 600; color: #64748b; display: block; margin-top: 8px;">Biaya Produksi Bahan Baku</span>
        </div>

        <!-- Gross Profit Card -->
        <div style="flex: 1 1 200px; background-color: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.05); transition: transform 0.2s;" onmouseover="this.style.transform='translateY(-2px)'" onmouseout="this.style.transform='translateY(0)'">
            <span style="font-size: 11px; font-weight: 700; color: #64748b; text-transform: uppercase; letter-spacing: 0.05em; display: block; margin-bottom: 6px;">Laba Kotor</span>
            <span style="font-size: 20px; font-weight: 800; color: #2563eb; display: block;">
                Rp {{ number_format($data['gross_profit'], 0, ',', '.') }}
            </span>
            <span style="font-size: 10px; font-weight: 600; color: #64748b; display: block; margin-top: 8px;">Pendapatan - HPP</span>
        </div>

        <!-- Expense Card -->
        <div style="flex: 1 1 200px; background-color: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.05); transition: transform 0.2s;" onmouseover="this.style.transform='translateY(-2px)'" onmouseout="this.style.transform='translateY(0)'">
            <span style="font-size: 11px; font-weight: 700; color: #64748b; text-transform: uppercase; letter-spacing: 0.05em; display: block; margin-bottom: 6px;">Operasional & Lainnya</span>
            <span style="font-size: 20px; font-weight: 800; color: #d97706; display: block;">
                Rp {{ number_format($data['expenses'], 0, ',', '.') }}
            </span>
            <span style="font-size: 10px; font-weight: 600; color: #64748b; display: block; margin-top: 8px;">Pengeluaran Non-Bahan Baku</span>
        </div>

        <!-- Net Profit Card -->
        <div style="flex: 1 1 200px; background-color: #ecfdf5; border: 1px solid #a7f3d0; border-radius: 12px; padding: 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.05); transition: transform 0.2s;" onmouseover="this.style.transform='translateY(-2px)'" onmouseout="this.style.transform='translateY(0)'">
            <span style="font-size: 11px; font-weight: 700; color: #047857; text-transform: uppercase; letter-spacing: 0.05em; display: block; margin-bottom: 6px;">Laba Bersih</span>
            <span style="font-size: 20px; font-weight: 800; color: #065f46; display: block;">
                Rp {{ number_format($data['net_profit'], 0, ',', '.') }}
            </span>
            <span style="font-size: 10px; font-weight: 600; color: #047857; display: block; margin-top: 8px;">Laba Kotor - Pengeluaran</span>
        </div>

    </div>

    <!-- Details Table -->
    <div style="background-color: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; box-shadow: 0 1px 3px rgba(0,0,0,0.05); overflow: hidden; margin-top: 24px;">
        <div style="padding: 16px 24px; border-bottom: 1px solid #f1f5f9; background-color: #f8fafc;">
            <h3 style="font-size: 14px; font-weight: 700; color: #0f172a; margin: 0;">Rincian Aliran Kas Masuk & Keluar</h3>
        </div>
        <div style="overflow-x: auto;">
            <table style="width: 100%; text-align: left; border-collapse: collapse; font-size: 13px;">
                <thead>
                    <tr style="border-bottom: 1px solid #e2e8f0; background-color: #f8fafc; color: #64748b; font-weight: 700;">
                        <th style="padding: 14px 24px;">Tanggal</th>
                        <th style="padding: 14px 24px;">Tipe</th>
                        <th style="padding: 14px 24px;">Kategori</th>
                        <th style="padding: 14px 24px;">Keterangan</th>
                        <th style="padding: 14px 24px; text-align: right;">Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data['transactions'] as $tx)
                        <tr style="border-bottom: 1px solid #f1f5f9; transition: background-color 0.2s;" onmouseover="this.style.backgroundColor='#f8fafc'" onmouseout="this.style.backgroundColor='transparent'">
                            <td style="padding: 14px 24px; color: #475569;">
                                {{ Carbon::parse($tx->transaction_date)->format('d M Y') }}
                            </td>
                            <td style="padding: 14px 24px;">
                                @if ($tx->type === 'income')
                                    <span style="display: inline-block; padding: 2px 8px; border-radius: 9999px; font-size: 11px; font-weight: 600; background-color: #d1fae5; color: #065f46;">Pemasukan</span>
                                @else
                                    <span style="display: inline-block; padding: 2px 8px; border-radius: 9999px; font-size: 11px; font-weight: 600; background-color: #ffe4e6; color: #9f1239;">Pengeluaran</span>
                                @endif
                            </td>
                            <td style="padding: 14px 24px; font-weight: 600; color: #0f172a;">
                                {{ $tx->category }}
                            </td>
                            <td style="padding: 14px 24px; color: #64748b;">
                                {{ $tx->description ?? '-' }}
                            </td>
                            <td style="padding: 14px 24px; text-align: right; font-weight: 700; color: {{ $tx->type === 'income' ? '#10b981' : '#ef4444' }};">
                                {{ $tx->type === 'income' ? '+' : '-' }} Rp {{ number_format($tx->amount, 0, ',', '.') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" style="padding: 32px; text-align: center; color: #64748b;">
                                Tidak ada data transaksi dalam periode tanggal ini.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-filament-panels::page>
