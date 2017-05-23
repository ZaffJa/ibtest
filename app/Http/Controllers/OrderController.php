<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Item;
use App\Supplier;
use App\Deparment;
use App\Order;
use App\Order_item;
use Session;
use Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $items = Item::all();
      $suppliers = Supplier::all();
      $deparments = Deparment::all();
      return view('order/index')->withItems($items)->withSuppliers($suppliers)->withDeparments($deparments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        'department'=>'required',
        'comp_name'=>'required',

      ]);

      $d = Input::get('department');
      $comp = Input::get('comp_name');
      $orders = new Order;
      $orders->department_id = $d;
      $orders->supplier_id = $comp;
      $orders->created_by = Auth::user()->name;
      $orders->save();

      $itemsel = Input::get('itemselected');
      $or_it = new Order_item;
      $or_it->order_id = $orders->id;
      $or_it->item_id = $itemsel;
      $or_it->quantity = $request->qty;
      $or_it->price = $request->p;
      $q= $request->qty;
      $pri = $request->p;
      $total = $q*$pri;
      $or_it->total = $total;
      $or_it->save();
      Session::flash('success', 'Data has been saved!');
      return redirect()->route('order.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $deparments = Deparment::all();
        $suppliers = Supplier::all();
        $orders = Order::all();
        return view('order.olist')->withOrders($orders)->withDeparments($deparments)->withSuppliers($suppliers);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function company_details(){
      $company = Input::get('company');
      $details = Supplier::where('id', '=', $company)->get();
      return response()->json($details);
    }


    public function item_total(Request $request)
    {
      $q= $request->quantity;
      $pri = $request->price;
      $total = $q*$pri;
      return response()->json($total);
    }

    public function approve($id)
    {
      $order = Order::findOrFail($id);
      $order->status = 'Approved';
      $order->save();
      return redirect()->route('order.olist');
    }
    public function showEngineer()
    {
        $deparments = Deparment::all();
        $suppliers = Supplier::all();
        $orders = Order::all();
        return view('order.olist-engineer')->withOrders($orders)->withDeparments($deparments)->withSuppliers($suppliers);
    }

}
