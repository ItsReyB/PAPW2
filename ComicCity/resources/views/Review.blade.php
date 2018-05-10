@extends('template.template')
@section ('title')
Review
@endsection
@section('content')

  <div class="container-fluid">

    <!--Editar/Hacer nueva reseña-->
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
                        <!--Boton para ver/ocultar seccion de nuevo/edicion-->
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
                        <option><p>0 Stars</p></option>
                        <option><p>1 Star</p></option>
                        <option><p>2 Stars</p></option>
                        <option><p>3 Stars</p></option>
                        <option><p>4 Stars</p></option>
                        <option><p>5 Stars</p></option>
                      </select>                    
                    <hr>
                    <label for="review">Review:</label>
                    <textarea class="form-control" rows="5" id="review" placeholder="Write review"></textarea>
                    <br>
                    <button type="button" class="btn btn-default" id="submit">Submit</button>
                  </div>
                </div>              
            </form>
<!--Reseña-->
<form id="form3">
    <div class="row sidenav">
      <div class="col-sm-2 resultados">
         <img src="Imagenes/Book.jpg" class="img-responsive" alt="Profile">
      </div>
      <div class="col-sm-8">
          <div class="row">
            <div class="col-sm-12">
              <a href=""><h3>{{$reviewinfo['title']}}</h3></a>
            </div>
         </div>
         <hr>
         <div class="row">
            <div class="col-sm-4">
              <p>{{$reviewinfo['publishdate']}}</p>
            </div>
            <!--Boton para ver/ocultar seccion de nuevo/edicion-->
            <div class="col-sm-4">
              <button type="button" class="btn btn-default buttoncol" id="editarReseña">Editar</button>
            </div>
            <div class="col-sm-4">
              <p>{{$reviewinfo['issue']}}</p>
            </div>
         </div>
         <hr>
         <div class="row">
          <div class="col-sm-12 ">
          <p>{{$reviewinfo['sinopsis']}}</p>
          </div>
         </div>
      </div>
      <div class="col-sm-2">
          <div class="row">
            <div class="col-sm-12">
              <p>{{$reviewinfo['editorial']}}</p>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <p>{{$reviewinfo['writer']}}</p>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <p>{{$reviewinfo['artist']}}</p>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <p>{{$reviewinfo['genre']}}</p>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <p>{{$reviewinfo['pages']}}</p>
            </div>
          </div>
      </div>
    </div>
    <div class="row reseña">
      <div class="col-sm-12">
        <br>
        @if($reviewinfo['stars']=='3')
        <span class="glyphicon glyphicon-star"></span>
        <span class="glyphicon glyphicon-star"></span>
        <span class="glyphicon glyphicon-star"></span>
        <span class="glyphicon glyphicon-star-empty"></span>
        <span class="glyphicon glyphicon-star-empty"></span>
        @endif
        <hr>
        <p>{{$reviewinfo['review']}}</p>
      </div>
    </div>
  </form>
<!--comentarios-->
      <div class="row otro">
        <div class="col-sm-10 ">
          @foreach($comments as $comment)
          <div class="row comentario">
            <div class="col-sm-12">
              <a href="#">{{$comment['user']}}</a>
              <p>{{$comment['comment']}}</p>
            </div>
          </div>
          @endforeach
          <div class="row coment">
            <div class="col-sm-12 comenta">
              
              <form class="form-horizontal" action="">
                 <input type="text" class="form-control" id="comentario" placeholder="Leave a coment" name="comentario">
                 <br>
                 <button type="submit" class="btn btn-default">Submit</button>
              </form>

            </div>
          </div>
<!--Relacionados-->
        </div>
        <div class="col-sm-2 otros">
          <h3>Related</h3>
          <hr>
          @foreach($reviews as $review)
          @if($review['genero']=='Terror')
           <a href=""><img src="Imagenes/Book.jpg" class="img-responsive" alt="Profile"></a>
              <p>{{$review['review']}} </p>
              <a href="">{{$review['author']}}</a> <br>

                 @if($review['stars']==0)               
                  <span class="glyphicon glyphicon-star-empty"></span>
                  <span class="glyphicon glyphicon-star-empty"></span>
                  <span class="glyphicon glyphicon-star-empty"></span>
                  <span class="glyphicon glyphicon-star-empty"></span>
                  <span class="glyphicon glyphicon-star-empty"></span>               
                  @elseif($review['stars']==1)                
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star-empty"></span>
                  <span class="glyphicon glyphicon-star-empty"></span>
                  <span class="glyphicon glyphicon-star-empty"></span>
                  <span class="glyphicon glyphicon-star-empty"></span>                 
                  @elseif($review['stars']==2)                 
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star-empty"></span>
                  <span class="glyphicon glyphicon-star-empty"></span>
                  <span class="glyphicon glyphicon-star-empty"></span>                 
                  @elseif($review['stars']==3)                 
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star-empty"></span>
                  <span class="glyphicon glyphicon-star-empty"></span>                  
                  @elseif($review['stars']==4)                 
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star-empty"></span>                  
                  @elseif($review['stars']==5)                 
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star"></span>          
                  @endif
          @endif
          @endforeach
        </div>
    </div>
  </div> 
@endsection


      
