<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BackEnd\Category;
use App\Models\BackEnd\SubCategory;

class SubCategoryController extends Controller
{
    public function add(){
        $categories = Category::all();
        return view('backend.SubCategory.add-sub-category',compact('categories'));
    }
    public function store(Request $request){
        $request->validate([
            'name'=>'required|unique:sub_categories|max:100',
            'slug'=>'required|unique:sub_categories|max:100',
            'category'=>'required'
        ]);
        $subCategory = new SubCategory();
        $subCategory->name = $request->name;
        $subCategory->slug = $request->slug;
        $subCategory->category_id = $request->category;
        $result = $subCategory->save();
        if($result):
            return redirect('sub-manage-category')->with('success','inserted sucessfully');
        else:
            return redirect('')->back()->with('danger','inserted unsucessfully');
        endif;
    }
    public function manage(){
        $subCategories = SubCategory::all();
        return view('backend.SubCategory.sub-manage-category',compact('subCategories'));
    }
    public function edit($id){
        $subCategory = SubCategory::findOrFail($id);
        $categories = Category::all();
        return view('backend.SubCategory.edit-sub-category',compact('subCategory','categories'));
    }
    public function update(Request $request){
        $request->validate([
            'name'=>'required|max:100|unique:sub_categories,name,'.$request->id,
            'slug'=>'required|max:100|unique:sub_categories,slug,'.$request->id,
            'category'=>'required'
        ]);
        $subCategory =  SubCategory::findOrFail($request->id);
        $subCategory->name = $request->name;
        $subCategory->slug = $request->slug;
        $subCategory->category_id = $request->category;
        $result = $subCategory->save();
        if($result):
            return redirect('sub-manage-category')->with('success','updated sucessfully');
        else:
            return redirect()->back()->with('danger','Updated unsucessfully');
        endif; 
    }
    public function delete($id){
        $result = SubCategory::destroy($id);
        if($result):
            return redirect('manage-category')->with('success','deleted sucessfully');
        else:
            return redirect()->back()->with('danger','deleted unsucessfully');
        endif;
    }
}
