<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BackEnd\Category;
use App\Models\BackEnd\SubCategory;
use App\Models\BackEnd\Product;


class ProductController extends Controller
{
    public function slugify($text){
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
	    return strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $text));
    }
    public function addProduct(){
        $sub_categories = SubCategory::all();
        return view('backend.product.add-product',compact('sub_categories'));
    }
    public function storeProduct(Request $request){
        $imagesArray = [];
    	if($request->images != ""):
	    	foreach($request->images as $key=> $image){
		        $name = $key.'-'.time().'.'.$image->getClientOriginalExtension();
		        $destinationPath = public_path('uploads/productImages/');
		        $image->move($destinationPath, $name);
		        $image_path = ('uploads/productImages/'.$name);
		        $imagesArray[] = $image_path;
	    	}
	    endif;
        $product = new Product();
        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->sub_category_id = $request->sub_category;
        $product->description = $request->description;
        $product->feature_description = $request->feature_description;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->images = $imagesArray;
        
        $product->status = $request->status;
        $product->featured_product = $request->featured_product;
        $result = $product->save();
        if($result):
            return redirect('manage-product')->with('success','inserted sucessfully');
        else:
            return redirect()->back()->with('danger','inserted unsucessfully');
        endif;
    }
    public function manageProduct(){
        $products = Product::all();
        return view('backend.product.manage-product',compact('products'));
    }
    public function editProduct($id){
        $product = Product::findOrFail($id);
        $sub_categories = SubCategory::all();
        return view('backend.product.edit-product',compact('product','sub_categories'));
    }
   public function updateProduct(Request $request){
       $imagesArray = [];
       $product = Product::find($request->id);
       if($request->images != ""):
            foreach($product->images as $db_image){
                if(file_exists(public_path().'/'.$db_image)){
                    unlink(public_path().'/'.$db_image);
                }
            }
            foreach($request->images as $key=> $image){
                
                $name = $key.'-'.time().'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('uploads/productImages/');
                $image->move($destinationPath, $name);
                $image_path = ('uploads/productImages/'.$name);
                $imagesArray[] = $image_path;
            }
       endif;
       $product->name = $request->name;
       $product->slug = $this->slugify($request->slug);
       $product->sub_category_id = $request->sub_category;
       $product->description = $request->description;
       $product->feature_description = $request->feature_description;
       $product->quantity = $request->quantity;
       $product->price = $request->price;
       if($request->images !=""):
            $product->images = $imagesArray;
       endif; 
       $product->status = $request->status;
       $product->featured_product = $request->featured_product;
       $result = $product->update();
       if($result):
           return redirect('manage-product')->with('success','updated sucessfully');
       else:
           return redirect()->back()->with('danger','updated unsucessfully');
       endif;
   }
   public function deleteProduct($id){
       $product = Product::where('id',$id)->first();
       foreach($product->images as $db_image){
           if(file_exists(public_path().'/'.$db_image)){
               unlink(public_path().'/'.$db_image);
           }
       }
       $result = $product->delete();
       if($result):
           return redirect('manage-product')->with('success','deleted sucessfully');
       else:
           return redirect()->back()->with('danger','deleted unsucessfully');
       endif;
   }
}
