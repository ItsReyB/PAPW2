<?php

use Illuminate\Database\Seeder;

class Editoriales extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('c_ceditorials')->insert([
			['name'=>'Marvel'],
			['name'=>'DC'],
			['name'=>'Image'],
			['name'=>'Black Horse'],
		]);

    }
}
