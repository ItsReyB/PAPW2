<?php

namespace App\Http\Controllers;

use App\CCuser;
use App\CCpost;
use App\CCgenre;
use App\CCeditorial;
use App\CCfollowing;
use App\CCcomment;

use Illuminate\Http\Request;

class DBcontroller extends Controller
{
    public function Signing(){
    	  	
    	$NewUser = new CCuser;
    	$NewUser->name= $_POST['user'];
    	$NewUser->email= $_POST['email'];
    	$NewUser->password = $_POST['pass'];
    	$NewUser->NumFollow = 0;
    	$NewUser->active = true;
    	$NewUser->ProfileImage = base64_encode(file_get_contents( public_path().'/Imagenes/User.jpg'	) );

    	$NewUser->save();
        session_start();
        $_SESSION['userID']=$NewUser['id'];
        $_SESSION['user']=$NewUser['name'];
        $_SESSION['isAdmin']=0;

		return redirect('Profile/'.$NewUser->id);	
    }
 	public function Logging(){

 		$UsersExist = CCuser::all();
 		$LOGG = false;
 		foreach ($UsersExist as $UE) {
 			if($UE['email']==$_POST['email'] && $UE['password']==$_POST['pass']){
				$LOGG = true;
				$AUser = $UE;
 			}
 		}
 		if($LOGG){
	    	session_start();
    	    $_SESSION['userID']=$AUser['id'];
    	    $_SESSION['user']=$AUser['name'];
    	    $_SESSION['isAdmin']=0;

            return redirect('Inicio');

	    }else{	    	
    		return view('Login');
	    }	
    }
    public function LoggingOut(){
	    session_start();
	    session_regenerate_id();
	    session_destroy();
    	return view('Login');
    }
    public function getAProfile($id){
        session_start();
        if(!isset($_SESSION['userID']))
            return redirect('Login');

	    $AUser = CCuser::find($id); 	
        $reviews = CCpost::ofUser($AUser['id'])->get();

 		$user=['username' => $AUser['name'], 'joindate' => $AUser['created_at'], 'numberofreviews' =>$reviews->count(), 'isadmin' => 'false', 'id' => $AUser['id'],
 		'ProfileImage' => $AUser['ProfileImage']];
    	
    		
        
        /*
        $_SESSION['userID']=$AUser['id'];
        $_SESSION['user']=$AUser['name'];
        $_SESSION['isAdmin']=0;
        */
        $actual = ($_SESSION['userID']==$AUser['id']);

        $Isfollowing = false;
        $existFR = 0;
        
        $followings = CCfollowing::all();
        foreach ($followings as $fs) {
            if($fs['follower_id']== $_SESSION['userID']    && $fs['followed_id'] == $AUser['id']){                
                $existFR = $fs['id'];
            }
        }
        $ActualFollowing = CCfollowing::find($existFR);
        $Isfollowing = $ActualFollowing['SN'];

    	return view('Profile', compact('reviews', 'user', 'actual', 'Isfollowing', 'existFR'));
    }
    public function WriteReview($string){
    	$reviewinfo=['ComicTitle' =>'','publishdate' => '','ComicNum' => '','sinopsis' => '','Editorial' => '','writer' => '','artist' => '','genre' => '',    		'pages' => '','text' => '','stars' => 0, 'ed' => '', 'genero' =>'', 'user_id' => 0];	    	
		$reviews=[
			'0' => ['review' => 'Review one','author' => 'Rey','stars' => '0','date' =>'05/09/18','following'=> 'true','genero' =>'Terror'],
			'1' => ['review' => 'Review two','author' => 'Jerry','stars' => '1','date' =>'05/08/18','following'=> 'false','genero' =>'Adventure'],
			'2' => ['review' => 'Review three','author' => 'Jerry','stars' => '2','date' =>'15/07/18','following'=> 'true','genero' =>'Superheros'],
			'3' => ['review' => 'Review four','author' => 'Author four','stars' => '3','date' =>'02/09/18','following'=> 'false','genero' =>'Romance'],
			'4' => ['review' => 'Review five','author' => 'Rey','stars' => '4','date' =>'04/08/18','following'=> 'true','genero' =>'Noir'],
			'5' => ['review' => 'Review six','author' => 'Rey','stars' => '5','date' =>'05/09/18','following'=> 'false','genero' =>'Terror']
		];
		$comments=[
			'0'=>['user'=>'Rey', 'comment'=>'Un comentario'],
			'1'=>['user'=>'Jerry', 'comment'=>'Otro comentario']
		];
		$new=true;
		$generos = CCgenre::all();

		return view('Review', compact('reviewinfo','reviews','comments', 'new', 'generos'));
    }
    public function ReadReview($id, Request $request){
        session_start();
        if(!isset($_SESSION['userID']))
            return redirect('Login');

    	$ReviewExist = CCpost::all();
 		foreach ($ReviewExist as $RE) {
 			if($RE['id']==$id){				
				$reviewinfo = $RE;
 			}
 		}
		$reviews=[
			'0' => ['review' => 'Review one','author' => 'Rey','stars' => '0','date' =>'05/09/18','following'=> 'true','genero' =>'Terror'],
			'1' => ['review' => 'Review two','author' => 'Jerry','stars' => '1','date' =>'05/08/18','following'=> 'false','genero' =>'Adventure'],
			'2' => ['review' => 'Review three','author' => 'Jerry','stars' => '2','date' =>'15/07/18','following'=> 'true','genero' =>'Superheros'],
			'3' => ['review' => 'Review four','author' => 'Author four','stars' => '3','date' =>'02/09/18','following'=> 'false','genero' =>'Romance'],
			'4' => ['review' => 'Review five','author' => 'Rey','stars' => '4','date' =>'04/08/18','following'=> 'true','genero' =>'Noir'],
			'5' => ['review' => 'Review six','author' => 'Rey','stars' => '5','date' =>'05/09/18','following'=> 'false','genero' =>'Terror']
		];

        $comments = CCcomment::withName()->get();
		$new=false;

		$generos = CCgenre::all();
		foreach($generos as $g){
			if($g['id'] == $reviewinfo['genre_id'])
			$reviewinfo->genero = $g['genre'] ;
		}
		$edit = CCeditorial::all();
		foreach($edit as $e){
			if($e['id'] == $reviewinfo['Editorial'])
			$reviewinfo->ed = $e['name'] ;
		}

       

		return view('Review', compact('reviewinfo','reviews','comments', 'new', 'generos'));
    }
    public function Post(){
		if(!isset(	$_POST['pid']	)	){
    		$exists = CCpost::all();
            $NewPost = new CCpost;
    		foreach ($exists as $e) {
    			if($e['ComicTitle'] == $_POST['Title'] && 	$e['ComicNum']== $_POST['Issue'] &&		 	 $e['user_id'] == $_POST['user'])
    				$NewPost = CCpost::find($e['id']);
    			else{
                	$NewPost->CoverImage = base64_encode(file_get_contents( public_path().'/Imagenes/Book.jpg'   ) );			
                }
    		}	
            
                
		}else{
			$NewPost = CCpost::find($_POST['pid']);
		}	
    	
    	$NewPost->ComicTitle = $_POST['Title'];
    	$NewPost->ComicNum = $_POST['Issue'];
    	$NewPost->text = $_POST['review'];
    	$NewPost->Likes = 0;
    	$edito = CCeditorial::all();
    	foreach ($edito as $ed) {
    		if(strcasecmp($ed['name'] ,$_POST['Editorial']) == 0)
    			$NewPost->Editorial = $ed['id'];
    		else 
    			$NewPost->Editorial = 1;
    	}
    	$NewPost->user_id = $_POST['user'];

		$NewPost->publishdate = $_POST['PublishDate'];
    	$NewPost->sinopsis = $_POST['sinopsis'];
		$NewPost->writer = $_POST['Autor'];
    	$NewPost->artist = $_POST['Artist'];
    	$NewPost->pages = $_POST['numPages'];

    	$generos = CCgenre::all();
    	foreach ($generos as $gen) {
    		if($gen['genre'] == $_POST['genre'])
    			$NewPost->genre_id = $gen['id'];
    	}
    	switch ($_POST['stars']) {
    		case '0 Stars':
    			$NewPost->stars = 0;
    			break;
    		case '1 Stars':
    			$NewPost->stars = 1;
    			break;
			case '2 Stars':
				$NewPost->stars = 2;
				break;
			case '3 Stars':
				$NewPost->stars = 3;
				break;
			case '4 Stars':
				$NewPost->stars = 4;
				break;
			case '5 Stars':
				$NewPost->stars = 5;
				break;
    		default:
    			$NewPost->stars = 0;
    			break;
    	}
		if($_FILES['ComicPic']['tmp_name'] != '')
			$NewPost->CoverImage = 	base64_encode(file_get_contents($_FILES['ComicPic']['tmp_name']));
		

    	$NewPost->save();
    	return redirect('Review/'.$NewPost->id);		
    }
    public function editMP(){ 	
    	session_start();
    	$users = CCuser::find($_SESSION['userID']);
    	$users->name = $_POST['Username'];
    	if($_FILES['ProfilePic']['tmp_name'] != '')
    		$users->ProfileImage = base64_encode(file_get_contents($_FILES['ProfilePic']['tmp_name']));

    	$users->save();
    	return redirect('Profile/'.$_SESSION['userID']);
    }

