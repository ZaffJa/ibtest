<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Supplier;
use Session;
class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $suppliers = Supplier::select("*")->paginate(10);
      return view('supplier.index', ['suppliers' => $suppliers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('supplier.create');
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
        'comp_name'=>'required',
        'address'=>'required',
        'tel_no'=>'required',
        'office_no'=>'required',
        'pic'=>'required',
      ]);

      //create new data
      $supplier = new supplier;
      $supplier->comp_name = $request->comp_name;
      $supplier->address = $request->address;
      $supplier->tel_no = $request->tel_no;
      $supplier->office_no = $request->office_no;
      $supplier->pic = $request->pic;
      $supplier->added_by = Auth::user()->name;
      $supplier->modified_by = Auth::user()->name;
      $supplier->save();
      Session::flash('success', 'Data has been saved!');
      return redirect()->route('supplier.create');
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
      $supplier = Supplier::findOrFail($id);
      //return to edit view
      return view('supplier.edit',compact('supplier'));
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
        'comp_name'=>'required',
        'address'=>'required',
        'tel_no'=>'required',
        'office_no'=>'required',
        'pic'=>'required',
      ]);

      //create new data
      $supplier = Supplier::findOrFail($id);
      $supplier->comp_name = $request->comp_name;
      $supplier->address = $request->address;
      $supplier->tel_no = $request->tel_no;
      $supplier->office_no = $request->office_no;
      $supplier->pic = $request->pic;
      $supplier->modified_by = Auth::user()->name;
      $supplier->save();
      Session::flash('success', 'Data has been saved!');
      return redirect()->route('supplier.index');
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
      $supplier = Supplier::findOrFail($id);
      $supplier -> delete();
      return redirect()->route('supplier.index')->with('alert-success', 'Data has been saved!');
    }
}
