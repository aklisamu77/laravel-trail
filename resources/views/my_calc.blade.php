<h2>Add Form</h2>
<hr>
<form action="/add" method="post">
    @csrf
    <input name="x" type='number'>
    <input name="y" type='number'>
    <input name="z" type='number'>
    <input value="submit" type='button' onclick = "getMessage()" >
    <hr>
    Sum is : <span class="rslt">{{$sum??"......."}}</span>
    
</form>
    <script src="http://code.jquery.com/jquery-3.3.1.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous">
    </script>
    <script>
        
        function getMessage() {
        jQuery('.rslt').text('.......');
            $.ajaxSetup({
               headers: {
                   'X-CSRF-TOKEN': $('input[name="_token"]').val()
               }
            });
            jQuery.ajax({
               url: '/add',
               method: 'post',
               data: {
                  x: jQuery('input[name=x]').val(),
                  y: jQuery('input[name=y]').val(),
                  z: jQuery('input[name=z]').val()
               },
               success: function(result){
                  jQuery('.rslt').text(result);
               }
            });
                  
            return false ;
         }
    </script>