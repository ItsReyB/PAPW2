@foreach($comments as $comment)
  <div class="row comentario">
    <div class="col-sm-12">
      @if( isset($comment['ProfileImage']) )
        <img <?php echo 'src="data:image/jpeg;base64,'.($comment['ProfileImage']).'"'; ?> class="img-thumbnail" alt="Cinque Terre" width="50" height="50">
      @else
        <img src="/Imagenes/User.jpg" class="img-thumbnail" alt="Cinque Terre" width="50" height="50">
      @endif                 
      <a href="/Profile/{{$comment['user_id']}}">{{$comment['name']}}</a>
      <p>{{$comment['text']}}</p>
    </div>
  </div>
@endforeach