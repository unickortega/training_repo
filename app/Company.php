<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function user(){
      return $this->belongsTo('App\User');
    }

    public function departments(){
      return $this->hasMany('App\Department');
    }

    public function employees(){
      return $this->hasMany('App\Employee');
    }

    protected $fillable = [
        'name', 'about', 'address', 'contact',
        'email', 'user_id',
    ];
}
