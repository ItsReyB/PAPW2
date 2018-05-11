@extends('template.template')
@section ('title')
Search
@endsection
@section('content')
 
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
            <br>
            <input type="radio" name="busquedapor" value="user">User
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
          @foreach($reviews as $review)
          <div class="col-sm-2 resultados">
            <a href=""><img src="Imagenes/Book.jpg" class="img-responsive" alt="Profile"></a>
                <p>{{$review['review']}}</p>
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
          </div>
      @endforeach
      </div>
    </div>

  </div>
</div>
@endsection


  






