<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;


class AuthController extends Controller
{
    public function index(){
        return view('pages.admin.login',
      [
                'current_page' => 'login',
                'javascript_file' => 'admin/login.js'
            ]
        );
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->put('user_name', auth()->user()->name);
            $request->session()->put('isLoggedIn', true);

            return response()->json([
                'status' => 201,
                'message' => 'Login Succeded',
                'user' => auth()->user(),
           ]);
        }else{
            return response()->json([
                'status' => 422,
                'message' => 'Login Failed',
                'user' => auth()->user(),
            ]);
        }
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
