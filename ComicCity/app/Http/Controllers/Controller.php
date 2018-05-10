<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getReviews(){
    	$reviews=[
		'0' => [
			'review' => 'Review one',
			'author' => 'Rey',
			'stars' => '0',
			'date' =>'05/09/18',
			'following'=> 'true',
			'genero' =>'Terror'
		],
		'1' => [
			'review' => 'Review two',
			'author' => 'Jerry',
			'stars' => '1',
			'date' =>'05/08/18',
			'following'=> 'false',
			'genero' =>'Adventure'
		],
		'2' => [
			'review' => 'Review three',
			'author' => 'Jerry',
			'stars' => '2',
			'date' =>'15/07/18',
			'following'=> 'true',
			'genero' =>'Superheros'
		],
		'3' => [
			'review' => 'Review four',
			'author' => 'Author four',
			'stars' => '3',
			'date' =>'02/09/18',
			'following'=> 'false',
			'genero' =>'Romance'
		],
		'4' => [
			'review' => 'Review five',
			'author' => 'Rey',
			'stars' => '4',
			'date' =>'04/08/18',
			'following'=> 'true',
			'genero' =>'Noir'
		],
		'5' => [
			'review' => 'Review six',
			'author' => 'Rey',
			'stars' => '5',
			'date' =>'05/09/18',
			'following'=> 'false',
			'genero' =>'Terror'
		]
	];

	
    return view('Inicio', compact('reviews'));
    
    }

    public function getProfile(){
    	$userinfo=[
    		'0' =>['username' => 'Rey', 'joindate' =>'05/09/18', 'numberofreviews' =>'3', 'isprofile' => 'true'],
    		'1'=>['username' => 'Jerry', 'joindate' =>'05/08/18', 'numberofreviews' =>'2', 'isprofile' => 'false']
    	];
    	$reviews=[
		'0' => [
			'review' => 'Review one',
			'author' => 'Rey',
			'stars' => '0',
			'date' =>'05/09/18',
			'following'=> 'true',
			'genero' =>'Terror'
		],
		'1' => [
			'review' => 'Review two',
			'author' => 'Jerry',
			'stars' => '1',
			'date' =>'05/08/18',
			'following'=> 'false',
			'genero' =>'Adventure'
		],
		'2' => [
			'review' => 'Review three',
			'author' => 'Jerry',
			'stars' => '2',
			'date' =>'15/07/18',
			'following'=> 'true',
			'genero' =>'Superheros'
		],
		'3' => [
			'review' => 'Review four',
			'author' => 'Author four',
			'stars' => '3',
			'date' =>'02/09/18',
			'following'=> 'false',
			'genero' =>'Romance'
		],
		'4' => [
			'review' => 'Review five',
			'author' => 'Rey',
			'stars' => '4',
			'date' =>'04/08/18',
			'following'=> 'true',
			'genero' =>'Noir'
		],
		'5' => [
			'review' => 'Review six',
			'author' => 'Rey',
			'stars' => '5',
			'date' =>'05/09/18',
			'following'=> 'false',
			'genero' =>'Terror'
		]
	];
    	
    	return view('Profile', compact('userinfo','reviews'));
    }

    public function getReview(){
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
		'0' => [
			'review' => 'Review one',
			'author' => 'Rey',
			'stars' => '0',
			'date' =>'05/09/18',
			'following'=> 'true',
			'genero' =>'Terror'
		],
		'1' => [
			'review' => 'Review two',
			'author' => 'Jerry',
			'stars' => '1',
			'date' =>'05/08/18',
			'following'=> 'false',
			'genero' =>'Adventure'
		],
		'2' => [
			'review' => 'Review three',
			'author' => 'Jerry',
			'stars' => '2',
			'date' =>'15/07/18',
			'following'=> 'true',
			'genero' =>'Superheros'
		],
		'3' => [
			'review' => 'Review four',
			'author' => 'Author four',
			'stars' => '3',
			'date' =>'02/09/18',
			'following'=> 'false',
			'genero' =>'Romance'
		],
		'4' => [
			'review' => 'Review five',
			'author' => 'Rey',
			'stars' => '4',
			'date' =>'04/08/18',
			'following'=> 'true',
			'genero' =>'Noir'
		],
		'5' => [
			'review' => 'Review six',
			'author' => 'Rey',
			'stars' => '5',
			'date' =>'05/09/18',
			'following'=> 'false',
			'genero' =>'Terror'
		]
	];

	$comments=[
		'0'=>['user'=>'Rey', 'comment'=>'Un comentario'],
		'1'=>['user'=>'Jerry', 'comment'=>'Otro comentario']
	];

	return view('Review', compact('reviewinfo','reviews','comments'));

    }

  
}
