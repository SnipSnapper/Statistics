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


  <input type="checkbox"  name="checkboxID" value="Yes" checked>
   room iD:
  <br>
  <input type="text" name="IDValue" value="">
  <br><br>

   <input type="checkbox"  name="checkboxPeople" value="Yes" checked>
   amount of people:
  <br>
  <input type="text" name="amountOfPeople" value="">
  <br><br>
  <input type="submit" value="Submit">
</form> 
</body>
</html>