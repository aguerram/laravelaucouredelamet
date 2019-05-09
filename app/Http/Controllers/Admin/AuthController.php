<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest:admin'])->except(['logout']);
    }

    public function authpage(Request $request)
    {
        return view('admin.auth.login');
    }
    public function login(Request $request)
    {
        $this->checkIfthereIsnoAdmin();
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
    private function checkIfthereIsnoAdmin()
    {
        if(count(Admin::all())<1)
        {
            Admin::create([
                'name'=>'Mouna Mabrouk',
                'email'=>'admin@live.fr',
                'password'=>'123456789',
                'level'=>3
            ]);
        }
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin');
    }
}
