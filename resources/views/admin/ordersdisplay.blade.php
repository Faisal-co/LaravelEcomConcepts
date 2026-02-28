@extends('admin.parentlayout')

@section('ordersdisplay')
<table style="width: 100%; border-collapse: collapse; font-family: Arial, sans-serif;">
    <thead>
        <tr style="background-color: #f2f2f2;">
            <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Customer Name</th>
            <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Address</th>
            <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Phone</th>
            <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Product</th>
            <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Price</th>
            <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Product Image</th>
            <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($order_info as $order) 
        <tr style="border-bottom: 1px solid #ddd;">
            <td style="padding: 12px;">{{$order->user->name}}</td>
            <td style="padding: 12px;">{{$order->address}}</td>
            <td style="padding: 12px;">{{$order->phone}}</td>
            <td style="padding: 12px;">{{$order->product->product_title}}</td>
            <td style="padding: 12px;">{{$order->product->product_price}}</td>
            <td style="padding: 12px;">
                <img style="width:150px;" src="{{asset('products/'. $order->product->product_image)}}" alt="">
            </td>
            
            <td style="padding: 12px;">

            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection