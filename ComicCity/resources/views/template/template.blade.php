<?php 
	if(isset($_SESSION)){
		//echo session_id();
	}else{
		session_start();
		//echo session_id();
	}
	if(isset($_SESSION['userID'])){
		/*
          echo "<div style= 'color:red'> Hay usuario ";
          echo $_SESSION['userID'];
          echo "</div>";
          */
      }else{          
          header("location: /Login");
          exit();
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
		<title>@yield('title')-Comic City</title>
		<link href="{!! asset('css/Inicio.css')!!}" rel="stylesheet" type="text/css">
		<script src="{!! asset('js/formsandstuff.js')!!}" type="text/javascript"></script>
	</head>
	<body>   
		<nav class="navbar navbar-inverse ">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>                   
					</button>
					<a class="navbar-brand"><img src="/Imagenes/Logo-Mobile.jpg"  class="img-responsive" alt="Comic City"></a>
				</div>
				<div class="collapse navbar-collapse" id="myNavbar">
					<ul class="nav navbar-nav">
						<li class="active"><a href="/Inicio">Inicio</a></li>
						<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Categorias <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="/Search/Adventure" content="{{ csrf_token() }}">Action</a></li>
							
						</ul>
						</li>
							@if($_SESSION['isAdmin']=='false')
								@if(isset($new))
									@if(!$new)
										<li><a href="/Review/New">New</a></li>
									@endif
								@else
									<li><a href="Review/New">New</a></li>
								@endif
							@endif		    
					</ul>
					<form class="navbar-form navbar-left" action="/Search">
						<div class="form-group">
						<input type="text" class="form-control" placeholder="Search" name="search">
						</div>
						<button type="submit" class="btn btn-default"> <span class="glyphicon glyphicon-search"></span></button>
					</form>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="/Profile/{{$_SESSION['userID']}}"><span class="glyphicon glyphicon-user"></span> {{$_SESSION['user']}}</a></li>
						<li><a href="/LogOut"><span class="glyphicon glyphicon-log-out"></span> Log out</a></li>
					</ul>
				</div>
			</div>
		</nav>
	@yield('content')
	</body>
</html>