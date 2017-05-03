<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Production;

class Production_TechnicianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $productions = new Production;
        $queries = [];

        $columns =[
          'prod_name', 'department', 'team_member',
        ];

        foreach ($columns as $column){
          if (request()->has($column)){
            $productions = $productions->where($column, request($column));
            $queries[$column] = request($column);
          }
        }

        if(request()->has('sort')){
          $productions = $productions->orderBy('name', request('sort'));
          $queries['sort'] = request('sort');
        }

        $productions = $productions->paginate(2)->appends('$queries');
        //$search = Request::get('search');
        //$productions = Production::where('title','like','%'.$search.'%')->orderBy('id')->paginate(3);
        //show data with pagination--can change pagination number through here
        //$productions = Production::select("*")->paginate(2);
        return view('production-technician.index', ['productions' => $productions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('production-technician.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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
