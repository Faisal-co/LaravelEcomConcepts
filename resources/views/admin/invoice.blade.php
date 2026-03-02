<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Customer Name:    {{$data->user->name}} <br><br><br>
    Customer Address: {{$data->address}} <br><br><br>
    Customer Phone:   {{$data->phone}} <br><br><br>
    Product:          {{$data->product->product_title}} <br><br><br>
    Product Price:    {{$data->product->product_price}}
</body>
</html>