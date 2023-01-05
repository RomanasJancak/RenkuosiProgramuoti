<table class="table table-striped caption-top" >
    <thead>
    <tr>
        <td colspan="4" style="text-align : center">
            <!-- <a href="{{route('apsipirkimas.create',[$budget,$user])}}">Add apsipirkimas</a>             -->
        </td>
    </tr>
        <caption style="text-align:center">Pirkiniai</caption>
        <tr>
            <th>ID</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Deposit</th>
            <th>Sum</th>
            <th>PrekePaslauga_id</th>
            <th colspan="3">Actions<th>
        </tr>
    </thead>
    <form id="naujas_pirkinys">
                @csrf
                <input id="search" type="text" name="search" class="form-control" placeholder="search">
                <button id="seachBtn" class="btn btn-primary" type="Submit">Search</button>
            </form>
    <tbody id='pirkiniu_sarasas'>
        @foreach ($pirkiniai as $pirkinys)
        <tr>
            <td>{{$pirkinys->id}}</td>
            <td>{{$pirkinys->created_at}}</td>
            <td>{{$pirkinys->updated_at}}</td>
            <td>{{$pirkinys->price}}</td>
            <td>{{$pirkinys->quantity}}</td>
            <td>{{$pirkinys->deposit}}</td>
            <td>{{$pirkinys->sum}}</td>
            <td>{{$pirkinys->prekepaslauga_id}}</td>
            <!-- <td><a href="{{route('apsipirkimas.show',[$apsipirkimas,$budget,$user])}}">More...</a></td> -->
        </tr>
        @endforeach
    </tbody>
</table>
<button id='bluebutton'>blue</button>
<button id='redbutton'>red</button>