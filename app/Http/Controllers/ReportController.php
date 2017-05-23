<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;
use App\Production;
use Response;
use Auth;
use Illuminate\Support\Facades\Input;
use Session;

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
        $productions = Production::all();
        return view('report.index')->withReports($reports)->withProductions($productions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productions = Production::all();
        return view('report.create')->withProductions($productions);
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
          'process'=>'required',

        ]);

        //create new data
        $report = new Report;
        //$report->prod_id = Production::where('prod_name','=', $prod);
        $prod = Input::get('prod_id');
        //$poid = Production::find('prod_name')->where('id', '=', $prod);
        $report->p_name = $prod;
        $report->process = $request->process;
        $report->achievement = $request->achievement;
        $report->prob_cause = $request->prob_cause;
        $report->solution = $request->solution;
        $report->added_by = Auth::user()->name;
        $report->modified_by = Auth::user()->name;

        $report->save();
        Session::flash('success', 'Data has been saved!');
        return redirect()->route('report.create')->with('alert-success', 'Data has been saved!');
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
      //
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

    public function editName(Request $request)
    {
      $report = Report::find($request->id);
      //$report->p_name = $request->prod;
      $report->process = $request->process;
      $report->achievement = $request->achievement;
      $report->prob_cause = $request->prob_cause;
      $report->solution = $request->solution;
      $report->modified_by = Auth::user()->name;
      $report->save();
      Session::flash('success', 'Data has been saved!');
      return response()->json($report);
    }

}
