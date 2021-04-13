<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BackEnd\Product;
use App\Models\BackEnd\SubCategory;
use App\Models\BackEnd\Customer;
use App\Models\BackEnd\Order;
use App\Models\BackEnd\Order_product;
use App\Models\BackEnd\Slider;
use Stripe;
use Session;
use Cart;
use DB;
use Illuminate\Support\Facades\Crypt;

class SiteController extends Controller
{
    public function home(){
        $featured_products = Product::where('featured_product',1)->active()->orderBy('id','desc')->limit(4)->get();
        $latest_products = Product::orderBy('id','desc')->active()->get();
        $images = Slider::where('image','id');
        return view('frontend.pages.home',compact('featured_products','latest_products','images'));
    }
    
    public function productDetail($slug){
        $product = Product::where('slug',$slug)->first();
        $products = Product::where('featured_product',$product->featured_product)->active()->orderBy('id','desc')->limit(12)->get();
        return view('frontend.pages.product-details',compact('product','products'));
    }
    public function subCategory($slug){
        $sub_category = subCategory::where('slug',$slug)->first();
        $products = Product::where('sub_category_id',$sub_category->id)->active()->orderBy('id','desc')->limit(12)->get();
        return view('frontend.pages.sub-category',compact('products','sub_category'));
    }
    public function handlePost(Request $request)
    {
      
  
        DB::beginTransaction();
        try {
            
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => round(Cart::subtotal()),     
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Making test payment." 
        ]);
        $customer = new Customer;
        $customer->name = $request->name;
        $customer->email = $request->email;      
        $customer->password = Crypt::encryptString($request->password);
        $customer->mobile = $request->mobile;
        $customer->save();
        
        $order = new Order;
        $order->customer_id = $customer->id;
        $order->shipping_address = $request->shipping_address;
        $order->save();

        foreach(Cart::content() as $key=>$product){
            $order_product = new Order_product;
            $order_product->order_id = $order->id;
            $order_product->product_id = $product->id;
            $order_product->quantity =  $product->qty;
            $order_product->price = $product->price;
            $order_product->save();
        }
        Cart::destroy();
        DB::commit();
        Session::flash('success', 'Payment has been successfully processed.');
        return back();
     } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
                
            Session::flash('danger', 'invalid');
            return back();
        }
    }
    public function userLogin(){
        return view('frontend.auth.login');
    }
    public function userLoginSubmit(Request $request){
        $customer = Customer::where('email',$request->email)->first();
        if(blank($customer)){
            Session::flash('danger','Invalid email');
            return back();
        }
       if(Crypt::decryptString($customer->password) == $request->password){
        Session::put('customer_id',$customer->id);
        return redirect()->route('order-list');
       }else{
            Session::flash('danger','Invalid password');
            return back();
       }
    }
    public function orderList(){
        $orders = Order::where('customer_id',Session::get('customer_id'))->orderBy('id','desc')->get();
        return view('frontend.pages.order_list',compact('orders'));
    }
    public function userLogout(){
        Session::put('customer_id','');
        return redirect('/');
    }
    
}

