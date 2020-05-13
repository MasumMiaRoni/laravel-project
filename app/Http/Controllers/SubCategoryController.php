<?php

namespace App\Http\Controllers;

use App\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\SubCategory;

class SubCategoryController extends Controller
{

    function __construct()
    {
        $this->middleware('auth');
    }

    function SubCategory(){
           $categories = Category::orderBY('category_name','asc')->get();
        return view('backend/subcategory/subcategory',compact('categories'));
    }
    function SubCategoryPost(Request $request){
        SubCategory::insert([
            'subcategory_name'=>$request-> subcategory_name,
            'category_id'=>$request-> category_id,
            'created_at' => Carbon::now(),
        ]);
        return back()->with('success','Sub Category Added Successfully');
    }
    function SubCategoryView(){
        $sub_count = SubCategory::count();
        $subcategories = SubCategory::with('get_category')->paginate(5);
        return view('backend/subcategory/view_subcategory',compact('subcategories','sub_count'));
    }
    function SubCategoryDelete($id){
        SubCategory::findorFail($id)->delete();
        return back()->with('delete','Sub Category Delete Successfully');
    }
    function SubCategoryEdit($id){
        $subcategory = SubCategory::findorFail($id);
        return view('backend/subcategory',compact('subcategory'));
    }
    function SubCategoryUpdate(){
        SubCategory::all();
        return view('backend/subcategory');
    }

    function SubCategoryDeleted(){
        $delete_sub_count = SubCategory::onlyTrashed()->count();
        $subcategories = SubCategory::onlyTrashed()->paginate(5);
        return view('backend/subcategory/deleted_category',compact('subcategories','delete_sub_count'));
    }

function SubCategoryRestore($id){
    SubCategory::withTrashed()->findOrFail($id)->restore();
    return back()->with('delete','Data Restore Successfully');
}
function SubCategoryPDeleted($id){
    SubCategory::withTrashed()->findOrFail($id)->forceDelete();
    return back()->with('delete','Data Deleted Fore Ever Permanently');


}
}
