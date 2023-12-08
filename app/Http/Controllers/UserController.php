<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    public function login(Request $request){
            $logins = $request->validate([
                'login' => 'required',
                'loginpassword'=> 'required'
            ]);

            $loginField = filter_var($logins['login'], FILTER_VALIDATE_EMAIL) ? 'email' : 'name';
            $loginpass = filter_var($logins['loginpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS) && 'password';

            if (auth()->attempt([$loginField => $logins['login'], $loginpass => $logins['loginpassword']])) {
                $request->session()->regenerate();
            }

                    return redirect ('/');
            }


    public function logout(){
        auth()->logout();
        return redirect('/');
    }

    public function register (Request $request){
            $register= $request ->validate([
                'name'=> ['required', 'min:3', 'max:20', Rule::unique('users','name')],
                'email'=>['required', 'email', Rule::unique('users','email')],
                'password'=>['required', 'min:8']
            ]
            );

            $register['password']= bcrypt($register['password']);

            $user = User::create($register);
            auth()->login($user);
            return redirect('/');

    }
}
