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
          <section class="NewReviews">
            @include('ReviewPages')
          </section>
      </div>  
      {{ $NewReviews->links() }}    
    </div>    
  </div>

  <script type="text/javascript">
      $(window).on('hashchange', function() {
          if (window.location.hash) {
              var page = window.location.hash.replace('#', '');
              if (page == Number.NaN || page <= 0) {
                  return false;
              } else {
                  getPosts(page);
              }
          }
      });
      $(function() {
          $('body').on('click', '.pagination a', function(e) {
              e.preventDefault();

              $('#load a').css('color', '#cdb0d9');
              $('#load').append('<img style="position: absolute; left: 0; top: 0; z-index: 100000;" src="/images/loading.gif" />');

              var url = $(this).attr('href');
              getReviews(url);
              window.history.pushState("", "", url);
          });

          function getReviews(url) {
              $.ajax({
                  url : url
                  data: {
                  "_token": "{{ csrf_token() }}"
                  }
              }).done(function (data) {
                  $('.NewReviews').html(data);
              }).fail(function () {
                  alert('Reviews could not be loaded.');
              });
          }
      });
  </script>
</div>

<div class="container-fluid dos">
  <h2>Top 5 Calificaciones</h2>
  <div class="panel panel-default panel-transparent">    
    <div class="panel-body inicio2">
    	<div class="row">        
    			@foreach($TopReviews as $topreview)          
            <div class="col-sm-2 resultados">
              <a href="Review/{{$topreview['id']}}" >
                @if( isset($topreview['CoverImage']) )
                  <img <?php echo 'src="data:image/jpeg;base64,'.($topreview['CoverImage']).'"'; ?> class="img-responsive" alt="Profile">
                @else
                  <img src="/Imagenes/Book.jpg" class="img-responsive" alt="Profile">
                @endif   
              </a>
              <p>{{$topreview['ComicTitle']}} #{{$topreview['ComicNum']}}</p>
              <a href="Profile/{{$topreview['user_id']}}">{{$topreview['userName']}}</a> <br>
              @for ($i=0; $i < $topreview['stars']; $i++)                      
                <span class="glyphicon glyphicon-star"></span>
              @endfor
              @for ($i=0; $i <5-$topreview['stars']; $i++)                      
                <span class="glyphicon glyphicon-star-empty"></span>
              @endfor
            </div>             
          @endforeach         
      </div>
    </div>
  </div>
</div>

@if($follows->count() )
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
                  @for ($i=0; $i < $followreview['stars']; $i++)                      
                    <span class="glyphicon glyphicon-star"></span>
                  @endfor
                  @for ($i=0; $i <5-$followreview['stars']; $i++)                      
                    <span class="glyphicon glyphicon-star-empty"></span>
                  @endfor  
                </div>
              @endif
            @endforeach 
        </div>
      </div>
    </div>
  </div>
@endif
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
              @for ($i=0; $i < $relatedreview['stars']; $i++)                      
                <span class="glyphicon glyphicon-star"></span>
              @endfor
              @for ($i=0; $i <5-$relatedreview['stars']; $i++)                      
                <span class="glyphicon glyphicon-star-empty"></span>
              @endfor 
            </div>
          @endif
        @endforeach 
      </div>
    </div>
  </div>
</div>
@endsection