<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function __construct() {
        // $this->middleware('auth');
    }

    public function AllCat() {
        // $categories = DB::table('categories')->latest()->paginate(5); //Query Builder
        $categories = Category::paginate(10); //ORM Eloquent
        $tcategories = Category::onlyTrashed()->paginate(10); //ORM Eloquent
        return view('dashboard.admin.category.index', compact('categories','tcategories'));
    }

    public function AddCat(Request $request) {
        $validated = $request->validate([
            'parent_id' => 'required|exists:categories,id',
            'category_name' => 'required|unique:categories|max:255',
        ],
        [
            'parent_id.required' => 'Select a parent category name',
            'category_name.required' => 'Please input a category name'
        ]);

        $inserted = Category::insert([
            'parent_id' => $request->parent_id,
            'category_name' => $request->category_name,
            'created_at' => Carbon::now(),
        ]);
        if ($inserted) {
            return Redirect()->back()->with('success', 'Category Added Successfully');
        } else {
            return Redirect()->back()->with('fail', 'Failed To Add new Category');
        }
    }

    public function Edit($id){
        $categories = Category::all(); //ORM Eloquent
        $category = Category::find($id);
        return view('dashboard.admin.category.edit', compact('categories', 'category'));
    }

    public function View($id){
        $categories = Category::all(); //ORM Eloquent
        $category = Category::onlyTrashed()->find($id);
        return view('dashboard.admin.category.view', compact('categories', 'category'));
    }
    
    public function Update(Request $request, $id) {
        $validated = $request->validate([
            'category_name' => 'required|max:255|unique:categories,category_name,'.$id.',id',
        ],
        [
            'category_name.required' => 'Please input a category name'
        ]);
        $updated = Category::find($id)->update([
            'category_name' => $request->category_name,
            'parent_id' => $request->parent_id,
            'updated_at' => now(),
        ]);

        if ($updated) {
            return Redirect()->route('admin.all.category')->with('success', 'Category ID: '.$id.' Updated Successfully');
        } else {
            return Redirect()->route('admin.all.category')->with('fail', 'Failed to update Category ID: '.$id);
        }
    }

    public function SoftDelete($id){
        $category = Category::find($id)->delete();
        return Redirect()->back()->with('success', 'Category ID: '.$id.' Deactivated Successfully');
    }

    public function Restore($id){
        $category = Category::withTrashed()->find($id)->restore();
        return Redirect()->back()->with('success', 'Category ID: '.$id.' Activated Successfully');
    }
    public function ForceDelete($id){
        $category = Category::onlyTrashed()->find($id)->forceDelete();
        return Redirect()->back()->with('success', 'Category ID: '.$id.' Was Deleted Permanently');
    }
    
}