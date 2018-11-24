<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class task extends Model
{
    protected $fillable = ['title', 'body'];

    public function user(){
        $this->belongsTo(App\User::class);
    }
}
