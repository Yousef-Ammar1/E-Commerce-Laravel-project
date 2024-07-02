<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\Admin;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function show_login_view()
    {

        return view('admin.auth.login');
    }

    public function login(LoginRequest $request)
    {
        if(auth()->guard('admin')
        ->attempt([
        'username' => $request->username,
        'password' => $request->password
        ]))
        {
            return redirect()->route('admin.dashboard');
        }
    }
    public function logout()
    {
        auth()->logout();
        return redirect()->route('admin.showlogin');
    }

    // public function make_new_admin()
    // {
    //     $admin = new Admin();
    //     $admin->name = 'admin';
    //     $admin->email = 'test@gmail.com';
    //     $admin->username = 'admin';
    //     $admin->password = bcrypt('admin');
    //     $admin->com_code = '1';
    //     $admin->save();
    // }
}
