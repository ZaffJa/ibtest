<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;

class Users_EngineerController extends Controller
{

    use RegistersUsers;
    protected $redirectTo = 'users-engineer.index';
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
        return view('users-engineer.index', ['user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('users-engineer.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        return view('users-engineer.edit',compact('users'));
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
        'name'=>'required',
        'email'=>'required',
        'password' => 'required|min:6',
        'new_password' => 'confirmed|min:6',
      ]);

      //create new data
      $users = User::findOrFail($id);
      $users->name = $request->name;
      $users->email = $request->email;
      $users->password = Hash::make($request->password);

      $users->save();

      return redirect()->route('users-engineer.index')->with('alert-success', 'Data has been saved!');
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
