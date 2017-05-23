<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Production extends Model
{
    protected $table = 'production';

    public function users(){
      return $this -> belongsToMany('App\User');
    }

    public function report(){
      return $this -> hasOne('App\Report', 'p_name');
    }
    public function depart(){
      return $this -> belongsTo('App\Deparment');//depart_id to link it
    }
}
