<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">   
    <title>User {{$user->name}} info</title>
</head>
<body>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Email verified at</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Show</th>
        </tr>
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->email_verified_at}}</td>
            <td>{{$user->created_at}}</td>
            <td>{{$user->updated_at}}</td>
        </tr>
    </table>
    <table>
        <caption>Biudžetai</caption>
        <tr>
            <th>ID</th>
            <th>Name</th>
        </tr>
        @foreach ($user->budgets as $budget)
        <tr>
            <td>{{$budget->pivot->budget_id}}</td>
            <td>{{$budget->pivot->name}}</td>
        </tr>
        @endforeach
    </table>



</body>
</html>