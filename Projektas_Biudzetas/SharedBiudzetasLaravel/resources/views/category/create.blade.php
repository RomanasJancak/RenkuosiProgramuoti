@extends('layouts.app')
@section('content')
<div class="container">
    <h6><a href="{{route('category.index')}}">Back</a></h6>
    <form method="POST" action="{{route('category.store',$category)}}">
        <fieldset>
            <legend>Kategorijos sukurimo forma</legend>
            <p>
                @if($category != null)

                Kategorijos kelias :
                @if($category->parent == NULL)
                    <table><tr><td>{{$category->name}}</td></tr></table>
                @elseif($category->parent->parent == NULL)
                    <tr><td>{{$category->parent->name}} -> </td></tr>   
                    <tr><td>{{$category->name}}</td></tr>
                    @elseif($category->parent->parent->parent == NULL)
                    <tr><td>{{$category->parent->parent->name}}</td></tr> 
                    <tr><td>{{$category->parent->name}}</td></tr>   
                    <tr><td>{{$category->name}}</td></tr>
                    @elseif($category->parent->parent->parent->parent == NULL)
                    <table><tr><td>{{$category->parent->parent->parent->name}}</td></tr> 
                    <tr><td>{{$category->parent->parent->name}}</td></tr> 
                    <tr><td>{{$category->parent->name}}</td></tr>   
                    <tr><td>{{$category->name}}</td></tr></table>
                    @elseif($category->parent->parent->parent->parent->parent == NULL)
                    <table><tr><td>{{$category->parent->parent->parent->parent->name}}</td></tr>
                    <tr><td>{{$category->parent->parent->parent->name}}</td></tr> 
                    <tr><td>{{$category->parent->parent->name}}</td></tr> 
                    <tr><td>{{$category->parent->name}}</td></tr>   
                    <tr><td>{{$category->name}}</td></tr></table>
                    @elseif($category->parent->parent->parent->parent->parent->parent == NULL)
                    <table><tr><td>{{$category->parent->parent->parent->parent->parent->name}}</td></tr>
                    <tr><td>{{$category->parent->parent->parent->parent->name}}</td></tr>
                    <tr><td>{{$category->parent->parent->parent->name}}</td></tr> 
                    <tr><td>{{$category->parent->parent->name}}</td></tr> 
                    <tr><td>{{$category->parent->name}}</td></tr>   
                    <tr><td>{{$category->name}}</td></tr></table>
                    @elseif($category->parent->parent->parent->parent->parent->parent->parent == NULL)
                    <table><tr><td>{{$category->parent->parent->parent->parent->parent->parent->name}}</td></tr>
                    <tr><td>{{$category->parent->parent->parent->parent->parent->name}}</td></tr>
                    <tr><td>{{$category->parent->parent->parent->parent->name}}</td></tr>
                    <tr><td>{{$category->parent->parent->parent->name}}</td></tr> 
                    <tr><td>{{$category->parent->parent->name}}</td></tr> 
                    <tr><td>{{$category->parent->name}}</td></tr>   
                    <tr><td>{{$category->name}}</td></tr></table>
                    @else
                    <table>
                    <tr><td>{{$category->parent->parent->parent->parent->parent->parent->parent->name}}</td></tr>
                    <tr><td>{{$category->parent->parent->parent->parent->parent->parent->name}}</td></tr>
                    <tr><td>{{$category->parent->parent->parent->parent->parent->name}}</td></tr>
                    <tr><td>{{$category->parent->parent->parent->parent->name}}</td></tr>
                    <tr><td>{{$category->parent->parent->parent->name}}</td></tr> 
                    <tr><td>{{$category->parent->parent->name}}</td></tr> 
                    <tr><td>{{$category->parent->name}}</td></tr>   
                    <tr><td>{{$category->name}}</td></tr></table>
                @endif
                
            </p>
            <p>
            <label for="category_name_id">Naujos kategorijos pavadinimas :</label>
            <input type="text" name="category_name" id="category_name_id" placeholder="Pavadinimas">            
            </p>
        <input type="hidden" name="parent_category" value="$category">
        @csrf
        <button type="submit">Pridėti</button>
        </fieldset>
    </form>
</div>
@else
</p>
            <p>
            <label for="category_name_id">Naujos kategorijos pavadinimas :</label>
            <input type="text" name="category_name" id="category_name_id" placeholder="Pavadinimas">            
            </p>
        <input type="hidden" name="parent_category" value="$category">
        @csrf
        <button type="submit">Pridėti</button>
        </fieldset>
    </form>
</div>
@endif
@endsection