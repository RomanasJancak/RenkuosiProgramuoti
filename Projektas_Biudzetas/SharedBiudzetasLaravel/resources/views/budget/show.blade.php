<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">   
    <title>Biudžetas "{{$budget->name}}"info</title>
</head>
<body>
    <div>
        <h6><a href="{{route('user.show',$user)}}">Back</a></h6>
    </div>    
    <table>
        <caption>Biudžetas</caption>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Created</th>
            <th>Updated</th>
            
        </tr>
        <tr>
            <td>{{$budget->id}}</td>
            <td>{{$budget->name}}</td>
            <td>{{$budget->created_at}}</td>
            <td>{{$budget->updated_at}}</td>
        </tr>
    </table>
    <table>
        <caption>Apsipirkimai</caption>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Show<th>
        </tr>
        @foreach ($user->budgets as $budget)
        <tr>
            <td>{{$budget->id}}</td>
            <td>{{$budget->name}}</td>
            <td>{{$budget->created_at}}</td>
            <td>{{$budget->updated_at}}</td>
            <td><a href="{{route('budget.show',[$budget,$user])}}">More...</a></td>
            
        </tr>
        @endforeach
        <tr>
            <td colspan="4" style="text-align : center">Add Budget</td>
        </tr>
    </table>
</body>
</html>