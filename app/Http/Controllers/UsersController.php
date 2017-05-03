<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
use App\Production;
use Session;
class UsersController extends Controller
{

    use RegistersUsers;
    //protected $redirectTo = 'users.index';
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
        $user = User::select("*")->paginate(10);
        //$user = Users::all();
        return view('users.index', ['user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('users.index');
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
          'username'=>'required',
          'name'=>'required',
          'email'=>'required',
          'password' => 'required|min:6|confirmed',
          'role_id'=>'required',
        ]);

        //create new data
        $users = new user;//user = model name
        $users->username = $request->username;
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = Hash::make($request->password);
        $users->role_id = $request->role_id;
        $users->save();
        Session::flash('success', 'Data has been saved!');
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::findOrFail($id);
        //return to edit view
        return view('users.edit',compact('users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      //validation
      $this->validate($request,[
        'email'=>'required',
        'role_id'=>'required',
      ]);

      //create new data
      $users = User::findOrFail($id);
      $users->email = $request->email;
      $users->role_id = $request->role_id;
      $users->save();
      Session::flash('success', 'Data has been changed!');
      return redirect()->route('users.index');
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
        $users = User::findOrFail($id);
        $users -> delete();
        return redirect()->route('users.index')->with('alert-success', 'Data has been saved!');
    }
}
