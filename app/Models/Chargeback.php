<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chargeback extends Model
{
    use HasFactory;

    protected $fillable = [
        'chargeback_id',
        'transaction_id',
        'merchant_name',
        'amount',
        'currency',
        'reason',
        'status',
    ];
}



