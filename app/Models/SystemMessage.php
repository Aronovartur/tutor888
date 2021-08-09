<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemMessage extends Model
{
    use HasFactory;
    protected $fillable=['subject', 'body', 'sent'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'system_message_user', 'system_message_id', 'user_id');
    }
}
