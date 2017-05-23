<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deparment extends Model
{
  protected $table = 'deparments';

  public function order(){
    return $this->hasMany('App\Order');
  }
  public function production(){
    return $this->hasMany('App\Production');
  }
}
