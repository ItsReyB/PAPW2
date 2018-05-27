<?php

use Illuminate\Database\Seeder;
use App\CCuser;

class admin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $AD = new CCuser;
    	$AD->name= "Moderador";
    	$AD->email= "zeus@mail";
    	$AD->password = "159";
    	$AD->NumFollow = 0;
    	$AD->active = true;
        $AD->isAdmin = true;
    	$AD->ProfileImage = base64_encode(file_get_contents( public_path().'/Imagenes/User.jpg'	) );
    	$AD->save();
    }
}
