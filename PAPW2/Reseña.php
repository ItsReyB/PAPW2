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


            <form id="form2">
              
                <div class="row sidenav">
                  <div class="col-sm-2 resultados">
                     <img src="Imagenes/Book.jpg" class="img-responsive" alt="Profile">
                     <label for="ComicPic">Comic Picture:</label>
                     <input type="file" name="ComicPic" id="ComicPic">
                     <br>
                  </div>
                  <div class="col-sm-8">
                      <div class="row">
                        <div class="col-sm-12">
                          <label for="Title">Title:</label>
                          <input type="text" name="Title" id="Title">
                        </div>
                     </div>
                     <hr>
                     <div class="row">
                        <div class="col-sm-4">
                          <label for="PublishDate">Publish Date:</label>
                          <input type="date" name="PublishDate" id="PublishDate">
                          
                        </div>

                        <div class="col-sm-4">
                          <button type="button" class="btn btn-default buttoncol" id="editarReseña">Editar</button>
                          
                        </div>
                        
                        <div class="col-sm-4">
                          <label for="Issue">Issue:</label>
                          <input type="text" name="Issue" id="Issue">
                        </div>
                     </div>
                     <hr>
                     <div class="row">
                      <div class="col-sm-12 ">
                       <label for="sinopsis">Sinopsis:</label>
                       <textarea class="form-control" rows="5" id="sinopsis" placeholder="Write sinopsis"></textarea>
                       <br>
                      </div>
                     </div>
                  </div>
                  <div class="col-sm-2">
                      <div class="row">
                        <div class="col-sm-12">
                          <label for="Editorial">Editorial:</label>
                          <input type="text" name="Editorial" id="Editorial">
                        </div>
                      </div>
                      <br>
                      <div class="row">
                        <div class="col-sm-12">
                          <label for="Autor">Autor:</label>
                          <input type="text" name="Autor" id="Autor">
                        </div>
                      </div>
                      <br>
                      <div class="row">
                        <div class="col-sm-12">
                          <label for="Artist">Artist:</label>
                          <input type="text" name="Artist" id="Artist">
                        </div>
                      </div>
                      <br>
                      <div class="row">
                        <div class="col-sm-12">
                          <label for="genre">Genre:</label>
                          <select class="form-control" id="genre">
                            <option>Action</option>
                            <option>Adventure</option>
                            <option>Drama</option>
                            <option>Fantasy</option>
                            <option>Noir</option>
                            <option>Romance</option>
                            <option>Sci-Fi</option>
                            <option>Superheros</option>
                            <option>Terror</option>
                          </select>
                        </div>
                      </div>
                      <br>
                      <div class="row">
                        <div class="col-sm-12">
                          <label for="numPages">Pages:</label>
                          <input type="text" name="numPages" id="numPages">
                        </div>
                      </div>
                  </div>
                </div>
                <div class="row reseña">
                  <div class="col-sm-12">
                    <br>
                    <label for="stars">Estrellas:</label>
                      <select class="form-control" id="stars">
                        <option >
                          <p>0 Stars</p>
                        </option>
                        <option>
                          <p>1 Star</p>
                        </option>
                        <option>
                          <p>2 Stars</p>
                        </option>
                        <option>
                          <p>3 Stars</p>
                        </option>
                        <option>
                         <p>4 Stars</p>
                        </option>
                        <option>
                        <p>5 Stars</p>
                        </option>
                      </select>
                    
                    <hr>
                    <label for="review">Review:</label>
                    <textarea class="form-control" rows="5" id="review" placeholder="Write review"></textarea>
                    <br>
                    <button type="button" class="btn btn-default" id="submit">Submit</button>
                  </div>
                </div>
              
            </form>

<form id="form3">
    <div class="row sidenav">
      <div class="col-sm-2 resultados">
         <img src="Imagenes/Book.jpg" class="img-responsive" alt="Profile">
      </div>
      <div class="col-sm-8">
          <div class="row">
            <div class="col-sm-12">
              <a href=""><h3>Titulo</h3></a>
            </div>
         </div>
         <hr>
         <div class="row">
            <div class="col-sm-4">
              <p>Fecha de publicacion</p>
            </div>
            <div class="col-sm-4">
              <button type="button" class="btn btn-default buttoncol" id="editarReseña">Editar</button>
            </div>
            <div class="col-sm-4">
              <p>Numero</p>
            </div>
         </div>
         <hr>
         <div class="row">
          <div class="col-sm-12 ">
          <p>Sinopsis</p>
          </div>
         </div>
      </div>
      <div class="col-sm-2">
          <div class="row">
            <div class="col-sm-12">
              <p>Editorial</p>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <p>Escritor(es)</p>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <p>Artista(s)</p>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <p>Genero</p>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <p>#Pags</p>
            </div>
          </div>
      </div>
    </div>
    <div class="row reseña">
      <div class="col-sm-12">
        <br>
        <span class="glyphicon glyphicon-star"></span>
        <span class="glyphicon glyphicon-star"></span>
        <span class="glyphicon glyphicon-star"></span>
        <span class="glyphicon glyphicon-star"></span>
        <span class="glyphicon glyphicon-star-empty"></span>
        <hr>
        <p>Reseña</p>
      </div>
    </div>
  </form>
      <div class="row otro">
        <div class="col-sm-10 ">

          <div class="row coment">
            <div class="col-sm-12">
              <a href="#">Username</a>
              <p>Comentario</p>
            </div>
          </div>
          <div class="row comentario">
            <div class="col-sm-12">
              <a href="#">Username</a>
              <p>Comentario</p>
            </div>
          </div>
          <div class="row coment">
            <div class="col-sm-12">
              <a href="#">Username</a>
              <p>Comentario</p>
            </div>
          </div>
          <div class="row comentario">
            <div class="col-sm-12">
              <a href="#">Username</a>
              <p>Comentario</p>
            </div>
          </div>
          <div class="row coment">
            <div class="col-sm-12 comenta">
              
              <form class="form-horizontal" action="">
                 <input type="text" class="form-control" id="comentario" placeholder="Leave a coment" name="comentario">
                 <br>
                 <button type="submit" class="btn btn-default">Submit</button>
              </form>

            </div>
          </div>

        </div>
        <div class="col-sm-2 otros">
          <h3>Related</h3>
          <hr>
           <a href=""><img src="Imagenes/Book.jpg" class="img-responsive" alt="Profile"></a>
              <p>Descripcion mini de la review/resumen de review </p>
              <span class="glyphicon glyphicon-star"></span>
              <span class="glyphicon glyphicon-star"></span>
              <span class="glyphicon glyphicon-star"></span>
              <span class="glyphicon glyphicon-star"></span>
              <span class="glyphicon glyphicon-star-empty"></span>
        </div>
    </div>
  </div>
 



      
  </body>
 </html>