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
      <p style="font-size: 10px" align="right">{{$comment['created_at']}}</p>
    </div>
  </div>
@endforeach