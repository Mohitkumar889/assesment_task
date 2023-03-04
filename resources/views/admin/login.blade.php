<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
  	<div class="container ">
  		<div class="row" style="padding: 5% 25% 0% 25%;">
	    	<h1>Login</h1>
		    <form id="login_form">
			  <div class="mb-3">
			    <label for="exampleInputUsername" class="form-label">User Name</label>
			    <input type="text" class="form-control username" id="exampleInputUsername" name="username" aria-describedby="">
			    <div class="text-danger" id="message"></div>
			  </div>
			  <div class="mb-3">
			    <label for="exampleInputPassword1" class="form-label">Password</label>
			    <input type="password" class="form-control password" name="password" id="exampleInputPassword1">
			    <div class="text-danger" id="message1"></div>
			    <div class="text-danger" id="message2"></div>
			  </div>
			  
			  <button type="submit" id="exprt_submt" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="http://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
    	$("#login_form").submit(function(e){
	        $('#message').html("");
	        $('#message1').html("");
	        $('#message2').html("");
	        $("#exprt_submt").attr("disabled", true);
	          $.ajax({
	            url: "{{route('admin-login')}}", 
	            type: "post",
	            headers: { 'X-CSRF-Token' : $('meta[name=csrf-token]').attr('content') },
	            data: new FormData(this),
	            processData: false,
	            contentType: false,
	            success: function(data){
	                if(data.username && data.password)
	                {
	                  $(".username").focus();
	                  $("#exprt_submt").attr("disabled", false);
	                }else{
	                  $(".password").focus();
	                  $("#exprt_submt").attr("disabled", false);
	                }
	                $('#message').html(data.username);
	                $('#message1').html(data.password);
	                if(data==1)
	                {
	                  $("#exprt_submt").attr("disabled", true);
	                  window.location.href= "{{route('product-list')}}";
	                }else{
	                  $("#message2").html(data);
	                  $("#exprt_submt").attr("disabled", false);
	                }
	            }
	          });
	          e.preventDefault();
	      });
    </script>
  </body>
</html>