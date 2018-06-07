<?php

use Illuminate\Database\Seeder;

class FournitureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*

$table->increments('id');
            $table->string('name');
            $table->string('additional_info')->nullable();
            $table->string('for')->nullable();
            $table->boolean('required');
            $table->float('average_price')->nullable();

        */
        DB::table('fournitures')->insert([
            'name' => 'Stylo bleu',
            'for' => 'Ecriture',
            'required' => true,
            'average_price' => 1.5
        ]);
        DB::table('fournitures')->insert([
            'name' => 'Stylo vert',
            'for' => 'Ecriture',
            'required' => true,
            'average_price' => 1.5
        ]);
        DB::table('fournitures')->insert([
            'name' => 'Stylo noire',
            'for' => 'Ecriture',
            'required' => false,
            'average_price' => 1.5
        ]);
    }
}
