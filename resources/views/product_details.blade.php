@extends('maindesign')
<base href="/public">
@section('product_details')
<div class="container py-5">
    <div class="row">
        
        <!-- Product Images -->
        <div class="col-md-6">
            <div class="card shadow-sm border-0">
                <img src="{{asset('products/'. $product->product_image)}}" 
                     class="card-img-top img-fluid rounded" 
                     alt="{{ $product->name }}">
            </div>

                <div class="d-flex mt-3 gap-2">
                        <img src="{{asset('products/'. $product->product_image)}}"
                             width="80"
                             class="rounded border p-1"
                             style="cursor:pointer;">
                    
                </div>
        </div>

        <!-- Product Details -->
        <div class="col-md-6">
            <a href="{{route('index')}}"><h6>Back to home</h6></a>
            <h1 class="fw-bold">{{ $product->product_title }}</h1>

            {{-- Price Section --}}
            <div class="my-3">
                    <h4 class="text-danger fw-bold">
                        Price: Rs$ {{ $product->product_price }}/-
                    </h4>
            </div>

            {{-- Description --}}
            <div class="mt-4">
                <h5>Description</h5>
                <p class="text-muted">
                    {{ $product->product_description }}
                </p>
            </div>

            <div>
                <button type="submit" class="btn btn-dark btn-lg w-100">
                    🛒 Add to Cart
                </button>

            </div>
        </div>
    </div>
</div>
@endsection