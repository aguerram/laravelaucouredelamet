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
        $this->middleware(['auth:admin'])->only(['logout','changepassword']);
    }
    public function authpage(Request $request)
    {
        return view('admin.auth.login');
    }
    public function login(Request $request)
    {
        $this->checkIfthereIsnoAdmin();
        $request->validate(
            [
                'email' => 'required|string',
                'password' => 'required'
            ],
            [
                'email.required'=>'Nom d\'utilisateur est réquis'
            ]
        );
        if (Auth::guard('admin')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ], $request->filled('remember'))) {
            return redirect()->intended('admin/member');
        }
        return back()->with('error', 'Email ou mot de passe est incorrect')->withInput();
    }
    private function checkIfthereIsnoAdmin()
    {
        if (count(Admin::all()) < 1) {
            Admin::create([
                'name' => 'Mouna Mabrouk',
                'email' => 'admin',
                'password' => '123456789',
                'level' => 3
            ]);
        }
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin/member');
    }
    public function changepassword(Request $request)
    {
        if($request->password != $request->password_confirmation)
        {
            return back()->with('error','La confirmation de mot de pass ne corespond pas');
        }
        if(strlen($request->password)<8)
        {
            return back()->with('error','Le mot de passe doit comporter au moins 8 caractères.');
        }
        $admin = Admin::first();
        $admin->password = $request->password;
        $admin->save();
        return back()->with('success','Votre mot de passe a été changé');
    }
}
