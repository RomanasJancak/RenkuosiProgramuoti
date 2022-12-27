<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">   
    <title>User {{$user->name}} info</title>
</head>
<body>
    <div>
        <h6><a href="{{route('user.index')}}">Back</a></h6>
    </div>    
    <table>
        <caption>Vartotojas</caption>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Email verified at</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Budgets count</th>
            <th colspan="2">Actions</th>
        </tr>
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->email_verified_at}}</td>
            <td>{{$user->created_at}}</td>
            <td>{{$user->updated_at}}</td>
            <td>{{$user->budgets->count()}}</td>
            <td><a href="{{route('user.edit',[$user])}}">Edit</a></td>
            <td><a href="{{route('user.destroy',[$user])}}">Delete account</a></td>
        </tr>
    </table>
    <table>
        <caption>Biudžetai</caption>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Created</th>
            <th>Updated</th>
            <th colspan="3">Actions<th>
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
            <td colspan="4" style="text-align : center">
            <a href="{{route('budget.create',$user)}}">Add Budget</a>            
            </td>
        </tr>
    </table>
</body>
</html>