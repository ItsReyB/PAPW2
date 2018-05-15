@foreach ($NewReviews as $newreview)

    <div class="col-sm-2 resultados">
		<a href="Review/{{$newreview['id']}}" >
      	@if( isset($newreview['CoverImage']) )
            <img <?php echo 'src="data:image/jpeg;base64,'.($newreview['CoverImage']).'"'; ?> class="img-responsive" alt="Profile">
  		@else
            <img src="/Imagenes/Book.jpg" class="img-responsive" alt="Profile">
      	@endif   
        	</a>
        	<p>{{$newreview['ComicTitle']}} #{{$newreview['ComicNum']}}</p>
            <a href="Profile/{{$newreview['user_id']}}">{{$newreview['userName']}}</a> <br>
        @for ($i=0; $i < $newreview['stars']; $i++)                      
          	<span class="glyphicon glyphicon-star"></span>
        @endfor
        @for ($i=0; $i <5-$newreview['stars']; $i++)                      
          	<span class="glyphicon glyphicon-star-empty"></span>
        @endfor
	</div>  

@endforeach

{{ $NewReviews->links() }}