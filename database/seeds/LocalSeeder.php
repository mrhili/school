<?php

use Illuminate\Database\Seeder;

use App\Local;

class LocalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        foreach ( config('app.locales') as $l => $local) {
        	# code...
        	DB::table('locals')->insert([
	            'name' => $l
	        ]);
        }
    }
}
