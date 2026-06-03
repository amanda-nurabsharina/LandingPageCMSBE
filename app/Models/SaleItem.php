<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleItem extends Model
{
    use HasFactory;

    protected $fillable = ['sale_id', 'product_id', 'quantity', 'unit_price', 'subtotal', 'subtotal_hpp'];

    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    protected static function booted()
    {
        $calculateSubtotals = function ($item) {
            $product = Product::find($item->product_id);
            if ($product) {
                $item->unit_price = $item->unit_price ?? $product->selling_price;
                $item->subtotal = $item->quantity * $item->unit_price;
                $item->subtotal_hpp = $item->quantity * $product->hpp;
            }
        };

        static::creating($calculateSubtotals);
        static::updating($calculateSubtotals);

        $updateSaleTotals = function ($item) {
            $sale = Sale::find($item->sale_id);
            if ($sale) {
                // Muat ulang item penjualan untuk hitung total
                $items = $sale->items()->get();
                $totalPrice = $items->sum('subtotal');
                $totalHpp = $items->sum('subtotal_hpp');
                
                $sale->updateQuietly([
                    'total_price' => $totalPrice,
                    'total_hpp' => $totalHpp
                ]);
                
                // Sinkronisasikan ke pencatatan kas masuk transaksi
                Transaction::updateOrCreate(
                    ['sale_id' => $sale->id],
                    [
                        'type' => 'income',
                        'category' => 'Penjualan',
                        'amount' => $totalPrice,
                        'transaction_date' => $sale->transaction_date,
                        'description' => "Penjualan invoice " . $sale->sale_number,
                    ]
                );
            }
        };

        static::created($updateSaleTotals);
        static::updated($updateSaleTotals);
        static::deleted($updateSaleTotals);
    }
}