    public function Search(){
        $reviews = CCpost::Title($_GET['search'])->get();            
        foreach ($reviews as $r) {
            $user = CCuser::find($r['user_id']);
            $r['userName'] = $user['name'];
        }
        return view('Search', compact('reviews'));
    }
    public function Main(){
        $NewReviews = CCpost::News()->get();
        $reviews=[
                '0' => ['review' => 'Review one','author' => 'Rey','stars' => '0','date' =>'05/09/18','following'=> 'true','genero' =>'Terror'],
                '1' => ['review' => 'Review two','author' => 'Jerry','stars' => '1','date' =>'05/08/18','following'=> 'false','genero' =>'Adventure'],
                '2' => ['review' => 'Review three','author' => 'Jerry','stars' => '2','date' =>'15/07/18','following'=> 'true','genero' =>'Superheros'],
                '3' => ['review' => 'Review four','author' => 'Author four','stars' => '3','date' =>'02/09/18','following'=> 'false','genero' =>'Romance'],
                '4' => ['review' => 'Review five','author' => 'Rey','stars' => '4','date' =>'04/08/18','following'=> 'true','genero' =>'Noir'],
                '5' => ['review' => 'Review six','author' => 'Rey','stars' => '5','date' =>'05/09/18','following'=> 'false','genero' =>'Terror']
            ];
            
        foreach ($NewReviews as $r) {
            $user = CCuser::find($r['user_id']);
            $r['userName'] = $user['name'];
        }
        $TopReviews = CCpost::Top()->take(5)->get();

        return view('Inicio', compact('NewReviews','reviews','TopReviews' ));
    }

