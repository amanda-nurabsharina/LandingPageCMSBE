<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'selling_price', 'hpp'];

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class, 'product_ingredients', 'product_id', 'ingredient_id')
            ->withPivot('quantity')
            ->withTimestamps();
    }

    public function productIngredients()
    {
        return $this->hasMany(ProductIngredient::class, 'product_id');
    }

    public function recalculateHpp()
    {
        $newHpp = 0;
        
        // Memuat ulang relasi untuk memastikan kita menggunakan data pivot & bahan terbaru
        $this->load('ingredients');
        
        foreach ($this->ingredients as $ingredient) {
            $newHpp += $ingredient->pivot->quantity * $ingredient->cost_per_unit;
        }

        $this->updateQuietly(['hpp' => $newHpp]);
    }
}
