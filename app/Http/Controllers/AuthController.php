<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showRegister(){
        return view("auth_views.register");
    }

    public function register(Request $request){
        $request->validate(
            [
                'name'=>'required | max:50',
                "email"=>'required | string | email | unique:users,email',
                'password'=>'required |confirmed |string',
            ]
        );

        $user=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
        ]);

        Auth::login($user);

        return redirect(url('cats'));
    }

    public function showLogin(){
        return view("auth_views.login");
    }


    public function login(Request $request){
        $request->validate(
            [
                "email"=>'required | string | email ',
                'password'=>'required |string',
            ]
        );

        $isLogin =Auth::attempt([
            'email' => $request->email,
            'password' =>$request->password
        ]);

        if($isLogin){
            return redirect(url('cats'));
        }else{
            return back();
        }


    }

    public function logout(){
        Auth::logout();
        return redirect(url('form/login'));
    }
}
