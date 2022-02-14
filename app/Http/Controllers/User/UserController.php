<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function create(Request $request) {
        //validate input
        $request->validate([
            'name'=>'required',
            'sponsor'=>'required|exists:users,username',
            'username'=>'required|min:5|max:30|unique:users,username',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:5|max:30',
            'password_confirmation'=>'required|min:5|max:30|same:password'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->sponsor = strtoupper($request->sponsor);
        $user->username = strtoupper($request->username);
        $user->email = $request->email;
        $user->password = \Hash::make($request->password);
        $save = $user->save();
        
        if ( $save ) {
            return redirect()->route('user.login')->with('success', 'You are now registered successfully!');
        } else {
            return redirect()->back()->with('fail', 'Something went wrong, failed to register!');
        }
    }

    public function check (Request $request) {
        $request->validate([
            'email'=>'required|email|exists:users,email',
            'password'=>'required|min:5|max:30',
        ], [
            'email.exists' => 'The email does not exist in our records!'
        ]);

        $creds = $request->only('email', 'password');
        if (Auth::guard('web')->attempt($creds)) {
            return redirect()->route('user.home');
        } else {
            return redirect()->route('user.login')->with('fail', 'Credentials do not match in our records');
        }
    }

    public function logout() {
        Auth::guard('web')->logout();
        return redirect()->route('main');
    }
}
