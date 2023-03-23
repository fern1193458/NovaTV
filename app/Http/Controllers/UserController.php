<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);
        // $users = User::all();
        // dd($users);
        return view('elements.users.index')->with('users', $users);
        // Retornar vista inyectando todos los usuarios

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('elements.users.create')->with('roles',$roles);
        // Retornar la vista elements.users.create
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $user = new User;

        $user->fullname = $request->fullname;
        $user->email = $request->email;
        $user->phone = $request->phone;
        if($request->hasFile('photo')){
            $file = time().'.'.$request->photo->extension();
            $request->photo->move(public_path('images/profiles/'), $file);
            $user->photo = 'images/profiles/'.$file;
        }
        
        $user->password = bcrypt($request->password);
        $user->role_id = $request->role_id;
        if($user->save()){
            return redirect('users')->with('message', 'El usuario: '.$user->fullname.' fue creado con éxito!!');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('elements.users.show')->with('user',$user);
        // Retornar la vista
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        return view('elements.users.edit')->with('user',$user)->with('roles',$roles);
        //Retorna la vista con el formulario de edición del usuario 
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
        $user = User::find($id);

        $user->fullname = $request->fullname;
        $user->email = $request->email;
        $user->phone = $request->phone;
        if($request->hasFile('photo')){
            $file = time().'.'.$request->photo->extension();
            $request->photo->move(public_path('images/profiles/'), $file);
            $user->photo = 'images/profiles/'.$file;
        }
        
        $user->password = bcrypt($request->password);
        $user->role_id = $request->role_id;
        if($user->save()){
            return redirect('users')->with('message', 'El usuario: '.$user->fullname.' fue actualizado con éxito!!');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $file = public_path().'/'.$user->photo;
        if (getimagesize($file) && $user->photo != 'images/no-photo.png') {
            unlink($file);
        }

        if($user->delete()){
            return redirect('users')->with('message', 'El usuario: '.$user->fullname.' fue eliminado con éxito!!');
        }
    }
}
