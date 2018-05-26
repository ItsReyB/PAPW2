<?php
if(isset($_SESSION)){
  }else{
    session_start();
  }
?>
@extends('template.template')
@section ('title')
Review
@endsection
@section('content')
  <div class="container-fluid">
  <!--Delete Review-->
  @if(!$new)
    <form id="form4" style="display:none" align="right" action="/delReview" method="POST">
      {{ csrf_field() }}
      <input type="hidden" name="post_id" value={{$reviewinfo['id']}}>
      <button type="submit" class="btn btn-danger" id="delete">Delete</button>  
    </form>    
  @endif  
  <!--Editar/Hacer nueva reseña-->
  <form id="form2" action="/add" method="POST" enctype="multipart/form-data">     
    {{ csrf_field() }}        
    <div class="row sidenav">
      <div class="col-sm-2 resultados">
        @if( isset($reviewinfo['CoverImage']) )
          <img <?php echo 'src="data:image/jpeg;base64,'.($reviewinfo['CoverImage']).'"'; ?> class="img-responsive" alt="Profile">
        @else
          <img src="/Imagenes/user.jpg" class="img-responsive" alt="Profile">
        @endif
        <label for="ComicPic">Comic Picture:</label>
        <input type="file" name="ComicPic" id="ComicPic">
        <br>
      </div>
      <div class="col-sm-8">
        <div class="row">
          <div class="col-sm-12">
            <label for="Title">Title:</label>
            <input type="text" name="Title" id="Title" required="required" value={{$reviewinfo['ComicTitle']}}>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-4">
            <label for="PublishDate">Publish Date:</label>
            <input type="date" name="PublishDate" id="PublishDate" required="required" value={{$reviewinfo['publishdate']}}>
          </div>
          <!--Boton para ver/ocultar seccion de nuevo/edicion-->
          <div class="col-sm-4">          
            @if(!$new)
              <button type="button" class="btn btn-default buttoncol" id="editarReseña">Dejar de Editar</button>
            @endif
          </div>
          <div class="col-sm-4">
            <label for="Issue">Issue:</label>
            <input type="text" name="Issue" id="Issue" required="required" value={{$reviewinfo['ComicNum']}}>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-12 ">
            <label for="sinopsis">Sinopsis:</label>          
              <textarea class="form-control" rows="5" name="sinopsis" id="sinopsis" placeholder="Write sinopsis" required="required">{{$reviewinfo['sinopsis']}}</textarea>          
            <br>
          </div>
        </div>
      </div>
      <div class="col-sm-2">
        <div class="row">
          <div class="col-sm-12">
            <label for="Editorial">Editorial:</label>
            <input type="text" name="Editorial" id="Editorial" required="required" value={{$reviewinfo['ed']}}>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-sm-12">
            <label for="Autor">Autor:</label>
            <input type="text" name="Autor" id="Autor" required="required" value={{$reviewinfo['writer']}}>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-sm-12">
            <label for="Artist">Artist:</label>
            <input type="text" name="Artist" id="Artist" required="required" value={{$reviewinfo['artist']}}>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-sm-12">
            <label for="genre">Genre:</label>
            <select class="form-control" name="genre" id="genre" required="required">            
              @foreach ($generos as $genero)
                <option <?php if($reviewinfo['genero'] == $genero['genre']) {echo 'selected';} ?>> {{$genero['genre']}} </option>              
              @endforeach

            </select>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-sm-12">
            <label for="numPages">Pages:</label>
            <input type="text" name="numPages" id="numPages" required="required" value={{$reviewinfo['pages']}}>
          </div>
        </div>
      </div>
    </div>
    <div class="row reseña">
      <div class="col-sm-12">
        <br>
        <label for="stars" class="labelgreen">Estrellas:</label>
        <select class="form-control" name= "stars" id="stars" required="required">
          <option <?php if($reviewinfo['stars'] == 0) {echo 'selected';} ?>><p>0 Stars</p></option>
          <option <?php if($reviewinfo['stars'] == 1) {echo 'selected';} ?>><p>1 Stars</p></option>
          <option <?php if($reviewinfo['stars'] == 2) {echo 'selected';} ?>><p>2 Stars</p></option>
          <option <?php if($reviewinfo['stars'] == 3) {echo 'selected';} ?>><p>3 Stars</p></option>
          <option <?php if($reviewinfo['stars'] == 4) {echo 'selected';} ?>><p>4 Stars</p></option>
          <option <?php if($reviewinfo['stars'] == 5) {echo 'selected';} ?>><p>5 Stars</p></option>
        </select>                    
        <hr>
        <label for="review" class="labelgreen">Review:</label>      
        <textarea class="form-control" rows="5" name="review" id="review" placeholder="Write review" required="required">{{$reviewinfo['text']}}</textarea>
        <br>
        @if(!$new)
          <input type="text" name="pid" hidden="true" value={{$reviewinfo['id']}}>
        @endif
        <input type="text" name="user" hidden="true" value={{$_SESSION['userID']}}>
        <button type="submit" class="btn btn-default greenbutton" id="submit">Submit</button>
        
      </div>
    </div>              
  </form>
    <!--Reseña-->
    <form id="form3">
      <div class="row sidenav">
        <div class="col-sm-2 resultados">
          @if( isset($reviewinfo['CoverImage']) )
            <img <?php echo 'src="data:image/jpeg;base64,'.($reviewinfo['CoverImage']).'"'; ?> class="img-responsive" alt="Profile">
          @else
            <img src="/Imagenes/User.jpg" class="img-responsive" alt="Profile">
          @endif
        </div>
        <div class="col-sm-8">
          <div class="row">
            <div class="col-sm-12">
              <a href="/Search?search={{$reviewinfo['ComicTitle']}}"><h3>{{$reviewinfo['ComicTitle']}}</h3></a>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-4">
              <label>Publish Date:</label>
              <p>{{$reviewinfo['publishdate']}}</p>
            </div>
            <!--Boton para ver/ocultar seccion de nuevo/edicion-->
            <div class="col-sm-4">
              @if($reviewinfo['user_id'] == $_SESSION['userID'] || $new)
                <button type="button" class="btn btn-default buttoncol" id="editarReseña">Editar</button>
              @endif
            </div>
            <div class="col-sm-4">
              <label>Issue:</label>
              <p>{{$reviewinfo['ComicNum']}}</p>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-12 ">
              <label>Sinopsis:</label>
              <p>{{$reviewinfo['sinopsis']}}</p>
            </div>
          </div>
        </div>
        <div class="col-sm-2">
          <div class="row">
            <div class="col-sm-12">
              <label>Editorial:</label>
              <p>{{$reviewinfo['ed']}}</p>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <label>Writer:</label>
              <p>{{$reviewinfo['writer']}}</p>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <label>Artist:</label>
              <p>{{$reviewinfo['artist']}}</p>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <label>Genre:</label>
              <p> {{$reviewinfo['genero']}}</p>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <label>Pages:</label>
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

        <label class="labelgreen">By:</label>
        <br>
          @if( isset($user['ProfileImage']) )
            <img <?php echo 'src="data:image/jpeg;base64,'.($user['ProfileImage']).'"'; ?> class="img-thumbnail" alt="Cinque Terre" width="100" height="100">
          @else
            <img src="/Imagenes/User.jpg" class="img-thumbnail" alt="Cinque Terre" width="100" height="100">
          @endif        
        <br>
          <a href="/Profile/{{$user['id']}}">{{$user['name']}}</a>
        <br>
        <p>{{$reviewinfo['text']}}</p>
        <button type="button" class="btn btn-default greenbutton">Like This!</button>
        </div>
      </div>
    </form>

  @if($new)
    <script>
      $(document).ready(function() {
        document.getElementById("editarReseña").click();
      });
    </script>
  @endif

    <!--comentarios-->
    <div class="row otro">
      @if(!$new)
        <div class="col-sm-10 ">        
          <section class="comments">
            @include('Comments')
          </section>
          <div class="row coment">
            <div class="col-sm-12 comenta">
              <div class="row">
                <div class="col-sm-1">
                  @if( isset($_SESSION['ProfileImage']) )
                    <img <?php echo 'src="data:image/jpeg;base64,'.($_SESSION['ProfileImage']).'"'; ?> class="img-thumbnail" alt="Cinque Terre" width="50" height="50">
                  @else
                    <img src="/Imagenes/User.jpg" class="img-thumbnail" alt="Cinque Terre" width="50" height="50">
                  @endif                  
                </div>
                <div class="col-sm-11">                            
                <input type="text" class="form-control" id="comentario" placeholder="Leave a coment" name="comentario">              
                <br>
                <button type="button" class="btn btn-default" onclick="comment()" >Submit</button>              
                <script>  
                  function comment() {        
                    var textoComtr = document.getElementById('comentario').value;
                    if(textoComtr != ""){
                      var data = "user={{$_SESSION['userID']}}&post={{$reviewinfo['id']}}&_token={{csrf_token()}}&comentario=";
                      data = data.concat( textoComtr );
                      var xmlhttp = new XMLHttpRequest();
                      xmlhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                          document.getElementById('comentario').value="";
                          $('.comments').html(this.responseText);
                        }
                      };
                      xmlhttp.open("POST", "/addComment", true);
                      xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                      xmlhttp.send(data);
                    }
                  }
                 </script>
               </div>
             </div>
            </div>
          </div>      
        </div>
        <!--Relacionados-->
        @if(isset($reviews))
          <div class="col-sm-2 otros">
          <h3>Related</h3>
          <hr>          
          @foreach($reviews as $review)
            @if($review['genre_id'] == $reviewinfo['genero_id'] && $review['id'] != $reviewinfo['id'])              
              <a href="/Review/{{$review['id']}}">
                @if( isset($review['CoverImage']) )
                  <img <?php echo 'src="data:image/jpeg;base64,'.($review['CoverImage']).'"'; ?> class="img-responsive" alt="Profile">
                @else<img src="/Imagenes/Book.jpg" class="img-responsive" alt="Profile">@endif
              </a>              
              <p>{{$review['ComicTitle']}} #{{$review['ComicNum']}}</p>
              <a href="/Profile/{{$review['user_id']}}">{{$review['user_name']}}</a> <br>
              @for ($i=0; $i <$review['stars']; $i++)                      
                <span class="glyphicon glyphicon-star"></span>
              @endfor
              @for ($i=0; $i <5-$review['stars']; $i++)                      
                <span class="glyphicon glyphicon-star-empty"></span>
              @endfor
            @endif
          @endforeach          
          </div>
        @endif
      @endif
    </div>
  </div> 
@endsection