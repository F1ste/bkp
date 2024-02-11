<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $fillable = [
        'message',
    ];

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function second_user()
    {
        return $this->belongsTo(User::class, 'second_user_id', 'id');
    }

    public function first_user()
    {
        return $this->belongsTo(User::class, 'first_user_id', 'id');
    }
}
