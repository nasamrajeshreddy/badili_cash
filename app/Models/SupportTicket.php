<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupportTicket extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'subject',
        'message',
        'priority',
        'status',
        'assigned_to',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function replies()
{
    return $this->hasMany(TicketReply::class, 'ticket_id')->latest();
}

}
