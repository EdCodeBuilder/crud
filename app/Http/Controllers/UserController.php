<?php

namespace App\Http\Controllers;

use Doctrine\DBAL\Schema\View;
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
        $users = User::all();
        return View::make('users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
        $request->validate([
            'user' => 'required|max:255',
            'email' => 'required',
            'password' => 'required|string|min:8',
            'nombre_completo' => 'required|max:255',
            'edad' => 'required',
            'sexo' => 'required',
            'direccion' => 'required|max:255'
        ]);
        $user = User::create($request->all());
       return redirect()->route('users.index')
           ->with('success', 'Usuario creado correctamente.');
        */
        $rules = array(
            'user' => 'required|max:255',
            'email' => 'required',
            'password' => 'required|string|min:8',
            'nombre_completo' => 'required|max:255',
            'edad' => 'required',
            'sexo' => 'required',
            'direccion' => 'required|max:255'
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Redirect::to('users/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $user = new user;
            $user->username = Input::get('username');
            $user->email = Input::get('email');
            $user->nombre_ompleto = Input::get('nombre_completo');
            $user->edad = Input::get('edad');
            $user->sexo = Input::get('sexo');
            $user->direccion = Input::get('direccion');
            $user->save();

            // redirect
            Session::flash('message', 'Usuario creado con éxito!');
            return Redirect::to('users');
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->update($request->all());
       return redirect()->route('users.index')
           ->with('success', 'Usuario actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')
            ->with('success', 'Usuario eliminado correctamente.');
    }
}
