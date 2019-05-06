<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest:admin']);
    }

    public function authpage(Request $request)
    {
        return view('admin.auth.login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        if(Auth::guard('admin')->attempt([
            'email'=>$request->email,
            'password'=>$request->password
        ],$request->filled('remember')))
        {
            return redirect()->intended('admin');
        }
        return back()->with('error','Email ou mot de passe est incorrect')->withInput();
    }
}