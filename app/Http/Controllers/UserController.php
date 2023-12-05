<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()){
            if(strcmp(Auth::user()->role,"admin")==0){
                return view('user.index')->withDetails(User::all());
            }
        }
        return view('welcome')->withMessage('No tienes permiso para usar esa acción');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!Auth::user()){
            return view('welcome')->withMessage('No tienes permiso para usar esa acción');
        }
        if(strcmp(Auth::user()->role,"admin")!=0){
            return view('welcome')->withMessage('No tienes permiso para usar esa acción');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!Auth::user()){
            return view('welcome')->withMessage('No tienes permiso para usar esa acción');
        }
        if(strcmp(Auth::user()->role,"admin")!=0){
            return view('welcome')->withMessage('No tienes permiso para usar esa acción');
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!Auth::user()){
            return view('welcome')->withMessage('No tienes permiso para usar esa acción');
        }
        if(strcmp(Auth::user()->role,"admin")!=0){
            return view('welcome')->withMessage('No tienes permiso para usar esa acción');
        }
        return User::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //$user = Corona::findOrFail($id);
        if(!Auth::user()){
            return view('welcome')->withMessage('No tienes permiso para usar esa acción');
        }
        if(strcmp(Auth::user()->role,"admin")!=0){
            return view('welcome')->withMessage('No tienes permiso para usar esa acción');
        }
        
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if(!Auth::user()){
            return view('welcome')->withMessage('No tienes permiso para usar esa acción');
        }
        if(strcmp(Auth::user()->role,"admin")!=0){
            return view('welcome')->withMessage('No tienes permiso para usar esa acción');
        }
        $validatedData = $request->validate([
            'email' => 'required|email',
            'name' => 'required',
            'role' => 'required',
        ]);
        //$usuario = User::where('id',$request->id)->get();
        if(User::where('id',$request->id)->update($validatedData
            /*[
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ]*/)){
            return view('user.index')->withDetails(User::all())->withMessage('Usuario actualizado correctamente');
            /*return [
                'role antiguo'=>$user->role,
                'role nuevo'=>$request->role];*/
            //return view('user.index')->withDetails($usuario)->withMessage('Usuario actualizado');
        }else{
            return view('user.index')->withDetails(User::all())->withMessage('No se pudo actualizar el usuario');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if(Auth::user()){
            if(strcmp(Auth::user()->role,"admin")==0){
                $user->destroy();
            }
        }
        return view('welcome')->withMessage('No tienes permiso para usar esa acción');
    }

}
