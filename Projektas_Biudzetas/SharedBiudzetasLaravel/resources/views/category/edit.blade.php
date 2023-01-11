@extends('layouts.app')
@section('content')
<div class="container">
<div>
        <h6><a href="{{route('category.index')}}">Back</a></h6>     
    </div> 

<form method="POST" action="{{route('category.update',[$category])}}">
        <p>
        <label for="category_name"> Kategorijos pavadinimas</label>
        <input type="text" name="category_name" id="category_name" value="{{$category->name}}">
        </p>
        <p>
        <label for="kategorijos">Tėvynė kategorija</label>
        <input list="kategorijos" name="category_parent_id" value="{{$category->parent_id}}">
        <datalist id="kategorijos">
                @foreach(App\Models\Category::all() as $categoryCycle)
                    <option value="{{$categoryCycle->id}}">{{$categoryCycle->name}}</option>
                @endforeach
        </datalist>
        </p>
        <input type="hidden" id="category_id" name="category_id" value="{{$category}}">
        @csrf
        <button type="submit">EDIT</button>
</form>
</div>
@endsection