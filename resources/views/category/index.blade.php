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
        <!-- &#9998 piestukas &#10133- pliusas -->
        @foreach ($categories as $category1)
            @if($category1->parent_id == 0)            
                @if($category1->childs->isEmpty()) 
                <tr>                                                                                    
                    <td>{{$category1->name}}<a href="{{route('category.edit',$category1)}}">&#9998</a><a href="{{route('category.create',$category1)}}">&#x2B</a></td>
                </tr>
                @else                                      
                    @foreach ($category1->childs as $category2)
                        @if($category2->childs->isEmpty())                                       
                            <tr>
                            <td>{{$category1->name}}<a href="{{route('category.edit',$category1)}}">&#9998</a><a href="{{route('category.create',$category1)}}">&#x2B</a></td>
                            <td>{{$category2->name}}<a href="{{route('category.edit',$category2)}}">&#9998</a><a href="{{route('category.create',$category2)}}">&#x2B</a></td>
                            </tr>
                        @else
                            @foreach ($category2->childs as $category3)
                                @if($category3->childs->isEmpty())    
                                    <tr>
                                    <td>{{$category1->name}}<a href="{{route('category.edit',$category1)}}">&#9998</a><a href="{{route('category.create',$category1)}}">&#x2B</a></td>
                                    <td>{{$category2->name}}<a href="{{route('category.edit',$category2)}}">&#9998</a><a href="{{route('category.create',$category2)}}">&#x2B</a></td>
                                    <td>{{$category3->name}}<a href="{{route('category.edit',$category3)}}">&#9998</a><a href="{{route('category.create',$category3)}}">&#x2B</a></td>    
                                    </tr>
                                @else
                                    @foreach ($category3->childs as $category4)
                                        @if($category4->childs->isEmpty())    
                                        <tr>
                                            <td>{{$category1->name}}<a href="{{route('category.edit',$category1)}}">&#9998</a><a href="{{route('category.create',$category1)}}">&#x2B</a></td>
                                            <td>{{$category2->name}}<a href="{{route('category.edit',$category2)}}">&#9998</a><a href="{{route('category.create',$category2)}}">&#x2B</a></td>
                                            <td>{{$category3->name}}<a href="{{route('category.edit',$category3)}}">&#9998</a><a href="{{route('category.create',$category3)}}">&#x2B</a></td>    
                                            <td>{{$category4->name}}<a href="{{route('category.edit',$category4)}}">&#9998</a><a href="{{route('category.create',$category4)}}">&#x2B</a></td>          
                                        </tr>
                                        @else
                                            @foreach ($category4->childs as $category5)
                                                @if($category5->childs->isEmpty())    
                                                    <tr>
                                                    <td>{{$category1->name}}<a href="{{route('category.edit',$category1)}}">&#9998</a><a href="{{route('category.create',$category1)}}">&#x2B</a></td>
                                                    <td>{{$category2->name}}<a href="{{route('category.edit',$category2)}}">&#9998</a><a href="{{route('category.create',$category2)}}">&#x2B</a></td>
                                                    <td>{{$category3->name}}<a href="{{route('category.edit',$category3)}}">&#9998</a><a href="{{route('category.create',$category3)}}">&#x2B</a></td>
                                                    <td>{{$category4->name}}<a href="{{route('category.edit',$category4)}}">&#9998</a><a href="{{route('category.create',$category4)}}">&#x2B</a></td>
                                                    <td>{{$category5->name}}<a href="{{route('category.edit',$category5)}}">&#9998</a><a href="{{route('category.create',$category5)}}">&#x2B</a></td>
                                                @else
                                                    @foreach ($category5->childs as $category6)
                                                        @if($category6->childs->isEmpty())    
                                                            <tr>
                                                                <td>{{$category1->name}}<a href="{{route('category.edit',$category1)}}">&#9998</a><a href="{{route('category.create',$category1)}}">&#x2B</a></td>
                                                                <td>{{$category2->name}}<a href="{{route('category.edit',$category2)}}">&#9998</a><a href="{{route('category.create',$category2)}}">&#x2B</a></td>
                                                                <td>{{$category3->name}}<a href="{{route('category.edit',$category3)}}">&#9998</a><a href="{{route('category.create',$category3)}}">&#x2B</a></td>
                                                                <td>{{$category4->name}}<a href="{{route('category.edit',$category4)}}">&#9998</a><a href="{{route('category.create',$category4)}}">&#x2B</a></td>
                                                                <td>{{$category5->name}}<a href="{{route('category.edit',$category5)}}">&#9998</a><a href="{{route('category.create',$category5)}}">&#x2B</a></td>
                                                                <td>{{$category6->name}}<a href="{{route('category.edit',$category6)}}">&#9998</a><a href="{{route('category.create',$category6)}}">&#x2B</a></td>
                                                            </tr>
                                                        @else
                                                            @foreach ($category6->childs as $category7)
                                                                @if($category7->childs->isEmpty())    
                                                                    <tr>
                                                                    <td>{{$category1->name}}<a href="{{route('category.edit',$category1)}}">&#9998</a><a href="{{route('category.create',$category1)}}">&#x2B</a></td>
                                                                    <td>{{$category2->name}}<a href="{{route('category.edit',$category2)}}">&#9998</a><a href="{{route('category.create',$category2)}}">&#x2B</a></td>
                                                                    <td>{{$category3->name}}<a href="{{route('category.edit',$category3)}}">&#9998</a><a href="{{route('category.create',$category3)}}">&#x2B</a></td>
                                                                    <td>{{$category4->name}}<a href="{{route('category.edit',$category4)}}">&#9998</a><a href="{{route('category.create',$category4)}}">&#x2B</a></td>
                                                                    <td>{{$category5->name}}<a href="{{route('category.edit',$category5)}}">&#9998</a><a href="{{route('category.create',$category5)}}">&#x2B</a></td>
                                                                    <td>{{$category6->name}}<a href="{{route('category.edit',$category6)}}">&#9998</a><a href="{{route('category.create',$category6)}}">&#x2B</a></td>
                                                                    <td>{{$category7->name}}<a href="{{route('category.edit',$category7)}}">&#9998</a><a href="{{route('category.create',$category7)}}">&#x2B</a></td>
                                                                    </tr>
                                                                @else
                                                                    @foreach ($category7->childs as $category8)    
                                                                        <tr>
                                                                        <td>{{$category1->name}}<a href="{{route('category.edit',$category1)}}">&#9998</a><a href="{{route('category.create',$category1)}}">&#x2B</a></td>
                                                                        <td>{{$category2->name}}<a href="{{route('category.edit',$category2)}}">&#9998</a><a href="{{route('category.create',$category2)}}">&#x2B</a></td>
                                                                        <td>{{$category3->name}}<a href="{{route('category.edit',$category3)}}">&#9998</a><a href="{{route('category.create',$category3)}}">&#x2B</a></td>
                                                                        <td>{{$category4->name}}<a href="{{route('category.edit',$category4)}}">&#9998</a><a href="{{route('category.create',$category4)}}">&#x2B</a></td>
                                                                        <td>{{$category5->name}}<a href="{{route('category.edit',$category5)}}">&#9998</a><a href="{{route('category.create',$category5)}}">&#x2B</a></td>
                                                                        <td>{{$category6->name}}<a href="{{route('category.edit',$category6)}}">&#9998</a><a href="{{route('category.create',$category6)}}">&#x2B</a></td>
                                                                        <td>{{$category7->name}}<a href="{{route('category.edit',$category7)}}">&#9998</a><a href="{{route('category.create',$category7)}}">&#x2B</a></td>
                                                                        <td>{{$category8->name}}<a href="{{route('category.edit',$category8)}}">&#9998</a><a href="{{route('category.create',$category8)}}">&#x2B</a></td>
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