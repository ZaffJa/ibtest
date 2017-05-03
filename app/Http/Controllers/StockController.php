<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stock;
use App\Item;
use Session;
use Auth;
use Illuminate\Support\Facades\Input;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$search = Request::get('search');
        //$productions = Production::where('title','like','%'.$search.'%')->orderBy('id')->paginate(3);
        //show data with pagination--can change pagination number through here
        //$productions = Production::select("*")->paginate(2);
        //$stocks = Stock::select("*")->paginate(2);
        $items = Item::all();
        $stocks = Stock::all();
        return view('stock.index')->withStocks($stocks)->withItems($items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('stock.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation
        $this->validate($request,[
          'item_id'=>'required',
          'quantity'=>'required',
        ]);

        //create new data
        $stock = Stock::updateOrCreate(
          ['item_id' => $request->item_id, 'quantity' => $request->quantity]
        );

        $stock = new Stock;
        $stock->added_by = Auth::user()->name;
        $stock->modified_by = Auth::user()->name;
        $stock->save();

        $request->session()->flash('success', 'New Stock has been created');
        return redirect()->route('stock.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $prod_id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $prod_id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $prod_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
