<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductIngredient extends Model
{
    protected $table = 'product_ingredients';

    protected $fillable = ['product_id', 'ingredient_id', 'quantity'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function ingredient()
    {
        return $this->belongsTo(Ingredient::class);
    }

    protected static function booted()
    {
        $recalculate = function ($pivot) {
            $product = Product::find($pivot->product_id);
            if ($product) {
                $product->recalculateHpp();
            }
        };

        static::created($recalculate);
        static::updated($recalculate);
        static::deleted($recalculate);
    }
}
