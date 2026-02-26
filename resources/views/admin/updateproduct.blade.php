<base href="/public">
@extends('admin.parentlayout')

@section('addproduct')
    @if(session('productmessage_added'))
        <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
            {{session('productmessage_added')}}
        </div>
    @endif

<div class="container-fluid">

<form action="{{route('admin.postupdateproduct', $product->id)}}" method = 'POST' enctype="multipart/form-data" style = "margin-left: 300px";>
        @csrf
        <input type="text" name='product_title' value = "{{$product->product_title}}"><br><br>
        <textarea name="product_description">
            {{$product->product_description}}
        </textarea><br><br>
        <input type="number" name='product_quantity' placeholder = 'Enter Product Quantity!' value = "{{$product->product_quantity}}"><br><br>
        <input type="number" name='product_price' placeholder='Enter Product Price!'value = "{{$product->product_price}}"><br><br>
        <img style = "width: 100px;"src="{{asset('products/'.$product->product_image)}}"> <label>Old Image</label>
        <input type="file" name='product_image'><label>Add New Image</label><br><br>
        
        <select name = 'product_category' value = "{{$product->product_category}}">
            <option value="{{$product->product_category}}">
                {{$product->product_category}}
            </option>
            @foreach($category as $category)
            <option value = "{{$category->category}}">{{$category->category}}</option><br><br>
            @endforeach
        </select><br><br>
        <input type="submit" name='submit' value = 'Update Product'><br><br>
    </form>
</div>
@endsection