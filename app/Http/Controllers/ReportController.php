<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;
use App\Production;
use App\Users;

class ReportController extends Controller
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
        $reports = Report::all();
        return view('report.index', ['reports' => $reports]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('report.index');
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
          'process'=>'required',
          'achievement'=>'required',
          'prob_cause'=>'required',
          'solution'=>'required',
          'added_by'=>'required',

        ]);

        //create new data
        $production = new production;
        $production->prod_name = $request->prod_name;
        $report = new report;
        $report->process = $request->process;
        $report->achievement = $request->achievement;
        $report->prob_cause = $request->prob_cause;
        $report->solution = $request->solution;
        $users = new users;
        $users->added_by = $request->added_by;
        $report->save();
        return redirect()->route('report.index')->with('alert-success', 'Data has been saved!');
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
      //validation

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

    }
}
