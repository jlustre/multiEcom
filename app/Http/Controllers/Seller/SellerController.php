<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Seller;

class SellerController extends Controller
{
    public function create(Request $request) {
        //validate input
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:sellers,email',
            'password'=>'required|min:5|max:30',
            'password_confirmation'=>'required|min:5|max:30|same:password',
            'terms' => 'required'
        ],['terms.required'=>'Agree to the terms by checking the box']);

        $seller = new Seller();
        $seller->name = $request->name;
        $seller->email = $request->email;
        $seller->phone = $request->phone;
        $seller->password = \Hash::make($request->password);
        $save = $seller->save();
        
        if ( $save ) {
            return redirect()->route('seller.login')->with('success', 'You are now registered as a SELLER!');
        } else {
            return redirect()->back()->with('fail', 'Something went wrong, failed to register!');
        }
    }

    public function check (Request $request) {
        $request->validate([
            'email'=>'required|email|exists:sellers,email',
            'password'=>'required|min:5|max:30',
        ], [
            'email.exists' => 'The email does not exist in our records!'
        ]);

        $creds = $request->only('email', 'password');
        if (Auth::guard('seller')->attempt($creds)) {
            return redirect()->route('seller.home');
        } else {
            return redirect()->route('seller.login')->with('fail', 'Credentials do not match in our records');
        }
    }

    public function logout() {
        Auth::guard('seller')->logout();
        return redirect()->route('main');
    }
}
