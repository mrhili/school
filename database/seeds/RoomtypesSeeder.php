<?php

use Illuminate\Database\Seeder;

class RoomtypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roomtypes')->insert([
            'name' => 'Toilette'
        ]);
        
        DB::table('roomtypes')->insert([
            'name' => 'Class'
        ]);
        
        DB::table('roomtypes')->insert([
            'name' => 'Bureau'
        ]);
        
        DB::table('roomtypes')->insert([
            'name' => 'Bibliothéque'
        ]);
        
        DB::table('roomtypes')->insert([
            'name' => 'Sale de sport'
        ]);
        
        DB::table('roomtypes')->insert([
            'name' => 'Salle de recreation'
        ]);
        
        DB::table('roomtypes')->insert([
            'name' => 'Buffet'
        ]);
 
    }
}
