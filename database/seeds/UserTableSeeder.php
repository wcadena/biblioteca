<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		//DB::table('users')->truncate();
		factory(App\User::class)->create([
			'name' => 'Wagner cadena',
			'role' => 'admin',
			'email' => 'wcadena@outlook.com',
            'password' => bcrypt('wcadena'),
			'empresa' => 'Avianca',
		]);
		factory(App\User::class,49)->create();
		
    }
}
