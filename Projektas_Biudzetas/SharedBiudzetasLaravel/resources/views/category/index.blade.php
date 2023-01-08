@extends('layouts.app')
@section('content')
<div class="container">
<table class="table table-striped caption-top" >
    
    <tr>
        <td colspan="4" style="text-align : center">            
        </td>
    </tr>
    <thead>
        <caption style="text-align:center">Pirkiniai</caption>
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
                    <td>{{$category1->name}}</td>
                </tr>
                @else                                      
                    @foreach ($category1->childs as $category2)
                        @if($category2->childs->isEmpty())                                       
                            <tr>
                                <td>{{$category1->name}}</td>
                                <td>{{$category2->name}}</td>
                            </tr>
                        @else
                            @foreach ($category2->childs as $category3)
                                @if($category3->childs->isEmpty())    
                                    <tr>
                                        <td>{{$category1->name}}</td>
                                        <td>{{$category2->name}}</td>
                                        <td>{{$category3->name}}</td>
                                    </tr>
                                @else
                                    @foreach ($category3->childs as $category4)
                                        @if($category4->childs->isEmpty())    
                                            <tr>
                                            <td>{{$category1->name}}</td>
                                            <td>{{$category2->name}}</td>
                                            <td>{{$category3->name}}</td>
                                            <td>{{$category4->name}}</td>
                                            </tr>
                                        @else
                                            @foreach ($category4->childs as $category5)
                                                @if($category5->childs->isEmpty())    
                                                    <tr>
                                                        <td>{{$category1->name}}</td>
                                                        <td>{{$category2->name}}</td>
                                                        <td>{{$category3->name}}</td>
                                                        <td>{{$category4->name}}</td>
                                                        <td>{{$category5->name}}</td>
                                                    </tr>
                                                @else
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