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
            <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Category ID</th>
            <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Category Name</th>
            <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($categories as $category) 
        <tr style="border-bottom: 1px solid #ddd;">
            <td style="padding: 12px;">{{$category->id}}</td>
            <td style="padding: 12px;">{{$category->category}}</td>
            <td style="padding: 12px;">
                <a href="{{route('admin.updatecategory', $category->id)}}" style = "color:green;">Update</a> &nbsp;&nbsp;
                <a href="{{route('admin.deletecategory', $category->id)}}" onclick = "return confirm('Are you sure want to delete category?')">Delete</a>
            </td>
        </tr>
    @endforeach
        
    </tbody>
</table>
@endsection