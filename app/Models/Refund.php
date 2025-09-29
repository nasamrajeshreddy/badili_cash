<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Refund extends Model
{
    //
     use HasFactory;

    protected $fillable = [
        'refund_id',
        'payment_id',
        'transaction_id',
        'amount',
        'currency',
        'status',
        'reason'
    ];
     public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
}
