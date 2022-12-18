<table>
        <caption>Biudžetai</caption>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Created</th>
            <th>Updated</th>
        </tr>
        @foreach ($budgets as $budget)
        <tr>
            <td>{{$budget->id}}</td>
            <td>{{$budget->name}}</td>
            <td>{{$budget->created_at}}</td>
            <td>{{$budget->updated_at}}</td>
        </tr>
        @endforeach
        <tr>
            <td colspan="4" style="text-align : center">Add Budget</td>
        </tr>
    </table>