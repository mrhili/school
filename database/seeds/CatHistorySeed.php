<?php

use Illuminate\Database\Seeder;

class CatHistorySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //kind 0- defficit / 1- normal / 2 - benifits

        DB::table('history_categories')->insert([
            'name' => 'Payement d\'un éleve ( + avec un benefits):',
            'model' => 'User',
            'icon' => 'money-bill-alt',
            'kind' => 2
        ]);//1

        DB::table('history_categories')->insert([
            'name' => 'Enregistrement d\'un éleve :',
            'model' => 'User',
            'icon' => 'graduation-cap',
            'kind' => 1
        ]);//2

        DB::table('history_categories')->insert([
            'name' => 'Enregistrement d\'un parent:',
            'model' => 'User',
            'icon' => 'user-plus',
            'kind' => 1
        ]);//3

        DB::table('history_categories')->insert([
            'name' => 'Enregistrement d\'un Maitre:',
            'model' => 'User',
            'icon' => 'user-plus',
            'kind' => 1
        ]);//4
        DB::table('history_categories')->insert([
            'name' => 'Enregistrement d\'un Secretaire:',
            'model' => 'User',
            'icon' => 'user-plus',
            'kind' => 1
        ]);//5
        DB::table('history_categories')->insert([
            'name' => 'Enregistrement d\'un Administrateur:',
            'model' => 'User',
            'icon' => 'user-plus',
            'kind' => 1
        ]);//6
        DB::table('history_categories')->insert([
            'name' => 'Enregistrement d\'un Master:',
            'model' => 'User',
            'icon' => 'user-plus',
            'kind' => 1
        ]);//7


        DB::table('history_categories')->insert([
            'name' => 'Payement effectuée pour un Maitre: ( - avec une deficit)',
            'model' => 'User',
            'icon' => 'user-plus',
            'kind' => 0
        ]);//8
        DB::table('history_categories')->insert([
            'name' => 'Payement effectuée pour un Secretaire: ( - avec une deficit)',
            'model' => 'User',
            'icon' => 'user-plus',
            'kind' => 0
        ]);//9
        DB::table('history_categories')->insert([
            'name' => 'Payement effectuée pour un Administrateur: ( - avec une deficit)',
            'model' => 'User',
            'icon' => 'user-plus',
            'kind' => 0
        ]);//10
        DB::table('history_categories')->insert([
            'name' => 'Payement effectuée pour un Master: ( - avec une deficit)',
            'model' => 'User',
            'icon' => 'user-plus',
            'kind' => 0
        ]);//11

        DB::table('history_categories')->insert([
            'name' => 'Ajout dune matiére:',
            'model' => 'Subject',
            'icon' => 'edit',
            'kind' => 1
        ]);//12

        DB::table('history_categories')->insert([
            'name' => 'Liaison dune matiére avec une class:',
            'model' => 'Subject',
            'icon' => 'edit',
            'kind' => 1
        ]);//13

        DB::table('history_categories')->insert([
            'name' => 'Payement d\'un éleve ( - avec une deficit):',
            'model' => 'User',
            'icon' => 'money-bill-alt',
            'kind' => 0
        ]);//14

        DB::table('history_categories')->insert([
            'name' => 'Payement d\'un éleve ( 0 ):',
            'model' => 'User',
            'icon' => 'money-bill-alt',
            'kind' => 1
        ]);//15

        DB::table('history_categories')->insert([
            'name' => 'Payement effectuée pour un Maitre: ( + avec un benefits)',
            'model' => 'User',
            'icon' => 'user-plus',
            'kind' => 2
        ]);//16
        DB::table('history_categories')->insert([
            'name' => 'Payement effectuée pour un Secretaire: ( + avec un benefits)',
            'model' => 'User',
            'icon' => 'user-plus',
            'kind' => 2
        ]);//17
        DB::table('history_categories')->insert([
            'name' => 'Payement effectuée pour un Administrateur: ( + avec un benefits)',
            'model' => 'User',
            'icon' => 'user-plus',
            'kind' => 2
        ]);//18
        DB::table('history_categories')->insert([
            'name' => 'Payement effectuée pour un Master: ( + avec un benefits)',
            'model' => 'User',
            'icon' => 'user-plus',
            'kind' => 2
        ]);//19


        DB::table('history_categories')->insert([
            'name' => 'Payement effectuée pour un Maitre: ( 0 )',
            'model' => 'User',
            'icon' => 'user-plus',
            'kind' => 1
        ]);//20
        DB::table('history_categories')->insert([
            'name' => 'Payement effectuée pour un Secretaire: ( 0 )',
            'model' => 'User',
            'icon' => 'user-plus',
            'kind' => 1
        ]);//21
        DB::table('history_categories')->insert([
            'name' => 'Payement effectuée pour un Administrateur: ( 0 )',
            'model' => 'User',
            'icon' => 'user-plus',
            'kind' => 1
        ]);//22
        DB::table('history_categories')->insert([
            'name' => 'Payement effectuée pour un Master: ( 0 )',
            'model' => 'User',
            'icon' => 'user-plus',
            'kind' => 1
        ]);//23
        DB::table('history_categories')->insert([
            'name' => 'Un test a était a jouté: ( 0 )',
            'model' => 'Test',
            'icon' => 'file',
            'kind' => 1
        ]);//23
        DB::table('history_categories')->insert([
            'name' => 'Un test a était a linké a une class et une matiére: ( 0 )',
            'model' => 'Test',
            'icon' => 'file',
            'kind' => 1
        ]);//23


    }
}
