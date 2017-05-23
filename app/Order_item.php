<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_item extends Model
{
    protected $table = 'order_items';

    public function order(){
      return $this -> belongsTo('App\Order');
    }
}
