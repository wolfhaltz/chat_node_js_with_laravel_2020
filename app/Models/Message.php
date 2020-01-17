<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Message extends Model
{
    protected $fillable = [
        'user_id', 'message', 'chat_id'
    ];

    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function dest_agent_id()
    {
      return $this->belongsTo(User::class);
    }
}
