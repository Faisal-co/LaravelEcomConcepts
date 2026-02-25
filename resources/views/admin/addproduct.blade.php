@extends('admin.parentlayout')

@section('addproduct')
    @if(session('productmessage_added'))
        <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
            {{session('productmessage_added')}}
        </div>
    @endif

<div class="container-fluid">

<form action="{{route('admin.postaddproduct')}}" method = 'POST' enctype="multipart/form-data" style = "margin-left: 300px";>
        @csrf
        <input type="text" name='product_title' placeholder = 'Enter Product Name!'><br><br>
        <textarea name="product_description">
            Product Description
        </textarea><br><br>
        <input type="number" name='product_quantity' placeholder = 'Enter Product Quantity!'><br><br>
        <input type="number" name='product_price' placeholder='Enter Product Price!'><br><br>
        <input type="file" name='product_image'><br><br>
        <select name = 'get_product_category'><br><br>
            @foreach($get_categories as $category)
            <option value = "{{$category->category}}">{{$category->category}}</option><br><br>
            @endforeach
        </select><br><br>
        <input type="submit" name='submit' value = 'Add Product'><br><br>
    </form>
</div>
@endsection