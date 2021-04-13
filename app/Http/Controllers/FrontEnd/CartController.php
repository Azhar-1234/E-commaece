<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BackEnd\Product;
use Cart;
class CartController extends Controller
{
    public function addToCart(Request $request){
        $product = Product::find($request->product_id);
        if($product->quantity < $request->quantity){
            return redirect()->back()->with('danger','not available');
        }
        
        Cart::add( $request->product_id,$product->name, $request->quantity,$product->price, 550);
        return redirect()->back()->with('success','added sucessfully done');
    }
    public function showCart(){
        return view('frontend.pages.cart');
    }
    public function checkQuantity(Request $request){
        $product = Product::find($request->product_id);

        if($product->quantity >= $request->product_quantity){
            Cart::update($request->key,$request->product_quantity); 

            $cart_info = Cart::get($request->key);
            $cart['qty'] = $cart_info->qty;
            $cart['price'] = $cart_info->qty * $cart_info->price;
            $cart['total_qty'] = Cart::count();
            $cart['total_price'] = Cart::subtotal();
            return response()->json(['success',$cart]);
        }

        $cart_info = Cart::get($request->key);
        $cart['qty'] = $cart_info->qty;
        $cart['price'] = $cart_info->qty * $cart_info->price;
        $cart['total_qty'] = Cart::count();
        $cart['total_price'] = Cart::subtotal();
        return response()->json(['failed',$cart]);
    }
    public function deleteProduct(Request $request){
            
        Cart::remove( $request->key);
        $cart['total_qty'] = Cart::count();
        $cart['total_price'] = Cart::subtotal();
        return response()->json(['success',$cart]);

    }
    public function checkout(){
        return view('frontend.pages.checkout');
    }
}
