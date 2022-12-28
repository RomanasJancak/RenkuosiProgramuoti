<table class="table table-striped caption-top">
    <caption>Biudžetai</caption>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Created</th>
        <th>Updated</th>
        <th>User count</th>
        <th colspan="3">Actions<th>
    </tr>
    @foreach ($budgets as $budget)
    <tr>
        <td>{{$budget->id}}</td>
        <td>{{$budget->name}}</td>
        <td>{{$budget->created_at}}</td>
        <td>{{$budget->updated_at}}</td>
        <td>{{$budget->users->count()}}</td>
        <td><a href="{{route('budget.show',[$budget,$user])}}">More...</a></td>
    </tr>
    @endforeach
    <tr>
        <td colspan="4" style="text-align : center">
            <a href="{{route('budget.create',$user)}}">Add Budget</a>            
        </td>
    </tr>
</table>