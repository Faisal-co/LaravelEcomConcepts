<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
class AdminController extends Controller
{
    public function adminCategory(){
        return view('admin.admincategory');
    }
    public function ToAdminCategory(Request $request){
        $category = new Category();
//Here $request->category is input field name = category & $category->category is database column name via Model Category
        $category->category = $request->category; 
        $category->save();
        return redirect()->back()->with('message_category', 'Category Added Successfully!');

    }
}
