<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'unit', 'cost_per_unit'];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_ingredients', 'ingredient_id', 'product_id')
            ->withPivot('quantity')
            ->withTimestamps();
    }

    protected static function booted()
    {
        static::updated(function ($ingredient) {
            // Ketika biaya per unit bahan baku berubah, hitung ulang HPP semua produk yang menggunakannya
            if ($ingredient->wasChanged('cost_per_unit')) {
                foreach ($ingredient->products as $product) {
                    $product->recalculateHpp();
                }
            }
        });
    }
}
