<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserController extends Controller
{
    public function AllUser() {
        // $categories = DB::table('categories')->latest()->paginate(5); //Query Builder
        $users = User::latest()->paginate(10); //ORM Eloquent
        $tusers = User::onlyTrashed()->latest()->paginate(10); //ORM Eloquent
        return view('dashboard.admin.user.index', compact('users','tusers'));
    }

    public function create(Request $request) {
        //validate input
        $request->validate([
            'name'=>'required',
            'sponsor'=>'required|exists:users,username',
            'username'=>'required|min:5|max:30|unique:users,username',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:5|max:30',
            'password_confirmation'=>'required|min:5|max:30|same:password',
            'terms' => 'required'
        ],['terms.required'=>'Agree to the terms by checking the box']);

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

    public function AddUser(Request $request) {
        $validated = $request->validate([
            'name'=>'required',
            'sponsor'=>'required|exists:users,username',
            'username'=>'required|min:5|max:30|unique:users,username',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:5|max:30',
            'password_confirmation'=>'required|min:5|max:30|same:password',
        ],[
            'sponsor.exists' => 'sponsor does not exist in our database'
        ]);

        $inserted = User::insert([
            'name' => $request->name,
            'sponsor' => strtolower($request->sponsor),
            'username' => strtolower($request->username),
            'email' => $request->email,
            'password' => \Hash::make($request->password),
            'created_at' => now(),
        ]);
        if ($inserted) {
            return Redirect()->back()->with('success', 'User Added Successfully');
        } else {
            return Redirect()->back()->with('fail', 'Failed To Add New User');
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
                DB::table('active_users')->insert(array('user_id' =>   Auth::id()));
                return redirect()->route('user.home')->with('success', 'You have logged in successfully');
        } else {
            return redirect()->route('user.login')->with('fail', 'Credentials do not match in our records');
        }
    }

    public function logout() {
        DB::table('active_users')->where('user_id', '=', Auth::id())->delete();
        Auth::guard('web')->logout();
        return redirect()->route('main');
    }

    public function Edit($id){
        $user = User::findOrFail($id);
        return view('dashboard.admin.user.edit', compact('user'));
    }

    public function View($id){
        $user = User::onlyTrashed()->findOrFail($id);
        return view('dashboard.admin.user.view', compact('user'));
    }
    
    public function Update(Request $request, $id) {
        $validated = $request->validate([
            'name'=>'required',
            'sponsor'=>'required|exists:users,username',
            'email'=>'required|email|unique:users,email,'.$id,
            'username'=>'required|min:5|max:30|unique:users,username,'.$id,
        ],
        [
            'sponsor.exists' => 'Sponsor must exists in our database'
        ]);
        $updated = User::findOrFail($id)->update([
            'name' => $request->name,
            'sponsor' => strtolower($request->sponsor),
            'username' => strtolower($request->username),
            'email' => $request->email,
            'updated_at' => now(),
        ]);

        if ($updated) {
            return Redirect()->route('admin.all.user')->with('success', 'User ID: '.$id.' Updated Successfully');
        } else {
            return Redirect()->route('admin.all.user')->with('fail', 'Failed to update User ID: '.$id);
        }
    }

    public function UpdatePassword(Request $request, $id) {
        $validated = $request->validate([
            'password'=>'required|min:5|max:30',
            'password_confirmation'=>'required|min:5|max:30|same:password',
        ]);
        
        $updated = User::findOrFail($id)->update([
            'password' => \Hash::make($request->password),
            'updated_at' => now(),
        ]);

        if ($updated) {
            return Redirect()->route('admin.all.user')->with('success', 'User ID: '.$id.' Password Updated Successfully');
        } else {
            return Redirect()->route('admin.all.user')->with('fail', 'Failed to update password of User ID: '.$id);
        }
    }


    public function SoftDelete($id){
        $user = User::findOrFail($id)->delete();
        return Redirect()->back()->with('success', 'User ID: '.$id.' Deactivated Successfully');
    }

    public function Restore($id){
        $user = User::withTrashed()->findOrFail($id)->restore();
        return Redirect()->back()->with('success', 'User ID: '.$id.' Activated Successfully');
    }
    public function ForceDelete($id){
        $user = User::onlyTrashed()->findOrFail($id)->forceDelete();
        return Redirect()->back()->with('success', 'User ID: '.$id.' Was Deleted Permanently');
    }
}
