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
      <a href="/Profile/{{$review['user_id']}}">{{$review['user_name']}}</a> <br>               
      @for ($i=0; $i < $review['stars']; $i++)                      
        <span class="glyphicon glyphicon-star"></span>
      @endfor
      @for ($i=0; $i <5-$review['stars']; $i++)                      
        <span class="glyphicon glyphicon-star-empty"></span>
      @endfor
    </div>
@endforeach