<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public function company(){
      return $this->belongsTo('App\Company');
    }

    public function departments(){
      return $this->belongsToMany('App\Department');
    }
}
