<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;

use carbon\carbon;


class CatagoryController extends Controller
{
    function __construct()
    {
        $this->middleware('verified');
    }


    function category (){
        return view('backend/category');
    }


    function categoryPost(Request $request){
//        $cat = new Category;
//        $cat->category_name = $request->name;
//        $cat->save();

        //Form validation

        $request->validate([
            'category_name' => ['required','min:3','max:50','unique:categories']
        ]);

        Category::insert([
            'category_name' => $request->category_name,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);


        return back()->with('success','Category Added Successfully');
    }

    function categoryView(){
        $category = category::orderBy('category_name','asc')->paginate(3);
        return view('backend/view_category',compact('category'));
    }

    function categoryDelete($id){
        category::findorFail($id)->delete();
        return back()->with('delete','Category Delete Successfully');
    }

    function categoryEdit($id){
        $category = category::findorFail($id);
        return view('backend/edit_category',compact('category'));
    }

    function categoryUpdate(Request $request){

        $id = $request->category_id;
        category::findorFail($id)->update([
            'category_name'=>$request->category_name,
        ]);

        return redirect('/view-category-list')->with('update','Category Updated Successfully');
    }
}
