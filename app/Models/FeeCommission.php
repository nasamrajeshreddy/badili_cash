<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeCommission extends Model
{
    use HasFactory;




    protected $table = 'fees_commissions';

    protected $fillable = [
        'name',
        'type',
        'value',
        'applied_on',
        'active',
    ];
}
