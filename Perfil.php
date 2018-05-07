<!DOCTYPE html>
 <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Comic City</title>
   <link href="Inicio.css" rel="stylesheet">
   <script src="formsandstuff.js" type="text/javascript"></script>
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
        <a class="navbar-brand"><img src="Imagenes/Logo-Mobile.jpg"  class="img-responsive" alt="Comic City"></a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Inicio</a></li>
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Categorias <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Adventure</a></li>
            <li><a href="#">Drama</a></li>
            <li><a href="#">Fantasy</a></li>
            <li><a href="#">Noir</a></li>
            <li><a href="#">Romance</a></li>
            <li><a href="#">Sci-Fi</a></li>
            <li><a href="#">Superheros</a></li>
            <li><a href="#">Terror</a></li>
          </ul>
        </li>
        <li><a href="#">New</a></li>
      </ul>
       <form class="navbar-form navbar-left" action="/action_page.php">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Search" name="search">
      </div>
     
      <button type="submit" class="btn btn-default"> <span class="glyphicon glyphicon-search"></span></button>
    </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> User</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-log-out"></span> Log out</a></li>
      </ul>
    </div>
    </div>
  </nav>

  <div class="container-fluid">
    <div class="row content">
      <div class="col-sm-2 sidenav">
        <img src="Imagenes/User.jpg" class="img-responsive" alt="Profile">
        <h2>User</h2>
        <p>Username</p>
        <hr>
        <h2>Joined</h2>
        <p>Date</p>
        <hr>
        <h2>Reviews</h2>
        <p>Reviews Number</p>
        <br>
        <button type="button" class="btn btn-default"> <span class="glyphicon glyphicon-ok-sign"></span></button>
        <button type="button" class="btn btn-default" id="showForm">Edit</button><br>

            <form id="form1">
              <b>Username:</b> <input type="text" name="Username">
                <br><br>
              <b>Profile Picture:</b><input type="file" name="ProfilePic">
                <br><br>
              <button type="button" class="btn btn-default" id="submit">Submit</button>
              </form>

      </div>

      <div class="col-sm-10 resenias">
        <h2>Reviews</h2>
        <hr>
        <br>
        <div class="row">
          <div class="col-sm-2 reviews">
            <a href=""><img src="Imagenes/Book.jpg" class="img-responsive" alt="Profile"></a>
            <p>Descripcion mini de la review/resumen de review </p>
            <span class="glyphicon glyphicon-star"></span>
            <span class="glyphicon glyphicon-star"></span>
            <span class="glyphicon glyphicon-star"></span>
            <span class="glyphicon glyphicon-star"></span>
            <span class="glyphicon glyphicon-star-empty"></span>

          </div>
          <div class="col-sm-2 reviews">
            <a href=""><img src="Imagenes/Book.jpg" class="img-responsive" alt="Profile"></a>
            <p>Descripcion mini de la review/resumen de review </p>
            <span class="glyphicon glyphicon-star"></span>
            <span class="glyphicon glyphicon-star"></span>
            <span class="glyphicon glyphicon-star"></span>
            <span class="glyphicon glyphicon-star-empty"></span>
            <span class="glyphicon glyphicon-star-empty"></span>
          </div>
        </div>
      </div>
    </div>
  </div>




  </body>
 </html>