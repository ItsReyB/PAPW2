@extends('template.template')
@section ('title')
Profile
@endsection
@section('content')

  <div class="container-fluid">
    <div class="row content">
      <div class="col-sm-2 sidenav">
        @foreach($userinfo as $user)
        @if($user['isprofile']=='false')
        <img src="Imagenes/User.jpg" class="img-responsive" alt="Profile">
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
        @if($user['isprofile']=='false')
        <button type="button" class="btn btn-default"> <span class="glyphicon glyphicon-ok-sign"></span></button>
        @endif
        <!--en su perfil-->
        @if($user['isprofile']=='true')
        <button type="button" class="btn btn-default" id="showForm">Edit</button><br>

            <form id="form1">
              <b>Username:</b> <input type="text" name="Username" required="required">
                <br><br>
              <b>Profile Picture:</b><input type="file" name="ProfilePic" required="required">
                <br><br>
              <button type="button" class="btn btn-default" id="submit">Submit</button>
              </form>
              @endif
        @endif
        @endforeach

      </div>

      <div class="col-sm-10 resenias">
        <h2>Reviews</h2>
        <hr>
        <br>
        <div class="row">
          @foreach($userinfo as $user)
          @foreach($reviews as $review)
          @if($user['isprofile']=='false')
          @if($review['author']==$user['username'])
          <div class="col-sm-2 reviews">

            <a href=""><img src="Imagenes/Book.jpg" class="img-responsive" alt="Profile"></a>
            <p>{{$review['review']}} </p>

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
          @endif
          @endif
          @endforeach
          @endforeach
        </div>
      </div>
    </div>
  </div>
@endsection

 