<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
	{
		//$this->call(UsersTableSeeder::class);
        factory(\App\Models\Client::class, 1000)->create();
        //factory(\App\Models\Parametr::class, 250000)->create();
	}
}
