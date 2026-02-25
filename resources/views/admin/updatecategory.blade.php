@extends('admin.parentlayout')
<base href="/public">
@section('updatecategory')
    @if(session('message_Updatedcategory'))
        <div style = "color:white; background-color: blue; margin-bottom: 10px; padding: 10px" class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
            {{session('message_Updatedcategory')}}
        </div>
    @endif

<div class="container-fluid">

<form action="{{route('admin.postupdatecategory', $category_id->id)}}" method = 'POST'>
        @csrf
        <input type="text" name='category' value = "{{$category_id->category}}">
        <input type="submit" name='submit' value = 'Update Category'>
    </form>
</div>
@endsection