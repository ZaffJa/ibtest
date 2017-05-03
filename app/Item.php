<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Item extends Model
{
    protected $table = 'item';

    public function category(){
      return $this -> belongsTo('App\Category');
    }
    public function stock(){
      return $this -> hasOne('App\Stock', 'id', 'item_id');
    }
}
