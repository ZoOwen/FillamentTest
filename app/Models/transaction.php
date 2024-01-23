<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'cashier_id',
        'nota_id',
        'total_price',
        'total_paid',
        'return',
    ];

    public function detailTransactions()
    {
        return $this->hasMany(DetailTransaction::class);
    }
}
