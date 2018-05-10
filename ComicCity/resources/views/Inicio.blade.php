@extends('template.template')
@section ('title')
Inicio
@endsection
@section('content')
<div class="container-fluid ">
  <h2>New Reviews</h2>
  <div class="panel panel-default panel-transparent">
    <div class="panel-body inicio">
    		<div class="row">
    			@foreach($reviews as $newreview)
          @if($newreview['date']=='05/09/18')
    			<div class="col-sm-2 resultados">
	    		  <a href=""><img src="Imagenes/Book.jpg" class="img-responsive" alt="Profile"></a>
	              <p>{{$newreview['review']}} </p>
	              <a href="">{{$newreview['author']}}</a> <br>
                
                  @if($newreview['stars']==0)
                  @section('0estrella')
  	              <span class="glyphicon glyphicon-star-empty"></span>
  	              <span class="glyphicon glyphicon-star-empty"></span>
  	              <span class="glyphicon glyphicon-star-empty"></span>
  	              <span class="glyphicon glyphicon-star-empty"></span>
  	              <span class="glyphicon glyphicon-star-empty"></span>
                  @show
                  @elseif($newreview['stars']==1)
                  @section('1estrella')
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star-empty"></span>
                  <span class="glyphicon glyphicon-star-empty"></span>
                  <span class="glyphicon glyphicon-star-empty"></span>
                  <span class="glyphicon glyphicon-star-empty"></span>
                  @show
                  @elseif($newreview['stars']==2)
                  @section('2estrellas')
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star-empty"></span>
                  <span class="glyphicon glyphicon-star-empty"></span>
                  <span class="glyphicon glyphicon-star-empty"></span>
                  @show
                  @elseif($newreview['stars']==3)
                  @section('3estrellas')
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star-empty"></span>
                  <span class="glyphicon glyphicon-star-empty"></span>
                  @show
                  @elseif($newreview['stars']==4)
                  @section('4estrellas')
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star-empty"></span>
                  @show
                  @elseif($newreview['stars']==5)
                  @section('5estrellas')
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star"></span>
                  @show
                  @endif

          		</div>
              @endif
          	@endforeach	
          </div>
    </div>
  </div>
</div>

<div class="container-fluid dos">
  <h2>Top Calificaciones</h2>
  <div class="panel panel-default panel-transparent">
    
    <div class="panel-body inicio2">
    	<div class="row">
    			@foreach($reviews as $topreview)
          @if($topreview['stars']==5)
          <div class="col-sm-2 resultados">
            <a href=""><img src="Imagenes/Book.jpg" class="img-responsive" alt="Profile"></a>
                <p>{{$topreview['review']}} </p>
                <a href="">{{$topreview['author']}}</a> <br>
                
                  @if($topreview['stars']==5)
                  @section('5estrellas')
                  @show
                  @endif

              </div>
              @endif
          @if($topreview['stars']==4)
          <div class="col-sm-2 resultados">
            <a href=""><img src="Imagenes/Book.jpg" class="img-responsive" alt="Profile"></a>
                <p>{{$topreview['review']}} </p>
                <a href="">{{$topreview['author']}}</a> <br>
                
                  @if($topreview['stars']==4)
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star-empty"></span>
                  @endif

              </div>
              @endif
            @endforeach 
          </div>
      </div>
  </div>
</div>

<div class="container-fluid">
  <h2>Reviews de Personas que sigues</h2>
  <div class="panel panel-default panel-transparent">
   
    <div class="panel-body inicio">
    	<div class="row">
    			@foreach($reviews as $followreview)
          @if($followreview['following']=='true')
          <div class="col-sm-2 resultados">
            <a href=""><img src="Imagenes/Book.jpg" class="img-responsive" alt="Profile"></a>
                <p>{{$followreview['review']}} </p>
                <a href="">{{$followreview['author']}}</a> <br>
                
                  @if($followreview['stars']==0)
                  @section('0estrella')
                  @show
                  @endif
                  @if($followreview['stars']==1)
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star-empty"></span>
                  <span class="glyphicon glyphicon-star-empty"></span>
                  <span class="glyphicon glyphicon-star-empty"></span>
                  <span class="glyphicon glyphicon-star-empty"></span>
                  @endif
                  @if($followreview['stars']==2)
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star-empty"></span>
                  <span class="glyphicon glyphicon-star-empty"></span>
                  <span class="glyphicon glyphicon-star-empty"></span>
                  @endif
                  @if($followreview['stars']==3)
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star-empty"></span>
                  <span class="glyphicon glyphicon-star-empty"></span>
                  @endif
                  @if($followreview['stars']==4)
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star-empty"></span>
                  @endif
                  @if($followreview['stars']==5)
                  @section('5estrellas')
                  @show
                  @endif

              </div>
              @endif
            @endforeach 
          </div>
    </div>
  </div>
</div>

<div class="container-fluid dos">
  <h2>Reseñas de Comics Relacionados</h2>
  <div class="panel panel-default panel-transparent">
    
    <div class="panel-body inicio2">
    	<div class="row">
    			@foreach($reviews as $relatedreview)
          @if($relatedreview['genero']=='Terror')
          <div class="col-sm-2 resultados">
            <a href=""><img src="Imagenes/Book.jpg" class="img-responsive" alt="Profile"></a>
                <p>{{$relatedreview['review']}} </p>
                <a href="">{{$relatedreview['author']}}</a> <br>
                
                  @if($relatedreview['stars']==0)
                  @section('0estrella')
                  @show
                  @endif
                  @if($relatedreview['stars']==1)
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star-empty"></span>
                  <span class="glyphicon glyphicon-star-empty"></span>
                  <span class="glyphicon glyphicon-star-empty"></span>
                  <span class="glyphicon glyphicon-star-empty"></span>
                  @endif
                  @if($relatedreview['stars']==2)
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star-empty"></span>
                  <span class="glyphicon glyphicon-star-empty"></span>
                  <span class="glyphicon glyphicon-star-empty"></span>
                  @endif
                  @if($relatedreview['stars']==3)
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star-empty"></span>
                  <span class="glyphicon glyphicon-star-empty"></span>
                  @endif
                  @if($relatedreview['stars']==4)
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star-empty"></span>
                  @endif
                  @if($relatedreview['stars']==5)
                  @section('5estrellas')
                  @show
                  @endif

              </div>
              @endif
            @endforeach 
          </div>
    </div>
  </div>
</div>
@endsection