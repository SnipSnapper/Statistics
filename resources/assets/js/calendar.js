 
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