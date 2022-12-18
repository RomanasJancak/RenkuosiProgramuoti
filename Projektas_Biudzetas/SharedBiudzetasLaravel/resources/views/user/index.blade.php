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
@foreach ($users as $user)
  <tr>
    <td>{{$user->id}}</td>
    <td>{{$user->name}}</td>
    <td>{{$user->email}}</td>
    <td>{{$user->email_verified_at}}</td>
    <td>{{$user->created_at}}</td>
    <td>{{$user->updated_at}}</td>
    <td><a href="{{route('user.show',$user)}}">More...</a></td>
  </tr>
@endforeach
</table>