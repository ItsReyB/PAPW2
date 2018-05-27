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
            <a href="Review/{{$review['id']}}" >
              @if( isset($review['CoverImage']) )
                <img <?php echo 'src="data:image/jpeg;base64,'.($review['CoverImage']).'"'; ?> class="img-responsive" alt="Profile">
              @else
                <img src="/Imagenes/Book.jpg" class="img-responsive" alt="Profile">
              @endif
            </a>
                <p>{{$review['ComicTitle']}} #{{$review['ComicNum']}}</p>
                <a href="Profile/{{$review['user_id']}}">{{$review['user_name']}}</a> <br>               
                @for ($i=0; $i < $review['stars']; $i++)                      
                  <span class="glyphicon glyphicon-star"></span>
                @endfor
                @for ($i=0; $i <5-$review['stars']; $i++)                      
                  <span class="glyphicon glyphicon-star-empty"></span>
                @endfor
          </div>
      @endforeach
      </div>
    </div>

  </div>
</div>
@endsection

  





     
  