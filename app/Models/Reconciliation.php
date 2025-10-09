<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reconciliation extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_id',
        'bank_reference',
        'amount',
        'status',
        'remarks',
        'reconciled_at',
    ];
}
