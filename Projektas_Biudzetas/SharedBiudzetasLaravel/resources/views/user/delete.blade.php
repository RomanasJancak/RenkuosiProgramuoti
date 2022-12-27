<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">   
    <title>Deletion of user :: {{$user->name}} account.</title>
</head>
<body>
    <h6><a href="{{route('user.index')}}">Back</a></h6>
  <form method="POST" action="{{route('user.destroy', [$user])}}">
   @csrf
   <button type="submit">DELETE</button>
  </form>
  <br>

</body>
</html>