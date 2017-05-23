<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
class CrudeController extends Controller
{
    protected $table = 'item';

    public function crude(){
      $stocks = Item::all();

      return view('crudetable')->withStocks($stocks);
    }
}
