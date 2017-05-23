<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Production;
use App\User;
use App\Deparment;
class ProductionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $productions = new Production;
        $deparments = Deparment::all();
        $productions = $productions->paginate(10);
        return view('production.index')->withProductions($productions)->withUsers($users)->withDeparments($deparments);
        //$search = Request::get('search');
        //$productions = Production::where('title','like','%'.$search.'%')->orderBy('id')->paginate(3);
        //show data with pagination--can change pagination number through here
        //$productions = Production::select("*")->paginate(2);
        //return view('production.index', ['productions' => $productions], ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('production.index');
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
          'prod_name'=>'required',
          'deparment'=>'required',
        ]);

        //create new data
        $d = Input::get('deparment');
        $productions = new production;
        $productions->prod_name = $request->prod_name;
        $productions->depart_id =$d;
        $productions->save();

        $productions->users()->sync($request->users, false);

        $request->session()->flash('success', 'New Category has been created');
        return redirect()->route('production.index');
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
        $production = Production::findOrFail($id);
        $deparments = Deparment::all();
        $users = User::all();
        $users2 = array();
        foreach($users as $user){
          $users2[$user->id] = $user->name;
        }
        //return to edit view
        return view('production.edit')->withProduction($production)->withUsers($users2)->withDeparments($deparments);
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
        'prod_name'=>'required',
        'deparment'=>'required',
      ]);
      $d = Input::get('deparment');
      //Find data from Database
      $production = Production::findOrFail($id);
      $production->prod_name = $request->prod_name;
      $production->depart_id = $d;
      $production->save();

      if(isset($request->users)){
        $production->users()->sync($request->users);
      }
      else{
        $production->users()->sync(array());
      }

      return redirect()->route('production.index')->with('alert-success', 'Data has been saved!');
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
        $production = Production::findOrFail($id);
        $production -> delete();
        return redirect()->route('production.index')->with('alert-success', 'Data has been saved!');
    }
}
