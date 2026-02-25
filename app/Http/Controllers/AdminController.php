<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
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
}








