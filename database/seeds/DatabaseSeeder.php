<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run()
	{
		// $this->call(UserSeeder::class);
		DB::table('users')->insert([
			'name' => 'admin',
			'email' =>  'admin@menus.com',
			'password' => bcrypt('123456'),
			'remember_token' => Str::random(10)
		]);
	}
}
