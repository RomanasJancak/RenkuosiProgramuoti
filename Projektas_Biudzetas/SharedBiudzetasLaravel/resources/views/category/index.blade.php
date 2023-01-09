@extends('layouts.app')
@section('content')
<div class="container">
<form method="POST" action="{{route('category.store_withoutParent')}}">
    <p>
        <label for="category_name_id">Nauja aukščiausia kategorija :</label>
        <input type="text" name="category_name" id="category_name_id" placeholder="Pavadinimas">            
    </p>
        @csrf
    <button type="submit">Pridėti</button>
</form>    
<table class="table table-striped caption-top" >
        <thead>
        <caption style="text-align:center">Kategorijos</caption>
        <tr><th>Pridėti kategorija</th></tr>
        <tr>
            <th>L1</th>
            <th>L2</th>
            <th>L3</th>
            <th>L4</th>
            <th>L5</th> 
            <th>L6</th>
            <th>L7</th>
            <th>L8</th>           
            <th colspan="3">Actions<th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category1)
            @if($category1->parent_id == 0)
            
                @if($category1->childs->isEmpty()) 
                <tr>
                    <td>{{$category1->name}} <form method="get" action="{{route('category.create',$category1)}}">@csrf<input type="submit" value="Prideti"></form></td>
                </tr>
                @else                                      
                    @foreach ($category1->childs as $category2)
                        @if($category2->childs->isEmpty())                                       
                            <tr>
                                <td>{{$category1->name}}</td>
                                <td>{{$category2->name}}<form method="get" action="{{route('category.create',$category2)}}">@csrf<input type="submit" value="Prideti"></form></td>
                            </tr>
                        @else
                            @foreach ($category2->childs as $category3)
                                @if($category3->childs->isEmpty())    
                                    <tr>
                                        <td>{{$category1->name}}</td>
                                        <td>{{$category2->name}}</td>
                                        <td>{{$category3->name}}<form method="get" action="{{route('category.create',$category3)}}">@csrf<input type="submit" value="Prideti"></form></td>
                                    </tr>
                                @else
                                    @foreach ($category3->childs as $category4)
                                        @if($category4->childs->isEmpty())    
                                            <tr>
                                            <td>{{$category1->name}}</td>
                                            <td>{{$category2->name}}</td>
                                            <td>{{$category3->name}}</td>
                                            <td>{{$category4->name}}<form method="get" action="{{route('category.create',$category4)}}">@csrf<input type="submit" value="Prideti"></form></td>
                                            </tr>
                                        @else
                                            @foreach ($category4->childs as $category5)
                                                @if($category5->childs->isEmpty())    
                                                    <tr>
                                                        <td>{{$category1->name}}</td>
                                                        <td>{{$category2->name}}</td>
                                                        <td>{{$category3->name}}</td>
                                                        <td>{{$category4->name}}</td>
                                                        <td>{{$category5->name}}<form method="get" action="{{route('category.create',$category5)}}">@csrf<input type="submit" value="Prideti"></form></td>
                                                    </tr>
                                                @else
                                                    @foreach ($category5->childs as $category6)
                                                        @if($category6->childs->isEmpty())    
                                                            <tr>
                                                                <td>{{$category1->name}}</td>
                                                                <td>{{$category2->name}}</td>
                                                                <td>{{$category3->name}}</td>
                                                                <td>{{$category4->name}}</td>
                                                                <td>{{$category5->name}}</td>
                                                                <td>{{$category6->name}}<form method="get" action="{{route('category.create',$category6)}}">@csrf<input type="submit" value="Prideti"></form></td>
                                                            </tr>
                                                        @else
                                                            @foreach ($category6->childs as $category7)
                                                                @if($category7->childs->isEmpty())    
                                                                    <tr>
                                                                        <td>{{$category1->name}}</td>
                                                                        <td>{{$category2->name}}</td>
                                                                        <td>{{$category3->name}}</td>
                                                                        <td>{{$category4->name}}</td>
                                                                        <td>{{$category5->name}}</td>
                                                                        <td>{{$category6->name}}</td>
                                                                        <td>{{$category7->name}}<form method="get" action="{{route('category.create',$category7)}}">@csrf<input type="submit" value="Prideti"></form></td>
                                                                    </tr>
                                                                @else
                                                                    @foreach ($category7->childs as $category8)    
                                                                        <tr>
                                                                            <td>{{$category1->name}}</td>
                                                                            <td>{{$category2->name}}</td>
                                                                            <td>{{$category3->name}}</td>
                                                                            <td>{{$category4->name}}</td>
                                                                            <td>{{$category5->name}}</td>
                                                                            <td>{{$category6->name}}</td>
                                                                            <td>{{$category7->name}}</td>
                                                                            <td>{{$category8->name}}</td>
                                                                        </tr>
                                                                    @endforeach    
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                @endif
            @endif                   
        @endforeach
    </tbody>
</table>
</div>
@endsection