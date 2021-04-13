<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BackEnd\Category;
class CategoryController extends Controller
{
    public function addCategory()
    {
        return view('backend.category.add-category');
    }
    public function storeCategory(Request $request)
    { 
        $request->validate([
        'name' => 'required|unique:categories|max:100',
        'slug' => 'required|unique:categories|max:100',    
        ]);
        $category = new Category();
        $category->name = $request->name;
        $category->slug = $request->slug;
        $result = $category->save();
        if($result):
            return redirect('manage-category')->with('success','inserted sucessfully');
        else:
            return redirect()->back()->with('danger','inserted unsucessfully');
        endif;
    }
    public function manageCategory(){
        $categories = Category::all();
        return view('backend.category.manage-category',compact('categories'));

    }
    public function editCategory($id){
        $categories = Category::findOrFail($id);
        return view('backend.category.edit-category',compact('categories'));
    }
    public function updateCategory(Request $request){
        $request->validate([
            'name' => 'required|max:100|unique:categories,name,'.$request->id,
            'slug' => 'required|max:100|unique:categories,slug,'.$request->id
        ]);
        $category = Category::findOrFail($request->id);
        $category->name = $request->name;
        $category->slug = $request->slug;
        $result = $category->save();
        if($result):
            return redirect('manage-category')->with('success','updated sucessfully');
        else:
            return redirect()->back()->with('danger','updated unsucessfully');
        endif;
    }
    public function deleteCategory($id){
        $result = Category::destroy($id);
        if($result):
            return redirect('manage-category')->with('success','deleted sucessfully');
        else:
            return redirect()->back()->with('danger','deleted unsucessfully');
        endif;

    }

}
