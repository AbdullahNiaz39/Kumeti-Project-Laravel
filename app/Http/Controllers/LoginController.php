<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        if ($request->session()->has('login')) {
            return redirect('/dashboard');
        } else {

            return view('index');
        }
    }
    public function auth(Request $request)
    {
        $email = $request->post('email');
        $password = $request->post('password');
        $result = User::where(['email' => $email, 'password' => $password])->get();
        if (count($result) > 0) {
            $request->session()->put('login', true);
            $request->session()->put('checklogin', $email);
            $request->session()->put('USER_NAME', $result[0]->name);
            return redirect('/dashboard');

        } else {
            $request->session()->flash('error', 'Please Enter Valid Email or Password');
            return redirect('/login_admin');
        }

    }
}
