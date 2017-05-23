<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    public function department(){
      return $this -> belongsTo('App\Deparment');//deparment_id to link it
    }
    public function supplier(){
      return $this -> belongsTo('App\Supplier');//supplier_id to link it
    }
    public function order_item(){
      return $this -> hasMany('App\Order_item');
    }
}
