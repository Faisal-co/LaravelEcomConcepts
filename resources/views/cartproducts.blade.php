@extends('maindesign')

@section('cartproducts')

<table style="width: 100%; border-collapse: collapse; font-family: Arial, sans-serif;">
    <thead>
        <tr style="background-color: #f2f2f2;">
            <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Product Name</th>
            <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Product Price</th>
            <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Product Image</th>
       
        </tr>
    </thead>
    <tbody>
    @foreach($cart_value as $cart_product) 
        <tr style="border-bottom: 1px solid #ddd;">
            <td style="padding: 12px;">{{$cart_product->cartProducts->product_title}}</td>
            <td style="padding: 12px;">{{$cart_product->cartProducts->product_price}}</td>
            <td style="padding: 12px;">
                <img style="width:150px;" src="{{asset('products/'. $cart_product->product_image)}}" alt="">
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@endsection