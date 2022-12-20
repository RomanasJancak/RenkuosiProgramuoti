<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">   
    <title>Apsipirkimo : "{{$apsipirkimas->id}}" info</title>
</head>
<body>
    <div>
        <h6><a href="{{route('budget.show',[$budget,$user])}}">Back</a></h6>
    </div>    
    <table>
        <caption>Apsipirkimas</caption>
        <tr>
            <th>ID</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Suma</th>
            <th>Shop</th>
            <th>Shop time</th>           
        </tr>
        <tr >
            <td>{{$apsipirkimas->id}}</td>
            <td>{{$apsipirkimas->created_at}}</td>
            <td>{{$apsipirkimas->updated_at}}</td>     
            <td>{{$apsipirkimas->suma}}</td>
            <td>{{$apsipirkimas->shop_id}}</td>
            <td>{{$apsipirkimas->shop_time}}</td>
            <td>{{$apsipirkimas->budget_id}}</td>
        </tr>
    </table>

    <table>
        <caption>Pirkiniai</caption>
        @foreach ($budget->apsipirkimai as $apsipirkimas)
        <tr>
        <td>{{$apsipirkimas->id}}</td>
            <td>{{$apsipirkimas->created_at}}</td>
            <td>{{$apsipirkimas->updated_at}}</td>
            <td>{{$apsipirkimas->shop_id}}</td>
            <td>{{$apsipirkimas->suma}}</td>
            <td>{{$apsipirkimas->shop_time}}</td>
            <td>{{$apsipirkimas->budget_id}}</td>
            <td><a href="{{route('apsipirkimas.show',[$apsipirkimas,$budget,$user])}}">More...</a></td>
            
        </tr>
        @endforeach
        <tr>
            <td colspan="4" style="text-align : center">Add Budget</td>
        </tr>
    </table>
</body>
</html>