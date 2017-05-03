<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
  protected $table = 'stock';

  public function item(){
    return $this -> belongsTo('App\Item');
  }
}
