@extends('maindesign')
<base href="/public">
@section('stripe_view')
<html>
<head>
    <title>Laravel 12 Stripe Payment Gateway Integration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <style type="text/css">
        #card-element{
            height: 50px;
            padding-top: 16px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card mt-5">
                <h3 class="card-header p-3">Laravel 12 Stripe Payment Gateway Integration Example - ItSolutionStuff.com</h3>
                <div class="card-body">

                    @session('success')
                        <div class="alert alert-success" role="alert"> 
                            {{ $value }}
                        </div>
                    @endsession
          
                    <form id='checkout-form' method='post' action="{{ route('stripe.post') }}">   
                        @csrf    

                        <strong>Name:</strong>
                        <input type="input" class="form-control" name="name" placeholder="Enter Name">

                        <input type='hidden' name='stripeToken' id='stripe-token-id'>                              
                        <br>
                        <div id="card-element" class="form-control" ></div>
                        <button 
                            id='pay-btn'
                            class="btn btn-success mt-3"
                            type="button"
                            style="margin-top: 20px; width: 100%;padding: 7px;"
                            onclick="createToken()">PAY $ {{ $price }}
                        </button>
                    <form>
                </div>
            </div>
        </div>
    </div> 
</div>
@endsection  
</body> 
</html>