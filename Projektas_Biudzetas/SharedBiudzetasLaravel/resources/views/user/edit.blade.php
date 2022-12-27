<div>
        <h6><a href="{{route('user.show',[$user])}}">Back</a></h6>
        
    </div> 
<form method="POST" action="{{route('user.update',[$user])}}">
       Name <input type="text" name="user_name" value="{{$user->name}}">
       Email: <input type="text" name="user_email" value="{{$user->email}}">
</select>
       @csrf
       <button type="submit">EDIT</button>
</form>