<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
    public function create(){
        return view('welcome');
    }
    public function store(){
        //Validate
        $attributes = request()->validate([
            'email'=>'required|email',//exists:users,email-> comprueba que este valor en la tabla users y la columna username, exista
            'password'=>'required'
        ]);
        //Intentar Autenticar y login según los datos dados
        if(auth()->attempt($attributes)){
            session()->regenerate();//Para más seguridad se regenera la ID Session
            //Propagación id usuario y si es admin o no
            session(['user_id' => Auth::user()->id]);
            session(['admin' => Auth::user()->admin]);

            return redirect('/profile')->with('success','Welcome!');
        }
        //Fallo de autenticacion withInput()->Deja los datos en los inputs cuando hay un error withErrors->personalizo el mensaje de la variable $errors de email
        return back()->withInput()->withErrors(['email' => 'The username or password you entered is incorrect, please try again.']);
        //Redirect
    }
    public function destroy(){
        auth()->logout();
        return redirect('/')->with('success','See you soon!');
    }
}
