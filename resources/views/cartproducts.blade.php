@extends('maindesign')

@section('cartproducts')

<table style="width: 100%; border-collapse: collapse; font-family: Arial, sans-serif;">
    <thead>
        <tr style="background-color: #f2f2f2;">
            <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Product Name</th>
            <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Product Price</th>
            <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Product Image</th>
            <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Action</th>
       
        </tr>
    </thead>
    <tbody>
    @php
        $price = 0;
    @endphp
    @foreach($cart_value as $cart_product) 
        <tr style="border-bottom: 1px solid #ddd;">
            <td>{{$cart_product->product->product_title}}</td>
            <td>$ {{$cart_product->product->product_price}}</td>

            <td style="padding: 12px;">
                <img style="width:150px;" src="{{asset('products/'.$cart_product->product->product_image)}}" alt="">
            </td>
            <td style="padding: 12px;"><a href="{{route('removecart', $cart_product->id)}}" style = "color:white; background-color: red; padding: 10px ">Remove</a></td>

        </tr>
    @php
    $price = $price + $cart_product->product->product_price;
    @endphp
    @endforeach
    <tr style="border-bottom: 1px solid #ddd; background-color: lightblue">
            <td>Total Price</td>
            <td>$ {{$price}}</td>
    </tr>
    </tbody>
</table>
 @if(session('message_order'))
        <div style = "color:white; background-color: blue; margin-bottom: 10px; padding: 10px" class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
            {{session('message_order')}}
        </div>
    @endif
<form action="{{route('confirm_order')}}" method = 'POST' style = "margin-top: 30px; margin-left: 500px;">
    @csrf
    <input type="text" name = "address" placeholder="Enter your address" required><br><br>
    <input type="text" name = "phone" placeholder="Enter your phone number" required><br><br>
    <input class = "btn btn-primary" type="submit" name = "submit" value = "Confirm Order"><br><br>
</form>

@endsection