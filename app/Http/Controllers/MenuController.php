<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Models\Menu;

// use App\Models\Menu;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $allmenu = Menu::orderBy('parent_id')->select('id','parent_id','name')->get()->toArray();
        $tree = array();
        $tree = buildTree($allmenu, 1);

        usort($allmenu, function($a, $b) {
            return $a['name'] <=> $b['name'];
        });

        $menus = Menu::orderBy('parent_id')->paginate(10); //ORM Eloquent
        $tmenus = Menu::onlyTrashed()->paginate(10); //ORM Eloquent

        return view('dashboard.admin.menu.index', compact('allmenu', 'tree', 'menus','tmenus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $validated = $request->validate([
            'parent_id' => 'required|exists:menus,id',
            'name' => 'required|unique:menus|max:255',
        ],
        [
            'parent_id.required' => 'Select a parent menu name',
            'name.required' => 'Please input a menu name'
        ]);

        $inserted = Menu::insert([
            'parent_id' => $request->parent_id,
            'name' => $request->name,
            'iconclass' => $request->iconclass,
            'routegroup' => $request->routegroup,
            'url' => $request->url,
            'isActive' => $request->isActive,
            'created_at' => Carbon::now(),
        ]);
        if ($inserted) {
            return Redirect()->back()->with('success', 'Menu Added Successfully');
        } else {
            return Redirect()->back()->with('fail', 'Failed To Add New Menu');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $menus = Menu::all(); //ORM Eloquent
        $menu = Menu::onlyTrashed()->findOrFail($id);
        return view('dashboard.admin.menu.view', compact('menus', 'menu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $menus = Menu::all(); //ORM Eloquent
        $menu = Menu::findOrFail($id);
        return view('dashboard.admin.menu.edit', compact('menus', 'menu'));
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
            'name' => 'required|max:255|unique:menus,name,'.$id.',id',
        ],
        [
            'name.required' => 'Please input a menu name'
        ]);
 
        $updated = Menu::findOrFail($id)->update([
            'name' => $request->input('name'),
            'parent_id' => $request->input('parent_id'),
            'iconclass' => $request->input('iconclass'),
            'routegroup' => $request->input('routegroup'),
            'url' => $request->input('url'),
            'isActive' => $request->input('isActive'),
            'updated_at' => now(),
        ]);

        if ($updated) {
            return Redirect()->route('admin.menu.index')->with('success', 'Menu ID: '.$id.' Updated Successfully');
        } else {
            return Redirect()->url(' admin/menu/'.$id.'/edit')->with('fail', 'Failed to update Menu ID: '.$id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $menu = Menu::onlyTrashed()->findOrFail($id)->forceDelete();
        return Redirect()->back()->with('success', 'Menu ID: '.$id.' Was Deleted Permanently');
    }

    public function softDelete($id){
        $menu = Menu::findOrFail($id)->delete();
        return Redirect()->back()->with('success', 'Menu ID: '.$id.' Deactivated Successfully');
    }

    public function restore($id){
        $menu = Menu::withTrashed()->findOrFail($id)->restore();
        return Redirect()->back()->with('success', 'Menu ID: '.$id.' Activated Successfully');
    }

    
}
