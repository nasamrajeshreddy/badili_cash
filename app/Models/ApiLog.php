<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApiLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'log_id',
        'merchant_id',
        'endpoint',
        'method',
        'request_payload',
        'response_payload',
        'status_code',
        'ip_address',
    ];

    public function merchant()
    {
        return $this->belongsTo(Merchant::class);
    }
}
