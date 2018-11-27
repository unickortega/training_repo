<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public function company(){
      return $this->belongsTo('App\Company');
    }

    public function employees(){
      return $this->belongsToMany('App\Employee');
    }
}
