@extends('admin.parentlayout')

@section('admincat')
    @if(session('message_category'))
        <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
            {{session('message_category')}}
        </div>
    @endif

<div class="container-fluid">

<form action="{{route('admin.toaddcategory')}}" method = 'POST'>
        @csrf
        <input type="text" name='category' placeholder = 'Enter Category Name!'>
        <input type="submit" name='submit' value = 'Add Category'>
    </form>
</div>
@endsection