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
      <img src="/Imagenes/Book.jpg" class="img-responsive" alt="Profile">
      <label for="ComicPic">Comic Picture:</label>
      <input type="file" name="ComicPic" id="ComicPic" required="required">
      <br>
    </div>
    <div class="col-sm-8">
      <div class="row">
        <div class="col-sm-12">
          <label for="Title">Title:</label>
          <input type="text" name="Title" id="Title" required="required">
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-sm-4">
          <label for="PublishDate">Publish Date:</label>
          <input type="date" name="PublishDate" id="PublishDate" required="required">
        </div>
        <!--Boton para ver/ocultar seccion de nuevo/edicion-->
        <div class="col-sm-4">
          <button type="button" class="btn btn-default buttoncol" id="editarReseña">Editar</button>                          
        </div>
        <div class="col-sm-4">
          <label for="Issue">Issue:</label>
          <input type="text" name="Issue" id="Issue" required="required">
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-sm-12 ">
          <label for="sinopsis">Sinopsis:</label>
          <textarea class="form-control" rows="5" id="sinopsis" placeholder="Write sinopsis" required="required"></textarea>
          <br>
        </div>
      </div>
    </div>
    <div class="col-sm-2">
      <div class="row">
        <div class="col-sm-12">
          <label for="Editorial">Editorial:</label>
          <input type="text" name="Editorial" id="Editorial" required="required">
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-sm-12">
          <label for="Autor">Autor:</label>
          <input type="text" name="Autor" id="Autor" required="required">
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-sm-12">
          <label for="Artist">Artist:</label>
          <input type="text" name="Artist" id="Artist" required="required">
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-sm-12">
          <label for="genre">Genre:</label>
          <select class="form-control" id="genre" required="required">
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
          <input type="text" name="numPages" id="numPages" required="required">
        </div>
      </div>
    </div>
  </div>
  <div class="row reseña">
    <div class="col-sm-12">
      <br>
      <label for="stars">Estrellas:</label>
      <select class="form-control" id="stars" required="required">
        <option><p>0 Stars</p></option>
        <option><p>1 Star</p></option>
        <option><p>2 Stars</p></option>
        <option><p>3 Stars</p></option>
        <option><p>4 Stars</p></option>
        <option><p>5 Stars</p></option>
      </select>                    
      <hr>
      <label for="review">Review:</label>
      <textarea class="form-control" rows="5" id="review" placeholder="Write review" required="required"></textarea>
      <br>
      <button type="button" class="btn btn-default" id="submit">Submit</button>
    </div>
  </div>              
  </form>
  <!--Reseña-->
  <form id="form3">
    <div class="row sidenav">
      <div class="col-sm-2 resultados">
         <img src="/Imagenes/Book.jpg" class="img-responsive" alt="Profile">
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
        @for ($i=0; $i < $reviewinfo['stars']; $i++)                      
          <span class="glyphicon glyphicon-star"></span>
        @endfor
        @for ($i=0; $i <5-$reviewinfo['stars']; $i++)                      
          <span class="glyphicon glyphicon-star-empty"></span>
        @endfor
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
            <input type="text" class="form-control" id="comentario" placeholder="Leave a coment" name="comentario" required="required">
            <br>
            <button type="submit" class="btn btn-default">Submit</button>
          </form>
        </div>
      </div>      
    </div>
    <!--Relacionados-->
    <div class="col-sm-2 otros">
      <h3>Related</h3>
      <hr>
      @foreach($reviews as $review)
        @if($review['genero']=='Terror')
          <a href=""><img src="/Imagenes/Book.jpg" class="img-responsive" alt="Profile"></a>
          <p>{{$review['review']}} </p>
          <a href="">{{$review['author']}}</a> <br>
            @for ($i=0; $i <$review['stars']; $i++)                      
              <span class="glyphicon glyphicon-star"></span>
            @endfor
            @for ($i=0; $i <5-$review['stars']; $i++)                      
              <span class="glyphicon glyphicon-star-empty"></span>
            @endfor
        @endif
      @endforeach
      </div>
    </div>
  </div> 
@endsection