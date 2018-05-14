<?php

namespace App\Http\Controllers;

use App\CCuser;
use App\CCpost;
use App\CCgenre;
use App\CCeditorial;

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
    		$reviews=[
				'0' => ['review' => 'Review one','author' => 'Rey','stars' => '0','date' =>'05/09/18','following'=> 'true','genero' =>'Terror'],
				'1' => ['review' => 'Review two','author' => 'Jerry','stars' => '1','date' =>'05/08/18','following'=> 'false','genero' =>'Adventure'],
				'2' => ['review' => 'Review three','author' => 'Jerry','stars' => '2','date' =>'15/07/18','following'=> 'true','genero' =>'Superheros'],
				'3' => ['review' => 'Review four','author' => 'Author four','stars' => '3','date' =>'02/09/18','following'=> 'false','genero' =>'Romance'],
				'4' => ['review' => 'Review five','author' => 'Rey','stars' => '4','date' =>'04/08/18','following'=> 'true','genero' =>'Noir'],
				'5' => ['review' => 'Review six','author' => 'Rey','stars' => '5','date' =>'05/09/18','following'=> 'false','genero' =>'Terror']
			];
			$userinfo=[
				'0' =>['username' => 'Rey', 'joindate' =>'05/09/18', 'numberofreviews' =>'3', 'isadmin' => 'true', 'isprofile' => 'true'],
				'1'=>['username' => 'Jerry', 'joindate' =>'05/08/18', 'numberofreviews' =>'2', 'isadmin' => 'false','isprofile' => 'true']
	    	];

	    	session_start();
    	    $_SESSION['userID']=$AUser['id'];
    	    $_SESSION['user']=$AUser['name'];
    	    $_SESSION['isAdmin']=0;
	    	return view('Inicio', compact('reviews','userinfo'));

	    }else{
	    	$userinfo=[
    			'0' =>['username' => 'Rey', 'pass'=>'1234','joindate' =>'05/09/18', 'numberofreviews' =>'3', 'isadmin' => 'true', 'isprofile' => 'true'],
    			'1'=>['username' => 'Jerry','pass'=>'5678', 'joindate' =>'05/08/18', 'numberofreviews' =>'2', 'isadmin' => 'false','isprofile' => 'true']
    		];
    		return view('Login', compact('userinfo'));
	    }	
    }
    public function LoggingOut(){
	    session_start();
	    session_regenerate_id();
	    session_destroy();
    	$userinfo=[
    			'0' =>['username' => 'Rey', 'pass'=>'1234','joindate' =>'05/09/18', 'numberofreviews' =>'3', 'isadmin' => 'true', 'isprofile' => 'true'],
    			'1'=>['username' => 'Jerry','pass'=>'5678', 'joindate' =>'05/08/18', 'numberofreviews' =>'2', 'isadmin' => 'false','isprofile' => 'true']
    		];
    	return view('Login', compact('userinfo'));
    }
    public function getAProfile($id){

	    $UsersExist = CCuser::all();
 		foreach ($UsersExist as $UE) {
 			if($UE['id']==$id){				
				$AUser = $UE;
 			}
 		}	    

 		$user=['username' => $AUser['name'], 'joindate' => $AUser['created_at'], 'numberofreviews' =>'3', 'isadmin' => 'false', 'id' => $AUser['id'],
 		'ProfileImage' => $AUser['ProfileImage']];
    	
    	$reviews=[
				'0' => ['review' => 'Review one','author' => 'Rey','stars' => '0','date' =>'05/09/18','following'=> 'true','genero' =>'Terror'],
				'1' => ['review' => 'Review two','author' => 'Jerry','stars' => '1','date' =>'05/08/18','following'=> 'false','genero' =>'Adventure'],
				'2' => ['review' => 'Review three','author' => 'Jerry','stars' => '2','date' =>'15/07/18','following'=> 'true','genero' =>'Superheros'],
				'3' => ['review' => 'Review four','author' => 'Author four','stars' => '3','date' =>'02/09/18','following'=> 'false','genero' =>'Romance'],
				'4' => ['review' => 'Review five','author' => 'Rey','stars' => '4','date' =>'04/08/18','following'=> 'true','genero' =>'Noir'],
				'5' => ['review' => 'Review six','author' => 'Rey','stars' => '5','date' =>'05/09/18','following'=> 'false','genero' =>'Terror']
			];
		$actual = true;
        session_start();
        $_SESSION['userID']=$AUser['id'];
        $_SESSION['user']=$AUser['name'];
        $_SESSION['isAdmin']=0;
    	return view('Profile', compact('reviews', 'user', 'actual'));
    }
    public function WriteReview($string){
    	$reviewinfo=['ComicTitle' =>'','publishdate' => '','ComicNum' => '','sinopsis' => '','Editorial' => '','writer' => '','artist' => '','genre' => '',    		'pages' => '','text' => '','stars' => '0', 'ed' => '', 'genero' =>''];	    	
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
    public function ReadReview($id){

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
		$comments=[
			'0'=>['user'=>'Rey', 'comment'=>'Un comentario'],
			'1'=>['user'=>'Jerry', 'comment'=>'Otro comentario']
		];
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
    		foreach ($exists as $e) {
    			if($e['ComicTitle'] == $_POST['Title'] && 	$e['ComicNum']== $_POST['Issue'] &&		 	 $e['user_id'] == $_POST['user'])
    				$NewPost = CCpost::find($e['id']);
    			else
    				$NewPost = new CCpost;    				
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
    	if(isset($NewPost->CoverImage)){
    		if($_FILES['ComicPic']['size']>0)
    			$NewPost->CoverImage = 	base64_encode(file_get_contents($_FILES['ComicPic']['tmp_name']));
    	}else{
    		$NewPost->CoverImage = base64_encode(file_get_contents( public_path().'/Imagenes/Book.jpg'	) );
    	}
		

    	$NewPost->save();
    	return redirect('Review/'.$NewPost->id);		
    }
    public function editMP(){ 	
    	session_start();
    	$users = CCuser::find($_SESSION['userID']);
    	$users->name = $_POST['Username'];
    	if($_FILES['ProfilePic']['size']>0)
    		$users->ProfileImage = base64_encode(file_get_contents($_FILES['ProfilePic']['tmp_name']));

    	$users->save();
    	return redirect('Profile/'.$_SESSION['userID']);
    }
    //end functions
}
//endcontroller