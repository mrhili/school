<?php

use Illuminate\Database\Seeder;
use App\CMS;
class CMSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //


        CMS::create([
            'txt' => 'Nouveau',
            'slug' => 'new'
        ]);


    }
}
