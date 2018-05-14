@extends('template.template')
@section ('title')
Profile
@endsection
@section('content')

  <div class="container-fluid">
    <div class="row content">
      <div class="col-sm-2 sidenav">
            @if( isset($user['ProfileImage']) )
              <img <?php echo 'src="data:image/jpeg;base64,'.($user['ProfileImage']).'"'; ?> class="img-responsive" alt="Profile">
            @else
              <img src="/Imagenes/User.jpg" class="img-responsive" alt="Profile">
            @endif
            <h2>User</h2>
            <p>{{$user['username']}}</p>
            <hr>
            <h2>Joined</h2>
            <p>{{$user['joindate']}}</p>
            <hr>
            <h2>Reviews</h2>
            <p>{{$user['numberofreviews']}}</p>
            <br>

            <!--en el perfil de alguien mas-->
            @if(!$actual)
              <button type="button" class="btn btn-default"> <span class="glyphicon glyphicon-ok-sign"></span></button>
            @else
            <!--en su perfil-->            
            <button type="button" class="btn btn-default" id="showForm">Edit</button><br>
              <form id="form1" action="/editMP" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }} 
                <b>Username:</b> <input type="text" name="Username" required="required" value={{$user['username']}}>
                <br><br>
                <b>Profile Picture:</b><input type="file" name="ProfilePic">
                <br><br>
                <button type="submit" class="btn btn-default" id="submit">Submit</button>
              </form>
            @endif          

      </div>

      <div class="col-sm-10 resenias">
        <h2>Reviews</h2>
        <hr>
        <br>
        <div class="row">
            @foreach($reviews as $review)              
              <div class="col-sm-2 reviews">
                <a href=""><img src="/Imagenes/Book.jpg" class="img-responsive" alt="Profile"></a>
                <p>{{$review['review']}} </p>

                @for ($i=0; $i <$review['stars']; $i++)                      
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

 