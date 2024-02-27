<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'name' => 'Петр Иванов',
            'email' => 'admin@example.com',
            'password' => bcrypt('secret'),
	];

	DB::table('users')->insert($data);
    }
}
