<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SandboxLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'endpoint',
        'request_data',
        'response_data',
    ];
}
