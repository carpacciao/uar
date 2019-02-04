<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function isAdmin()
    {
        return Auth::user()->role->name === 'admin';
    }
    
    public function user() {
       return  $this->belongsTo('App\User');
    }
}
