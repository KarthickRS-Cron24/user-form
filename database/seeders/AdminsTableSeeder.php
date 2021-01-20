<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert(array(
        	array(
				'name' => "Steve",
				'email' => 'steve@gmail.com',
                'password' => bcrypt('secret'),
        	),
        	array(
				'name' => "Laura",
				'email' => 'laura@gmail.com',
                'password' => bcrypt('secret'),
                
        	)
        ));
    }
}
