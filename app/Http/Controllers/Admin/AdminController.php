<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

class AdminController extends Controller
{
    public function create(Request $request) {
        //validate input
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:admins,email',
            'password'=>'required|min:5|max:30',
            'password_confirmation'=>'required|min:5|max:30|same:password'
        ]);

        $admin = new Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = \Hash::make($request->password);
        $save = $admin->save();
        
        if ( $save ) {
            return redirect()->route('admin.login')->with('success', 'You are now registered successfully!');
        } else {
            return redirect()->back()->with('fail', 'Something went wrong, failed to register!');
        }
    }

    public function check (Request $request) {
        $request->validate([
            'email'=>'required|email|exists:admins,email',
            'password'=>'required|min:5|max:30',
        ], [
            'email.exists' => 'The email does not exist in our records!'
        ]);

        $creds = $request->only('email', 'password');
        if (Auth::guard('admin')->attempt($creds)) {
            return redirect()->route('admin.home');
        } else {
            return redirect()->route('admin.login')->with('fail', 'Credentials do not match in our records');
        }
    }

    public function logout() {
        Auth::guard('admin')->logout();
        return redirect()->route('main');
    }
}
