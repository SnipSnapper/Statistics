<!DOCTYPE html>
<html>
<head>
    <title>
        Statistics
    </title>
</head>
<body>

<form action="{{ url('/sent') }}" method="post" >
	{{ csrf_field() }}


</form> 

<select name="IDValue">
  @foreach ($rooms as $room)
        <option name="IDValue" value="{{ $room->id }}">{{ $room->name }}</option>
  @endforeach
</select>


</body>
</html>