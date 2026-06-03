<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'category', 'amount', 'transaction_date', 'description', 'sale_id'];

    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }
}
