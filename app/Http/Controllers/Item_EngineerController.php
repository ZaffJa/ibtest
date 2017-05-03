<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use Session;

class Item_EngineerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $items = Item::select("*")->paginate(10);
      return view('items-engineer.index', ['items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('items-engineer.create');
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
      return redirect()->route('items-engineer.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $items = Item::findOrFail($id);
      //return to edit view
      return view('items-engineer.edit',compact('items'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
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

      return redirect()->route('items-engineer.create')->with('success', 'Data has been changed!');
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
      return redirect()->route('items-engineer.index')->with('success', 'Data has been deleted!');
    }
}
