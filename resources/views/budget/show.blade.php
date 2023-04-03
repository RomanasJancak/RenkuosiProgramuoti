@extends('layouts.app')
@section('content')
<?php $auth_useris = ($budget->users->where('id',auth()->user()->id)->first());
      //$auth_useris_role = App\Models\Role::find($auth_useris->pivot->role_id);
      $auth_useris_role = App\Models\Role::find($budget->users->where('id',auth()->user()->id)->first()->pivot->role_id);
?>
<div class="container">
{{Breadcrumbs::render()}}
    <div>
    <h6><a href="{{route('user.show',[$user])}}">Back</a></h6>        
    </div>    
    <table class="table table-striped caption-top">
        <caption style="text-align:center"><h1>Biudžetas</h1></caption>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Created</th>
            <th>Updated</th>
            <th>User count</th>
            <th colspan="2">Actions</th>
        </tr>
        <tr>
            <td>{{$budget->id}}</td>
            <td>{{$budget->name}}</td>
            <td>{{$budget->created_at}}</td>
            <td>{{$budget->updated_at}}</td>
            <td>{{$budget->users->count()}}</td>
            {{--dd(auth()->user()->permissions)--}}


            @if(($auth_useris_role->id == '4')||($auth_useris_role->id == '5'))
            <td><a href="{{route('budget.edit',[$budget,$user])}}">Edit</a></td>
            @endif
            @if($auth_useris_role->id == '4')
            <td><a href="{{route('budget.destroy',[$budget,$user])}}">Delete budget</a></td>
            @endif
        </tr>
    </table>
    <!--  -->
    @if($auth_useris->pivot->role_id != 6)
    <div>
      <h2 style="text-align:center">Send invitation</h2>
      <form method="POST" action="{{route('pakvietimas.store')}}">
        <label for="email">To whom:</label>
          <input  name="email" id="email" placeholder="email">
            <select name="role_id">
              @foreach(App\Models\Role::find($auth_useris->pivot->role_id)->childs as $child_role)
                <option value="{{$child_role->id}}">{{$child_role->name}}</option>
              @endforeach
            </select>
            <input type="text" hidden name="model_type_what"    value="{{get_class($budget)}}">
            <input type="text" hidden name="model_id_what"      value="{{$budget->id}}">
            <input type="text" hidden name="model_type_who"     value="{{get_class(auth()->user())}}">
            <input type="text" hidden name="model_id_who"       value="{{auth()->user()->id}}">
            @csrf
            <button type="submit">Send</button>
      </form>
    </div>
    @endif
    <!-- -->
    <table class="table table-striped caption-top">
        <caption style="text-align:center"><h2>Users</h2></caption>
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($budget->users as $useris)             
            <tr>
                <td>{{$useris->id}}</td>
                <td>{{$useris->name}}</td>
                <td>{{App\Models\Role::find($useris->pivot->role_id)->name}}</td>
                
                    @if($auth_useris_role->isRoleBelow(App\Models\Role::find($useris->pivot->role_id)))
                    <td>
                      <form method="POST" action="{{route('budget.update',[$budget,auth()->user()])}}">
                        <select name="change_user_role">
                          @foreach(App\Models\Role::find($auth_useris->pivot->role_id)->childs as $child_role)
                            <option value="{{$child_role->id}}">{{$child_role->name}}</option>
                          @endforeach
                        </select>
                        <input type="text" hidden name="change_user" value="{{$useris->id}}">
                         @csrf
                        <button type="submit">Confirm Edit</button>
                      </form>
                    </td>
                    <td>
                      <form method="POST" action="{{route('budget.update',[$budget,auth()->user()])}}">
                        <input type="text" hidden name="remove_user" value="{{$useris->id}}">
                         @csrf
                        <button type="submit">Remove</button>
                      </form>
                    </td>
                    @if($auth_useris_role->id == '4')
                    <td>
                      <form method="POST" action="{{route('budget.update',[$budget,auth()->user()])}}">
                        <input type="text" hidden name="make_owner" value="{{$useris->id}}">
                         @csrf
                        <button type="submit">Make owner</button>
                      </form>
                    </td>
                    @endif
                    @else
                      @if(($auth_useris_role->id != '4')&&($useris->id == $auth_useris->id))
                      <td colspan="3">
                      <form method="POST" action="{{route('budget.update',[$budget,auth()->user()])}}">
                        <input type="text" hidden name="remove_user" value="{{auth()->user()->id}}">
                         @csrf
                        <button type="submit">Remove</button>
                      </form>
                      </td>
                      @else
                      <td colspan="3"></td>
                      @endif  
                    @endif
                
            </tr>
            @endforeach
        </tbody>
    </table>
    <!--  -->
    @include('apsipirkimas.index', ['apsipirkimai' => $budget->apsipirkimai])
</div>
@endsection