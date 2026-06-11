<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = ['sale_number', 'customer_name', 'total_price', 'total_hpp', 'transaction_date'];

    protected $attributes = [
        'total_price' => 0,
        'total_hpp' => 0,
    ];

    public function items()
    {
        return $this->hasMany(SaleItem::class);
    }

    protected static function booted()
    {
        // Otomatis membuat nomor invoice
        static::creating(function ($sale) {
            if (empty($sale->sale_number)) {
                $dateStr = date('Ymd');
                $count = static::where('transaction_date', $sale->transaction_date ?? date('Y-m-d'))->count() + 1;
                $sale->sale_number = 'INV-' . $dateStr . '-' . str_pad($count, 4, '0', STR_PAD_LEFT);
            }
        });

        // Ketika data penjualan disimpan/diubah, daftarkan atau perbarui kas masuk di tabel Transactions
        static::saved(function ($sale) {
            Transaction::updateOrCreate(
                ['sale_id' => $sale->id],
                [
                    'type' => 'income',
                    'category' => 'Penjualan',
                    'amount' => $sale->total_price ?? 0,
                    'transaction_date' => $sale->transaction_date,
                    'description' => "Penjualan invoice " . $sale->sale_number,
                ]
            );
        });

        // Ketika data penjualan dihapus, hapus pula pencatatan kas masuknya
        static::deleted(function ($sale) {
            Transaction::where('sale_id', $sale->id)->delete();
        });
    }
}
