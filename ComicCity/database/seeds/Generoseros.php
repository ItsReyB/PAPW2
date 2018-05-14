<?php

use Illuminate\Database\Seeder;
use App\CCgenre;

class Generoseros extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {       
    	$genero = new CCgenre;
    	$genero->genre ='Adventure';
    	$genero->save();

    	$genero = new CCgenre;
    	$genero->genre = 'Drama';
    	$genero->save();

    	$genero = new CCgenre;
    	$genero->genre = 'Fantasy';
    	$genero->save();

    	$genero = new CCgenre;
    	$genero->genre = 'Noir';
    	$genero->save();

    	$genero = new CCgenre;
    	$genero->genre = 'Romance';
    	$genero->save();

    	$genero = new CCgenre;
    	$genero->genre ='Sci-Fi';
    	$genero->save();

    	$genero = new CCgenre;
    	$genero->genre = 'Superheros';
		$genero->save();
		
		$genero = new CCgenre;
		$genero->genre = 'Terror';	
		$genero->save();

    }
}
