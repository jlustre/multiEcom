<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Carbon;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $allcat = Category::orderBy('parent_id')->select('id','parent_id','category_name')->get()->toArray();
        $tree = array();
        $tree = buildTree($allcat, 1);

        usort($allcat, function($a, $b) {
            return $a['category_name'] <=> $b['category_name'];
        });

        $categories = Category::orderBy('parent_id')->paginate(10); //ORM Eloquent
        $tcategories = Category::onlyTrashed()->paginate(10); //ORM Eloquent

        return view('dashboard.admin.category.index', compact('allcat', 'tree', 'categories','tcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $categories = Category::all(); //ORM Eloquent
        $category = Category::onlyTrashed()->findOrFail($id);
        return view('dashboard.admin.category.view', compact('categories', 'category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $categories = Category::all(); //ORM Eloquent
        $category = Category::findOrFail($id);
        return view('dashboard.admin.category.edit', compact('categories', 'category'));
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
            'category_name' => 'required|max:255|unique:categories,category_name,'.$id.',id',
        ],
        [
            'category_name.required' => 'Please input a category name'
        ]);
        $updated = Category::findOrFail($id)->update([
            'category_name' => $request->category_name,
            'parent_id' => $request->parent_id,
            'updated_at' => now(),
        ]);

        if ($updated) {
            return Redirect()->route('admin.category.index')->with('success', 'Category ID: '.$id.' Updated Successfully');
        } else {
            return Redirect()->route('admin.category.edit', $id)->with('fail', 'Failed to update Category ID: '.$id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $category = Category::onlyTrashed()->findOrFail($id)->forceDelete();
        return Redirect()->back()->with('success', 'Category ID: '.$id.' Was Deleted Permanently');
    }

    public function softDelete($id){
        $category = Category::findOrFail($id)->delete();
        return Redirect()->back()->with('success', 'Category ID: '.$id.' Deactivated Successfully');
    }

    public function restore($id){
        $category = Category::withTrashed()->findOrFail($id)->restore();
        return Redirect()->back()->with('success', 'Category ID: '.$id.' Activated Successfully');
    }

}
