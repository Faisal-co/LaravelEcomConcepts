<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
class AdminController extends Controller
{
    public function adminCategory(){
        return view('admin.addcategory');
    }
    public function ToAdminCategory(Request $request){
        $category = new Category();
//Here $request->category is input field name = category & $category->category is database column name via Model Category
        $category->category = $request->category; 
        $category->save();
        return redirect()->back()->with('message_category', 'Category Added Successfully!');

    }
    public function viewCategory(){
       $categories = Category::all();
       return view('admin.viewcategory', compact('categories'));

    }
    public function deleteCategory($id){
        $category_id = Category::findOrFail($id);
        $category_id->delete();
        return redirect()->back()->with('message_deletecategory', 'Category Deleted Successfully!');
    }
    public function updateCategory($id){
        $category_id = Category::findOrFail($id);   
        return view('admin.updatecategory', compact('category_id'));
    }
    public function postUpdateCategory(Request $request, $id){
        $category_id = Category::findOrFail($id);  
        $category_id->category = $request->category;
        $category_id->save();
        return redirect()->back()->with('message_Updatedcategory', 'Category Updated Successfully!');
    }
    public function addProduct(){
        $get_categories = Category::all();
        return view('admin.addproduct', compact('get_categories'));
    }
    public function postAddProduct(Request $request){
        $product = new Product();
        $product->product_title = $request->product_title;
        $product->product_description = $request->product_description;
        $product->product_quantity = $request->product_quantity;
        $product->product_price = $request->product_price;

        $uploaded_image = $request->product_image;
        if($uploaded_image){
            $imagename = time(). '.' . $uploaded_image->getClientOriginalExtension();
            $product->product_image = $imagename;
        }
        $product->product_category = $request->get_product_category;
        $product->save();
        if($uploaded_image && $product->save()){
            $request->product_image->move('products', $imagename);
        }
        return redirect()->back()->with('productmessage_added', 'Product Added Successfully!');
    }
    public function viewProduct(){
        $products = Product::paginate(2);
        return view('admin.viewproduct',compact('products'));
    }
    public function deleteProduct($id){
        $product = Product::findOrFail($id);
        $image_path = public_path('products/' . $product->product_image);
            if(file_exists($image_path)){
                unlink($image_path);
            }
        $product->delete();
        return redirect()->back()->with('productmessage_deleted', 'Product Deleted Successfully!');
    }
    public function updateProduct($id){
        $product = Product::findOrFail($id);
        $category = Category::all();
        return view('admin.updateproduct', compact('product', 'category'));
    }
    public function PostUpdateProduct(Request $request, $id){
        $product = Product::findOrFail($id);
        $product->product_title = $request->product_title;
        $product->product_description = $request->product_description;
        $product->product_quantity = $request->product_quantity;
        $product->product_price = $request->product_price;

        $uploaded_image = $request->product_image;
        if($uploaded_image){
            $imagename = time(). '.' . $uploaded_image->getClientOriginalExtension();
            $product->product_image = $imagename;
        }
        $product->product_category = $request->product_category;
        $product->save();
        if($uploaded_image && $product->save()){
            $request->product_image->move('products', $imagename);
        }
        return redirect()->back()->with('productmessage_added', 'Product Added Successfully!');
    }
    public function searchProduct(Request $request){
        $products = Product::where('product_title', 'LIKE', '%' . $request->search . '%')
        ->orWhere('product_description', 'LIKE', '%' . $request->search . '%')
        ->orWhere('product_category', 'LIKE', '%' . $request->search . '%')->paginate(2);
        return view('admin.viewproduct', compact('products'));
    }
    public function ordersDisplay(){
        $order_info = Order::all();
        return view('admin.ordersdisplay', compact('order_info'));
    }
}








