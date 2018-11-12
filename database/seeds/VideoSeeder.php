<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\{
    Videopage,
    Videotab,
    Video
};
class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //


    $fakervideopage = Faker::create('App\Videopage');
    $fakervideotab = Faker::create('App\Videotab');
   $fakervideo = Faker::create('App\Video');

   $roles = json_encode([0,1,2,3,4,5,6]);

   for ($f = 1; $f < 4; $f++){

       DB::table('videopages')->insert([
           'slug' => $fakervideopage->slug,
           'title' => $fakervideopage->title,
           'icon' => 'facebook',
           'roles' => $roles

       ]);

   }

   foreach (Videopage::all() as $videopage){

       for ($f = 1; $f < 4; $f++){

            Videotab::create([
                'slug' => $fakervideotab->slug,
                'title' => $fakervideotab->title,
                'icon' => 'facebook',
                'roles' => $roles,
                'videopage_id' => $videopage->id
            ]);

       }

}




    foreach (Videotab::all() as $videotab) {

        for ($f = 1; $f < 4; $f++) {

            Video::create([
                'title' => $fakervideo->title,
                'url' => 'https://www.youtube.com/watch?v=poJxo0Oe9Vc',
                'roles' => $roles,
                'text' => $fakervideo->text,
                'videotab_id' => $videotab->id
            ]);

        }

    }

}




}
