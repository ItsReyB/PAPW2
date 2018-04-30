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
            <li><a href="#">Categoria 1</a></li>
            <li><a href="#">Categoria 2</a></li>
            <li><a href="#">Categoria 3</a></li>
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
  <div class="panel panel-default panel-transparent">
   
    <div class="panel-body filter">
      <div class="row filtertitle">
        <h3>Filters:</h3>
      </div>
      <div class="row">
        <form action="">
        <div class="col-sm-3">
          <h4>Date from:</h4>
            <input type="date" name="datefrom">
        </div>
         <div class="col-sm-3">
          <h4>Date to:</h4>
            <input type="date" name="dateto">
        </div>
        <div class="col-sm-2">
          <h4>By:</h4>
            <input type="radio" name="busquedapor" value="titulo">Title
            <br>
            <input type="radio" name="busquedapor" value="autor">Author
        </div>
        <div class="col-sm-4">
          <br>
          <br>
          <input type="submit" name="busquedafilter" value="Buscar" class="filtro">
        </div>
      </form>
      </div>
    </div>


  </div>
</div>

 <div class="container-fluid">
  <div class="panel panel-default panel-transparent">
   
    <div class="panel-body results">
      <div class="row resulttitle">
        <h3>Results:</h3>
      </div>
      <br>
     <div class="row">
          <div class="col-sm-2 resultados">
            <img src="Imagenes/Book.jpg" class="img-responsive" alt="Profile">
                <p>Descripcion mini de la review/resumen de review </p>
                <a href="">Usuario</a> <br>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star-empty"></span>
              </div>
              <div class="col-sm-2 resultados">
            <img src="Imagenes/Book.jpg" class="img-responsive" alt="Profile">
                <p>Descripcion mini de la review/resumen de review </p>
                <a href="">Usuario</a><br>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star-empty"></span>
              </div>
              <div class="col-sm-2 resultados">
            <img src="Imagenes/Book.jpg" class="img-responsive" alt="Profile">
                <p>Descripcion mini de la review/resumen de review </p>
                <a href="">Usuario</a><br>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star-empty"></span>
              </div>
              <div class="col-sm-2 resultados">
            <img src="Imagenes/Book.jpg" class="img-responsive" alt="Profile">
                <p>Descripcion mini de la review/resumen de review </p>
                <a href="">Usuario</a><br>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star-empty"></span>
              </div>
              <div class="col-sm-2 resultados">
            <img src="Imagenes/Book.jpg" class="img-responsive" alt="Profile">
                <p>Descripcion mini de la review/resumen de review </p>
                <a href="">Usuario</a><br>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star-empty"></span>
              </div>
              <div class="col-sm-2 resultados">
            <img src="Imagenes/Book.jpg" class="img-responsive" alt="Profile">
                <p>Descripcion mini de la review/resumen de review </p>
                <a href="">Usuario</a><br>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star-empty"></span>
              </div>
          </div>
    </div>


  </div>
</div>



  





     
  </body>
 </html>