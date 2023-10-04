<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    public const STATUS = [
        "Приглашение"=>1,
        "Отказ"=>2,
    ];
    protected $guarded = [];

    public function service (){
        return $this->belongsTo(Collection::class,'service_id', 'id');
       
    }

    public function user (){
        return $this->belongsTo(User::class,'user_id', 'id');
    }

}
