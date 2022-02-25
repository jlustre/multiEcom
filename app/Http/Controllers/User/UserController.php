<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $users = User::all(); //ORM Eloquent
        $tusers = User::onlyTrashed()->latest()->paginate(10); //ORM Eloquent
        return view('dashboard.admin.user.index', compact('users','tusers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request) {
        // 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $request->validate([
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function Edit($id){
        $user = User::findOrFail($id);
        return view('dashboard.admin.user.edit', compact('user'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $user = User::onlyTrashed()->findOrFail($id);
        return view('dashboard.admin.user.view', compact('user'));
    }
    
        /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
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
            return Redirect()->route('admin.user.index')->with('success', 'User ID: '.$id.' Updated Successfully');
        } else {
            return Redirect()->route('admin.user.edit', $id)->with('fail', 'Failed to update User ID: '.$id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $user = User::onlyTrashed()->findOrFail($id)->forceDelete();
        return Redirect()->back()->with('success', 'User ID: '.$id.' Was Deleted Permanently');
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
                DB::table('active_users')->insert(array('user_id' =>Auth::id()));
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

    public function updatePassword(Request $request, $id) {
        $validated = $request->validate([
            'password'=>'required|min:5|max:30',
            'password_confirmation'=>'required|min:5|max:30|same:password',
        ]);
        
        $updated = User::findOrFail($id)->update([
            'password' => \Hash::make($request->password),
            'updated_at' => now(),
        ]);

        if ($updated) {
            return Redirect()->route('admin.user.index')->with('success', 'User ID: '.$id.' Password Updated Successfully');
        } else {
            return Redirect()->route('admin.user.index')->with('fail', 'Failed to update password of User ID: '.$id);
        }
    }

    public function softDelete($id){
        $user = User::findOrFail($id)->delete();
        return Redirect()->back()->with('success', 'User ID: '.$id.' Deactivated Successfully');
    }

    public function restore($id){
        $user = User::withTrashed()->findOrFail($id)->restore();
        return Redirect()->back()->with('success', 'User ID: '.$id.' Activated Successfully');
    }

}
