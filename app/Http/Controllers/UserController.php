<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

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
        // $products = Product::all();
        $products = Product::latest()->take(2)->get(); 
        return view('homeindex', compact('products'));
    }
    public function productDetails($id){
        $product = Product::findOrFail($id);
        return view('product_details', compact('product'));
    }
    public function viewAllProducts(){
        $products = Product::all();
        return view('viewallproducts', compact('products'));
    }
}
