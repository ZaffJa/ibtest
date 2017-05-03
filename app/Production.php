<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Production extends Model
{
    protected $table = 'production';

    public function users(){
      return $this -> belongsToMany('App\User');
    }
}