    public function Followuser(){
        if($_POST['exist'] > 0){
            $Follow = CCfollowing::find($_POST['exist']);
            $Follow['SN'] = !($_POST['SN']);
            $Follow->save();        
           
        }else{
            $Follow = new CCfollowing;
            $Follow['SN'] = true;
            $Follow['follower_id'] = $_POST['er'];
            $Follow['followed_id'] = $_POST['ed'];
            $Follow->save();
        }
    }

    public function index(Request $request)
    {
        $NewReviews = CCpost::News()->paginate(6);
        $reviews=[
                '0' => ['review' => 'Review one','author' => 'Rey','stars' => '0','date' =>'05/09/18','following'=> 'true','genero' =>'Terror'],
                '1' => ['review' => 'Review two','author' => 'Jerry','stars' => '1','date' =>'05/08/18','following'=> 'false','genero' =>'Adventure'],
                '2' => ['review' => 'Review three','author' => 'Jerry','stars' => '2','date' =>'15/07/18','following'=> 'true','genero' =>'Superheros'],
                '3' => ['review' => 'Review four','author' => 'Author four','stars' => '3','date' =>'02/09/18','following'=> 'false','genero' =>'Romance'],
                '4' => ['review' => 'Review five','author' => 'Rey','stars' => '4','date' =>'04/08/18','following'=> 'true','genero' =>'Noir'],
                '5' => ['review' => 'Review six','author' => 'Rey','stars' => '5','date' =>'05/09/18','following'=> 'false','genero' =>'Terror']
            ];
            
        foreach ($NewReviews as $r) {
            $user = CCuser::find($r['user_id']);
            $r['userName'] = $user['name'];
        }
        $TopReviews = CCpost::Top()->take(5)->get();

        if ($request->ajax()) {
            return view('Inicio', ['NewReviews' => $NewReviews]) ->render();
        }
        return view('Inicio', compact('NewReviews', 'reviews','TopReviews'));
    }
    public function SearchCat($categoria){
        $reviews = CCpost::Categoria($categoria)->get(); 
        foreach ($reviews as $r) {
            $user = CCuser::find($r['user_id']);
            $r['userName'] = $user['name'];
        }
        return view('Search', compact('reviews'));
    }
    public function Comment(Request $request){

        $NewComment = new CCcomment;
        $NewComment->text = $_POST['comentario'];
        $NewComment->user_id = $_POST['user'];
        $NewComment->post_id = $_POST['post'];
    }

    //end functions
}
//endcontroller