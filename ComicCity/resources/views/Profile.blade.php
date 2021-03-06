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
          <h2>Follow</h2>              
          <button id="btnFollow" type="button" class="btn btn-default" onclick="follow()" content="{{ csrf_token() }}">
              <span class='glyphicon glyphicon-ok-sign'  ></span>                   
          </button>
          <button id="btnUnFollow" type="button" class="btn btn-default" onclick="unfollow()" content="{{ csrf_token() }}">
              <span class='glyphicon glyphicon-remove-sign'  ></span>                   
          </button>
          <input type="hidden" id="extsF" value={{$existFR}} >
          <script>                
            $(document).ready(function() {                 
              document.getElementById("btnFollow").style.color = "green";
              document.getElementById("btnUnFollow").style.color = "red";
              if({{$Isfollowing}}){
                document.getElementById("btnFollow").style.visibility = "hidden";
                document.getElementById("btnUnFollow").style.visibility = "visible";
              }else{
                document.getElementById("btnUnFollow").style.visibility = "hidden";
                document.getElementById("btnFollow").style.visibility = "visible";
              }

            });   
            function follow() {   
              var follower = "er={{$_SESSION['userID']}}&"; 
              var followed = "ed={{$user['id']}}&";
              var token = "_token={{csrf_token()}}&";
              var existRow = "exist="+document.getElementById("extsF").value+"&";
              var FollowSN = "SN=0";
              var data = follower+followed+token+existRow+FollowSN;                 
              var xmlhttp = new XMLHttpRequest();
              xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                  document.getElementById("btnFollow").style.visibility = "hidden";
                  document.getElementById("btnUnFollow").style.visibility = "visible";
                  document.getElementById("Fllws").innerHTML = this.responseText;
                  document.getElementById("extsF").value =1;
                }
              };
              xmlhttp.open("POST", "/Follow", true);
              xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
              xmlhttp.send(data);
            }
            function unfollow() {      
              var follower = "er={{$_SESSION['userID']}}&"; 
              var followed = "ed={{$user['id']}}&";
              var token = "_token={{csrf_token()}}&";
              var existRow = "exist="+document.getElementById("extsF").value+"&";
              var FollowSN = "SN=1";
              var data = follower+followed+token+existRow+FollowSN;
              var xmlhttp = new XMLHttpRequest();
              xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                  document.getElementById("btnFollow").style.visibility = "visible";
                  document.getElementById("btnUnFollow").style.visibility = "hidden";
                  document.getElementById("Fllws").innerHTML = this.responseText;
                  document.getElementById("extsF").value =1;
                }
              };
              xmlhttp.open("POST", "/Follow", true);
              xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
              xmlhttp.send(data);
            }
          </script>              
        @endif
        @if($actual || $_SESSION['isAdmin'])
          <!--en su perfil-->            
          <button type="button" class="btn btn-default buttonpurple" id="showForm">Edit</button><br>
          <form id="form1" action="/editMP" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }} 
            <b>Username:</b> <input type="text" name="Username" required="required" value={{$user['username']}}>
            <br><br>
            <b>Profile Picture:</b><input type="file" name="ProfilePic">
            <br><br>
            <button type="submit" class="btn btn-default buttonpurple" id="submit">Submit</button>
            <br><br>    
            <input type="hidden" name="user_id" value={{$user['id']}}>            
          </form>
          <form id="form11" action="/delUser" method="POST" style="display:none;">
            {{ csrf_field() }}
            <input type="hidden" name="user_id" value={{$user['id']}}>
            <button class="btn btn-danger" id="deleteaccount">Eliminar cuenta</button>
          </form>
        @endif          
        <h2>Followers</h2>
        <p id="Fllws">{{$user['NumFollow']}}</p>
      </div>

      <div class="col-sm-10 resenias">
        <h2>Reviews</h2>
        <hr>
        <br>
        <div class="row">
            @foreach($reviews as $review)              
              <div class="col-sm-2 reviews">
                <a href="/Review/{{$review['id']}}" >
                @if( isset($review['CoverImage']) )
                  <img <?php echo 'src="data:image/jpeg;base64,'.($review['CoverImage']).'"'; ?> class="img-responsive" alt="Profile">
                @else
                  <img src="/Imagenes/Book.jpg" class="img-responsive" alt="Profile">
                @endif   
                </a>
                <p>{{$review['ComicTitle']}} #{{$review['ComicNum']}}</p>
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

 