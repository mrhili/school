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
        //

        DB::table('users')->insert([
            'id' => 1,
            'name' => 'master',
            'img' => 'profile.png',
            'email' => 'master@app.com',
            'password' => bcrypt('123456789'),
            'role' => 6,
            'remember_token' => str_random(10),
        ]);



        DB::table('users')->insert([
        	'id' => 2,
            'name' => 'admin',
            'img' => 'profile.png',
            'email' => 'admin@app.com',
            'password' => bcrypt('123456789'),
            'role' => 5,
            'remember_token' => str_random(10),
        ]);



        DB::table('users')->insert([
            'id' => 3,
            'name' => 'secretaria',
            'img' => 'profile.png',
            'email' => 'secretaria@app.com',
            'password' => bcrypt('123456789'),
            'role' => 4,
        'remember_token' => str_random(10),
        ]);

        DB::table('users')->insert([
            'id' => 4,
            'name' => 'teatcher',
            'img' => 'profile.png',
            'email' => 'teatcher@app.com',
            'password' => bcrypt('123456789'),
            'role' => 3,
        'remember_token' => str_random(10),
        ]);

        DB::table('users')->insert([
            'id' => 5,
            'name' => 'parent',
            'img' => 'profile.png',
            'email' => 'parent@app.com',
            'password' => bcrypt('123456789'),
            'role' => 2,
        'remember_token' => str_random(10),
        ]);


        DB::table('users')->insert([
            'id' => 6,
            'name' => 'student',
            'img' => 'profile.png',
            'email' => 'student@app.com',
            'password' => bcrypt('123456789'),
            'role' => 1,
        'remember_token' => str_random(10),
        ]);

        DB::table('users')->insert([
            'id' => 7,
            'name' => 'user',
            'img' => 'profile.png',
            'email' => 'user@app.com',
            'password' => bcrypt('123456789'),
            'role' => 0,
        'remember_token' => str_random(10),
        ]);






    }
}
