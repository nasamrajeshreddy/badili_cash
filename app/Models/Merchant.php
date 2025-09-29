<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{

    


    use HasFactory;

    protected $fillable = [
        'business_name',
        'business_type',
        'gst_number',
        'pan_number',
        'license_doc',
        'contact_name',
        'email',
        'phone',
        'bank_account',
        'ifsc',
        'bank_name',
        'status',
        'commission_rate',
    ];
}
