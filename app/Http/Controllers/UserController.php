<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;

class UserController extends Controller
{
    public function index(){
        if(Auth::check() && Auth::user()->user_type == 'user'){
            return view('dashboard');
        }
        else if(Auth::check() && Auth::user()->user_type == 'admin'){
            return view('admin.dashboard');
        }
    }
    public function homeIndex(){
        // $products = Product::all(); // To Fetch all products from Table.
        if(Auth::check()){
            $count = Cart::where('user_id', Auth::id())->count();  
        }
        else{
            $count = "";
        }
        $products = Product::latest()->take(2)->get(); 
        return view('homeindex', compact('products','count'));
    }
    public function productDetails($id){
        if(Auth::check()){
            $count = Cart::where('user_id', Auth::id())->count();  
        }
        else{
            $count = "";
        }
        $product = Product::findOrFail($id);
        return view('product_details', compact('product', 'count'));
    }
    public function viewAllProducts(){
        if(Auth::check()){
            $count = Cart::where('user_id', Auth::id())->count();  
        }
        else{
            $count = "";
        }
        $products = Product::all();
        return view('viewallproducts', compact('products', 'count'));
    }
    public function addToCart($id){
        $product = Product::findOrFail($id);
        $product_cart = new Cart();
        $product_cart->user_id = Auth::id();
        $product_cart->product_id = $product->id;
        $product_cart->save();
        return redirect()->back()->with('message_cart', 'Adedd to the Cart Successfully!');
    }
    public function cartProducts(){
        if(Auth::check()){
            $count = Cart::where('user_id', Auth::id())->count(); 
            $cart_value = Cart::where('user_id', Auth::id())->get(); 
        }
        else{
            $count = "";
        }
        return view('cartproducts', compact('count', 'cart_value'));
    }
    public function removeCart($id){
        $cart_product = Cart::findOrFail($id);
        $cart_product->delete();
        return redirect()->back();
    }
    public function confirmOrder(Request $request){
        $product_id = Cart::where('user_id', Auth::id())->get();
        $address = $request->address;
        $phone = $request->phone;
        foreach($product_id as $prod_id){
        $order = new Order();
        $order->address = $address;
        $order->phone = $phone;
        $order->user_id = Auth::id();
        // Adding customer order product into orders Table.
        $order->product_id = $prod_id->product_id; // Put carts Table product_id column value into orders Table product_id column.
        $order->save(); 
    }
    $cart_info = Cart::where('user_id', Auth::id())->get();
    foreach($cart_info as $cart_info){
        $cart_id = Cart::findOrFail($cart_info->id);
        $cart_id->delete(); // Delete from carts Table

    }
    return redirect()->back()->with('message_order', 'Order Placed Successfully!');
}
}