<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegistrerController extends Controller
{
    public function create(){
        return view('register.create');
    }

    //Creación del usuario que se va a guardar
    public function store(){
        $attributes = request()->validate([
            'name'=>'required|max:255',
            'username'=>'required|max:255|min:3|unique:users,username',//unique:users,username-> comprueba que este valor en la tabla users y la columna username, sea único
            'email'=>'required|email|max:255|unique:users,email',
            'password'=>'required|max:255'
        ]);
        //Se llama al mutator setPasswordAttributes automaticamente porque hago User->password
        $user = User::create($attributes);
        //Mantener el usuario logueado
        auth()->login($user);
        //Propagación id usuario y si es admin o no
        session(['user_id' => $user->id]);
        session(['admin' => $user->admin]);
        //Mensaje flash guardado en session en caso de success
        session()->flash('success', 'Your account has been created!');
        return redirect('/profile');//Cambiar a "/profile" cuando se cree
    }
}
