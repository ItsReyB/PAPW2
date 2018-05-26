<?php 
	if(isset($_SESSION)){
	 	echo "<div style= 'color:green'>";
        echo session_id();
        echo $_SESSION['user'];
        echo "</div>";
	}else{
		session_start();
	} 	

	if(isset($_SESSION['userID'])){
        //echo "<div style= 'color:red'> Hay session </div>";
        header("location: /Inicio");
        exit();
    }else{
        echo "<div style= 'color:red'> NO Hay session ";
        echo session_id();
        echo "</div>";
    }
?>

<!DOCTYPE html>
 <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">   	
    <link href="/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    <title>Comic City</title>
    <link href="{!! asset('css/Style.css')!!}" rel="stylesheet" type="text/css">
  </head>
  <body>
  	
    <div class="container-fluid">
    	<div class="row">
    		<div class="col-md-4 col-md-offset-4">

    		<div class="signin">
		    	<h3>Sign In</h3>
			  		<form action="/Inicio" method="POST">
			  			{{ csrf_field() }}
					    <div class="form-group">
					      <label for="email">Email:</label>
					      <input type="email" class="form-control input-sm " id="email" placeholder="Enter email" name="email" required="required">
					    </div>					 
					    <div class="form-group">
					      <label for="pass">Password:</label>
					      <input type="password" class="form-control input-sm" id="pass" placeholder="Enter password" name="pass" required="required">
					    </div>
					   
				    	<button type="submit" class="btn btn-default a">Go!</button>
				    					    	
				    	@if(isset($name))
				    		@if(!$name)
						    	<div class="alert alert-danger alert-dismissible">
		    					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		    					<strong>Error!</strong>Wrong username
		  						</div>
							@endif
				    	@endif
				    	@if(isset($password))
				    		@if(!$password)
						    	<div class="alert alert-danger alert-dismissible">
		    					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		    					<strong>Error!</strong>Wrong password
		  						</div>
	  						@endif
				    	@endif
					</form>
			</div>
		
			<br>
		
			<div class="signup">
				<h3>Sign Up</h3>
			  		<form action="/Profile" method="POST">
			  			{{ csrf_field() }}
			  			<div class="form-group">
					      <label for="user">Username:</label>
					      <input type="text" class="form-control input-sm" id="user" placeholder="Enter user" name="user" required="required">
					    </div>
					    <div class="form-group">
					      <label for="email">Email:</label>
					      <input type="email" class="form-control input-sm" id="email" placeholder="Enter email" name="email" required="required">
					    </div>
					    <div class="form-group">
					      <label for="pass">Password:</label>
					      <input type="password" class="form-control input-sm" id="pass" placeholder="Enter password" name="pass" required="required">
					    </div>
					   
				    	<button type="submit" class="btn btn-default a ">Join!</button>
				  </form>
			</div>

			</div>
		</div>
		
    </div>



      <script src="bootstrap-3.3.7-dist/js/jquery.min.js"></script>
      <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
  </body>
 </html>