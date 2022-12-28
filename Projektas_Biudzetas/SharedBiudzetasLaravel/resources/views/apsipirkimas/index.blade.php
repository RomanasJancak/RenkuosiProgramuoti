<table class="table table-striped caption-top">
        <caption style="text-align:center">Apsipirkimai</caption>
        <tr>
            <th>ID</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Shop</th>
            <th>Suma</th>
            <th>Shop time</th>
            <th>Budget</th>
            <th colspan="3">Actions<th>
        </tr>
        @foreach ($apsipirkimai as $apsipirkimas)
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
            <td colspan="4" style="text-align : center">Add Apsipirkimas</td>
        </tr>
    </table>