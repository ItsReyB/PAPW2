<?php

namespace App\Http\Controllers;

use App\CCuser;

class DBcontroller extends Controller
{

    public function Signing(){
    	  	
    	$NewUser = new CCuser;
    	$NewUser->name= $_POST['user'];
    	$NewUser->email= $_POST['email'];
    	$NewUser->password = $_POST['pass'];
    	$NewUser->NumFollow = 0;
    	$NewUser->active = true;

    	$NewUser->save();

    	$userinfo=['0'=>['username' => $NewUser->name, 'joindate' =>'05/09/18', 'numberofreviews' =>'3', 'isadmin' => 'true','isprofile' => 'true'],
    				'1'=>['username' => $NewUser->name, 'joindate' =>'05/09/18', 'numberofreviews' =>'3', 'isadmin' => 'true','isprofile' => 'true']];

    	$reviews=[
			'0' => ['review' => 'Review one','author' => 'Rey','stars' => '0','date' =>'05/09/18','following'=> 'true','genero' =>'Terror'],
			'1' => ['review' => 'Review two','author' => 'Jerry','stars' => '1','date' =>'05/08/18','following'=> 'false','genero' =>'Adventure'],
			'2' => ['review' => 'Review three','author' => 'Jerry','stars' => '2','date' =>'15/07/18','following'=> 'true','genero' =>'Superheros'],
			'3' => ['review' => 'Review four','author' => 'Author four','stars' => '3','date' =>'02/09/18','following'=> 'false','genero' =>'Romance'],
			'4' => ['review' => 'Review five','author' => 'Rey','stars' => '4','date' =>'04/08/18','following'=> 'true','genero' =>'Noir'],
			'5' => ['review' => 'Review six','author' => 'Rey','stars' => '5','date' =>'05/09/18','following'=> 'false','genero' =>'Terror']
		];
    	
    	return view('Profile', compact('userinfo','reviews'));
    	
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

 		$user=['username' => $AUser['name'], 'joindate' => $AUser['created_at'], 'numberofreviews' =>'3', 'isadmin' => 'false','isprofile' => 'true', 'id' => $AUser['id']];
    	
    	$reviews=[
				'0' => ['review' => 'Review one','author' => 'Rey','stars' => '0','date' =>'05/09/18','following'=> 'true','genero' =>'Terror'],
				'1' => ['review' => 'Review two','author' => 'Jerry','stars' => '1','date' =>'05/08/18','following'=> 'false','genero' =>'Adventure'],
				'2' => ['review' => 'Review three','author' => 'Jerry','stars' => '2','date' =>'15/07/18','following'=> 'true','genero' =>'Superheros'],
				'3' => ['review' => 'Review four','author' => 'Author four','stars' => '3','date' =>'02/09/18','following'=> 'false','genero' =>'Romance'],
				'4' => ['review' => 'Review five','author' => 'Rey','stars' => '4','date' =>'04/08/18','following'=> 'true','genero' =>'Noir'],
				'5' => ['review' => 'Review six','author' => 'Rey','stars' => '5','date' =>'05/09/18','following'=> 'false','genero' =>'Terror']
			];
    	return view('Profile', compact('reviews', 'user'));
    }

    public function WriteReview($string){
	    	$reviewinfo=[
	    		'title' =>'Este es el titulo',
	    		'publishdate' => '05/05/18',
	    		'issue' => '#3',
	    		'sinopsis' => 'Esta es la sinopsis',
	    		'editorial' => 'Esta es la editorial',
	    		'writer' => 'Nombre escritor',
	    		'artist' => 'Nombre dibujante',
	    		'genre' => 'Terror',
	    		'pages' => '#100',
	    		'review' => 'Esta es la reseña',
	    		'stars' => '3'
	    	];	    	
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
		

		return view('Review', compact('reviewinfo','reviews','comments'));
    }
}