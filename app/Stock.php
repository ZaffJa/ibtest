<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
  protected $table = 'stock';

  protected $fillable = ['item_id', 'quantity'];
  protected $hidden = ['added_by'];

  public function item(){
    return $this -> belongsTo('App\Item');
  }
}
