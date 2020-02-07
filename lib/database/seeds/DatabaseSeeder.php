<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin')->insert([
        	'name'=>'Thịnh Lê',
        	'email'=>'admin@abc',
        	'password'=>bcrypt('123456'),
        ]);
    }
}
