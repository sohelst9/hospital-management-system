<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;


class AdminController extends Controller
{
    public function login()
    {
        return view('admin.auth.login');
    }
    public function login_store(Request $request)
    {
        $request->validate([
            'username'=>'required',
            'password'=>'required'
        ]);

        if(Auth::guard('admin')->attempt(['username'=>$request->username, 'password'=>$request->password])){
            return redirect()->route('admin.dashboard')->with('success', 'Login successfully !');
        }
        else{
            return redirect()->route('admin.login')->with('error', 'Username Or password Invalid !');
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login')->with('error', 'Admin Logout Successfully');
    }
    public function register()
    {
        $roles = Role::all();
        return view('admin.auth.register', compact('roles'));
    }
    public function register_store(Request $request)
    {
        //return $request->all();
        $request->validate([
            'username'=>'required',
            'email'=>'required',
            'role'=>'required',
            'password'=>'required',
        ]);
        if ($request->hasfile('thumbnail')) {
            $file = $request->file('thumbnail')->getClientOriginalName();
            $filePath = public_path('uploads/admin');
            $request->file('thumbnail')->move($filePath, $file);
        }
        Admin::create([
            'username' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
            'image' =>$file,
            'password' => Hash::make($request->password),
            'Is_admin'=>$request->role,
        ]);
        return back()->with('success', 'New User Added !');
    }
}
