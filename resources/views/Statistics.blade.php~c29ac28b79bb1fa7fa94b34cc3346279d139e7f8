<!DOCTYPE html>
<html>
<head>
    <title>
        Statistics
    </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=7" />
    <link href="calendar/calendar.css" rel="stylesheet" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
   <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
   <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>  
   <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css"> 

</head>
<body>

<form action="{{ url('/day') }}" method="post" name="form1">
	{{ csrf_field() }}

  <select name="IDValue">
    @foreach ($rooms as $room)
          <option name="IDValue" value="{{ $room->id }}">{{ $room->name }}</option>
    @endforeach
  </select>

  <div class="col-md-3">  
      <input type="text" name="date" id="date" class="form-control" placeholder="From Date" />  
  </div> 


  <input type="submit" value="Submit">
</form> 

</body>

<script>  
      $(document).ready(function(){  
           $.datepicker.setDefaults({  
                dateFormat: 'yy-mm-dd'   
           });  
           $(function(){  
                $("#date").datepicker();
           });  
           $('#filter').click(function(){  
                var date = $('#date').val();   
           });  
      });  
 </script>
</html>