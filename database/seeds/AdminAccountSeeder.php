<?php

use Illuminate\Database\Seeder;

class AdminAccountSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		DB::table('users')->insert([
			'username' => 'admin',
			'display_name' => 'Admin',
			'email' => 'admin@tfd.com',
			'password' => bcrypt('AdminPassword'),
			'staff' => 1,
			'rank' => 8,
			'email_verified_at' => '2019-04-03 10:39:00',
		]);
	}
}
