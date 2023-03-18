<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $user = User::paginate(10);
        $users = User::all();
        dd($users);
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
            $file = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/profiles', $file));
            $user->photo = 'images/profiles/'.$file;
        }
        
        $user->password = bcrypt($request->password);
        $user->role_id = $request->role_id;

        if($user->save()){
            dd($user);
            //Retornar la vista
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
        dd($user);
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
            $file = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/profiles', $file));
            $user->photo = 'images/profiles/'.$file;
        }
        
        $user->password = bcrypt($request->password);
        $user->role_id = $request->role_id;

        if($user->save()){
            dd($user);
            //Retornar la vista
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
        
        if($user->delete()){
            // Retorne la vista index con el mensaje que pudo eliminar el elemento exitosamente
        }
    }
}
