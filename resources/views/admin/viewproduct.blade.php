@extends('admin.parentlayout')

@section('viewcategory')
@if(session('message_deletecategory'))
<div style="margin-bottom: 10px; color:black; background-color: orangered">
    {{session('message_deletecategory')}}
</div>
@endif

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
            <td style="padding: 12px;">{{$product->product_description}}</td>
            <td style="padding: 12px;">{{$product->product_price}}</td>
            <td style="padding: 12px;">{{$product->product_quantity}}</td>
            <td style="padding: 12px;">
                <img style="width:150px;" src="{{asset('products/'. $product->product_image)}}" alt="">
            </td>
            <td style="padding: 12px;">{{$product->product_category}}</td>
            <td style="padding: 12px;">
                <a href="" style = "color:green;">Update</a> &nbsp;&nbsp;
                <a href="" onclick = "return confirm('Are you sure want to delete category?')">Delete</a>
            </td>
        </tr>
    @endforeach
    {{$products->links()}}
    </tbody>
</table>
@endsection