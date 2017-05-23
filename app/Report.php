<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = 'report';

    public function production(){
      return $this -> belongsTo('App\Production','id');
    }
}
