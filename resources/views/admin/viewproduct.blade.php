@extends('admin.parentlayout')

@section('viewcategory')
@if(session('message_deletecategory'))
<div style="margin-bottom: 10px; color:black; background-color: orangered">
    {{session('message_deletecategory')}}
</div>
@endif
@if(session('productmessage_deleted'))
<div style="margin-bottom: 10px; color:black; background-color: orangered">
    {{session('productmessage_deleted')}}
</div>
@endif
<div>
          <form id="" action="{{route('admin.searchproduct')}}" method="POST">
            @csrf
            <div class="form-group">
                <input type="text" name="search" placeholder="What are you searching for...">
                <button type="submit" class="submit">Search</button>
            </div>
          </form>
        </div>

<table style="width: 100%; border-collapse: collapse; font-family: Arial, sans-serif;">
    <thead>
        <tr style="background-color: #f2f2f2;">
            <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Product Name</th>
            <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Product description</th>
            <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Product Price</th>
            <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Product Quantity</th>
            <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Product Image</th>
            <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Product Category</th>
       
        </tr>
    </thead>
    <tbody>
    @foreach($products as $product) 
        <tr style="border-bottom: 1px solid #ddd;">
            <td style="padding: 12px;">{{$product->product_title}}</td>
            <td style="padding: 12px;">{{Str::limit($product->product_description, 15,'......more')}}</td>
            <td style="padding: 12px;">{{$product->product_price}}</td>
            <td style="padding: 12px;">{{$product->product_quantity}}</td>
            <td style="padding: 12px;">
                <img style="width:150px;" src="{{asset('products/'. $product->product_image)}}" alt="">
            </td>
            <td style="padding: 12px;">{{$product->product_category}}</td>
            <td style="padding: 12px;">
                <a href="{{route('admin.updateproduct',$product->id)}}" style = "color:green;">Update</a> &nbsp;&nbsp;
                <a href="{{route('admin.deleteproduct', $product->id)}}" onclick = "return confirm('Are you sure want to delete?')">Delete</a>
            </td>
        </tr>
    @endforeach
    {{$products->links()}}
    </tbody>
</table>
@endsection