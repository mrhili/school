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
/*
            $table->increments('id');
            $table->string('name');
            $table->string('last_name')->nullable();
            $table->boolean('gender')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('birth_place')->nullable();
            $table->string('city')->nullable(); 
            $table->string('zip_code')->nullable();
            $table->string('adress')->nullable();
            $table->string('phone')->nullable();
            $table->string('phone2')->nullable();
            $table->string('phone3')->nullable();
            $table->string('fix')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('img')->nullable();
            $table->smallInteger('role')->default(0);


            $table->boolean('transport')->default(false);
            $table->boolean('additional_classes')->default(false);

            $table->boolean('fill_payment')->default(false);


            $table->string('cin')->nullable();
            $table->string('profession')->nullable();
            $table->boolean('family_situation')->nullable();

            $table->string('cv')->nullable();
            $table->boolean('cnss')->nullable();
            $table->string('cnss_id')->nullable();
*/
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'master',
            'last_name' => 'amine',
            'gender' => '1',
            'birth_date' => date('Y-m-d H:i:s'),
            'birth_place' => 'rabat',
            'city' => 'rabat',
            'zip_code' => '14000',
            'adress' => 'kenitra',
            'phone' => '0606060606',
            'phone2' => '0606060606',
            'phone3' => '0606060606',
            'fix' => '0606060606',
            'email' => 'master@app.com',
            'img' => 'profile.png',
            'email' => 'master@app.com',
            'password' => bcrypt('123456789'),
            'role' => 6,
            'remember_token' => str_random(10),
            'adress' => 'kenitra',
            'cin' => 'G620912',
            'cnss' => true,
            'cnss_id' => 'CNSS11111',
        ]);

        Relation::fillUsersPayment(1, 1, 10000, 1000);
/*


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
        */

/*
        DB::table('users')->insert([
            'id' => 6,
            'name' => 'student',
            'img' => 'profile.png',
            'email' => 'student@app.com',
            'password' => bcrypt('123456789'),
            'role' => 1,
        'remember_token' => str_random(10),
        ]);
*/
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
