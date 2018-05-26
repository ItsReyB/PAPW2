<?php

namespace App\Http\Controllers;

use App\CCuser;
use App\CCpost;
use App\CCgenre;
use App\CCeditorial;
use App\CCfollowing;
use App\CCcomment;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DBcontroller extends Controller
{
    public function Signing(){
    	$UserAlrdyExist = CCuser::all();
        $SUuserAE = false;
        foreach ($UserAlrdyExist as $UAE) {
            if($UAE['email']==$_POST['email']){
                $SUuserAE = true;
                return view('Login', compact('SUuserAE'));
            }
        }

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
        $_SESSION['ProfileImage']=$NewUser['ProfileImage'];
        $_SESSION['isAdmin'] = false;

		return redirect('Profile/'.$NewUser->id);	
    }
 	public function Logging(){

 		$UsersExist = CCuser::all();
 		$LOGG = false;
        $name = false;
        $password = false;

        foreach ($UsersExist as $UE) {
            if($UE['email']==$_POST['email'] ){
                $name = true;
                $AUser = $UE;                
                break;
            }
        }
        if(isset($AUser)){
            if($AUser['password']==$_POST['pass'] ){
                $password = true; 
                $LOGG = true;
            }
        }else{$password = true;}

 		if($LOGG){
	    	session_start();
    	    $_SESSION['userID']=$AUser['id'];
    	    $_SESSION['user']=$AUser['name'];
            $_SESSION['ProfileImage']=$AUser['ProfileImage'];

    	    $_SESSION['isAdmin']=0;

            return redirect('Inicio');
	    }else{	    	
    		return view('Login', compact('name', 'password'));
	    }	
    }
    public function LoggingOut(){
	    session_start();
	    session_regenerate_id();
        unset($_SESSION['userID']);
        unset($_SESSION['user']);
        unset($_SESSION['ProfileImage']);
        unset($_SESSION['isAdmin']);
    	return view('Login');
    }
    public function getAProfile($id){
        session_start();
        if(!isset($_SESSION['userID']))
            return redirect('Login');

	    $AUser = CCuser::find($id); 	
        if(is_null($AUser))
            return redirect('Login');

        $reviews = CCpost::ofUser($AUser['id'])->get();

 		$user=['username' => $AUser['name'], 'joindate' => $AUser['created_at'], 'numberofreviews' =>$reviews->count(),
                'id' => $AUser['id'],  'NumFollow' => $AUser['NumFollow'],	'ProfileImage' => $AUser['ProfileImage'] ];   
        
        $actual = ($_SESSION['userID']==$AUser['id']);

        $Isfollowing = 0;
        $existFR = 0;
        
        $followings = CCfollowing::all();
        foreach ($followings as $fs) {
            if($fs['follower_id']== $_SESSION['userID']    && $fs['followed_id'] == $AUser['id']){                
                $existFR = 1;
                break;
            }
        }
        if($existFR){
            $ActualFollowing = CCfollowing::Search($_SESSION['userID'], $AUser['id'])->first();
            $Isfollowing = $ActualFollowing['SN'];
        }

        $generos = CCgenre::all();
    	return view('Profile', compact('reviews', 'user', 'actual', 'Isfollowing', 'existFR', 'generos'));
    }
    public function WriteReview($string){
    	$reviewinfo=['ComicTitle' =>'','publishdate' => '','ComicNum' => '','sinopsis' => '','Editorial' => '','writer' => '','artist' => '','genre' => '',    		'pages' => '','text' => '','stars' => 0, 'ed' => '', 'genero' =>'', 'user_id' => 0];	    	
		$new=true;
		$generos = CCgenre::all();

        $user['id'] = 0;
        $user['name'] = "";
		return view('Review', compact('reviewinfo', 'new', 'generos', 'user'));
    }
    public function ReadReview($id, Request $request){
        session_start();
        if(!isset($_SESSION['userID']))
            return redirect('Login');

    	$reviewinfo = CCpost::find($id);
        if(is_null($reviewinfo))
            return redirect('Login');

		$reviews = CCpost::withUser()->inRandomOrder()->take(3)->get();
        $comments = CCcomment::withName($id)->get();
		$new=false;

		$generos = CCgenre::all();
		foreach($generos as $g){
			if($g['id'] == $reviewinfo['genre_id']){
    			$reviewinfo->genero = $g['genre'] ;
                $reviewinfo->genero_id = $g['id'] ;
            }
		}
		$edit = CCeditorial::all();
		foreach($edit as $e){
			if($e['id'] == $reviewinfo['Editorial'])
			$reviewinfo->ed = $e['name'] ;
		}
        $user = CCuser::find($reviewinfo['user_id']);
       

		return view('Review', compact('reviewinfo','reviews','comments', 'new', 'generos', 'user'));
    }
    public function Post(){  
       $exists = CCpost::all()->count();
        if($exists == 0)    //in case the review is the first of the DB
            $NewPost = new CCpost;

		if(!isset(	$_POST['pid']	)	){
            $exists = CCpost::all();  
    		foreach ($exists as $e) {
    			if($e['ComicTitle'] == $_POST['Title'] && 	$e['ComicNum']== $_POST['Issue'] &&		 	 $e['user_id'] == $_POST['user'])
    				$NewPost = CCpost::find($e['id']);
    			else{
                    $NewPost = new CCpost;
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
        $NewPost->Active=1;

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
    	$users = CCuser::find($_POST['user_id']);
    	$users->name = $_POST['Username'];
    	if($_FILES['ProfilePic']['tmp_name'] != '')
    		$users->ProfileImage = base64_encode(file_get_contents($_FILES['ProfilePic']['tmp_name']));

    	$users->save();
        $_SESSION['userID']=$users['id'];
        $_SESSION['user']=$users['name'];
        $_SESSION['ProfileImage']=$users['ProfileImage'];

    	return redirect('Profile/'.$_SESSION['userID']);
    }

    public function Search(){
        $reviews = CCpost::Title($_GET['search'])->get();            
        foreach ($reviews as $r) {
            $user = CCuser::find($r['user_id']);
            $r['userName'] = $user['name'];
        }
        $generos = CCgenre::all();
        return view('Search', compact('reviews', 'generos'));
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
        if($_POST['exist']){
            $Follow = CCfollowing::Search($_POST['er'], $_POST['ed'])->first();
            $Follow['SN'] = !($_POST['SN']);
            $Follow->save(); 
            if($Follow['SN'])
                DB::table('c_cusers')->where('id', $Follow['followed_id'])->increment('NumFollow');
            else
                DB::table('c_cusers')->where('id', $Follow['followed_id'])->decrement('NumFollow');
        }else{
            $Follow = new CCfollowing;
            $Follow['SN'] = true;
            $Follow['follower_id'] = $_POST['er'];
            $Follow['followed_id'] = $_POST['ed'];
            $Follow->save();
            DB::table('c_cusers')->where('id', $Follow['followed_id'])->increment('NumFollow');
        }
        $nuF = CCuser::find($Follow['followed_id']);
        return $nuF['NumFollow'];
    }

    public function index(Request $request){
        session_start();
        if(!isset($_SESSION['userID']))
            return redirect('Login');

        $NewReviews = CCpost::News()->paginate(6);
        $reviews=[
                '0' => ['review' => 'Review one','author' => 'Rey','stars' => 0,'date' =>'05/09/18','following'=> 'true','genero' =>'Terror'],
                '1' => ['review' => 'Review two','author' => 'Jerry','stars' => 1,'date' =>'05/08/18','following'=> 'false','genero' =>'Adventure'],
                '2' => ['review' => 'Review three','author' => 'Jerry','stars' => 2,'date' =>'15/07/18','following'=> 'true','genero' =>'Superheros'],
                '3' => ['review' => 'Review four','author' => 'Author four','stars' => 3,'date' =>'02/09/18','following'=> 'false','genero' =>'Romance'],
                '4' => ['review' => 'Review five','author' => 'Rey','stars' => 4,'date' =>'04/08/18','following'=> 'true','genero' =>'Noir'],
                '5' => ['review' => 'Review six','author' => 'Rey','stars' => 5,'date' =>'05/09/18','following'=> 'false','genero' =>'Terror']
            ];
            
        foreach ($NewReviews as $r) {
            $user = CCuser::find($r['user_id']);
            $r['userName'] = $user['name'];
        }
        $TopReviews = CCpost::Top()->take(5)->get();

        if ($request->ajax()) {
            return view('Inicio', ['NewReviews' => $NewReviews]) ->render();
        }
        $generos = CCgenre::all();
        
        $fReviews = CCfollowing::byUser($_SESSION['userID'])->inRandomOrder()->take(5)->get();
        return view('Inicio', compact('NewReviews', 'reviews','TopReviews', 'generos', 'fReviews'));
    }
    public function SearchCat($categoria){
        $reviews = CCpost::Categoria($categoria)->get(); 
        foreach ($reviews as $r) {
            $user = CCuser::find($r['user_id']);
            $r['userName'] = $user['name'];
        }
        $generos = CCgenre::all();
        return view('Search', compact('reviews', 'generos'));
    }
    public function Comment(Request $request){
        $NewComment = new CCcomment;
        $NewComment->text = $_POST['comentario'];
        $NewComment->user_id = $_POST['user'];
        $NewComment->post_id = $_POST['post'];
        $NewComment->save();  

        $comments = CCcomment::withName($_POST['post'])->get();
        return view('Comments', compact('comments'))->render();
    }

    public function DelReview(){
        if(isset($_POST)){
            $deletingReview = CCpost::find($_POST['post_id']);
            $deletingReview['Active'] = 0;
            $deletingReview->save();
            return redirect('Inicio');
        }else{
            return redirect('Inicio');
        }
    }
    public function DelUser(){
        if(isset($_POST)){
            $deletingUser = CCuser::find($_POST['user_id']);
            $deletingUser['active'] = 0;
            $deletingUser->save();

            $postsofuser = CCpost::all();
            foreach ($postsofuser as $pou) {
                if($pou['user_id']==$_POST['user_id']){
                    $pou['Active'] = 0;
                    $pou->save();
                }
            }

            $cmtsofuser = CCcomment::all();
            foreach ($cmtsofuser as $cou) {
                if($cou['user_id']==$_POST['user_id']){                    
                    $cou->delete();
                }
            }
            session_start();
            session_regenerate_id();
            session_destroy();
            return view('Login');                
        }else{
            return view('Login');
        }
    }
    //end functions
}
//endcontroller