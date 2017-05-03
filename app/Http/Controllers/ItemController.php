<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use Session;

class ItemController extends Controller
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
        $items = Item::select("*")->paginate(10);
        return view('items.index', ['items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('items.create');
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
          'category_id'=>'required',
          'description'=>'required',
        ]);

        //create new data
        $items = new item;
        $items->category_id = $request->category_id;
        $items->description = $request->description;
        $items->save();
        Session::flash('success', 'Data has been saved!');
        return redirect()->route('items.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $items = Item::findOrFail($id);
        //return to edit view
        return view('items.edit',compact('items'));
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
      //validation
      $this->validate($request,[
        'category_id'=>'required',
        'description'=>'required',
      ]);

      //Find data from Database
      $items = Item::findOrFail($id);
      $items->category_id = $request->category_id;
      $items->description = $request->description;
      $items->save();

      return redirect()->route('items.create')->with('success', 'Data has been changed!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Delete Data
        $items = Item::findOrFail($id);
        $items -> delete();
        return redirect()->route('items.index')->with('success', 'Data has been deleted!');
    }
}
