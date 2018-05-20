<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    protected $guarded=[];

    protected function user(){
        return $this->belongsTo(User::class);
    }

    protected function message(){
        return $this->belongsTo(Message::class);
    }
}
