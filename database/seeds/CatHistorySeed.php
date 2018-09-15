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

        //role -> what role can see this history

        /*

        DB::table('history_categories')->insert([

            'name' => You shoult be a big name ( + if benefit from money):',
            'model' => 'Wich model concerneb by this history',
            'icon' => 'ICON about this model',
            'kind' => number - ok kind if benifits,
            'role' => number -which one can see this history
        ]);//1



        */

        DB::table('history_categories')->insert([
            'name' => 'Payement d\'un éleve ( + avec un benefits):',
            'model' => 'User',
            'icon' => 'money-bill-alt',
            'kind' => 2,
            'role' => 4
        ]);//1

        DB::table('history_categories')->insert([
            'name' => 'Enregistrement d\'un éleve :',
            'model' => 'User',
            'icon' => 'graduation-cap',
            'kind' => 1,
            'role' => 4
        ]);//2

        DB::table('history_categories')->insert([
            'name' => 'Enregistrement d\'un parent:',
            'model' => 'User',
            'icon' => 'user-plus',
            'kind' => 1,
            'role' => 4
        ]);//3

        DB::table('history_categories')->insert([
            'name' => 'Enregistrement d\'un Maitre:',
            'model' => 'User',
            'icon' => 'user-plus',
            'kind' => 1,
            'role' => 4
        ]);//4
        DB::table('history_categories')->insert([
            'name' => 'Enregistrement d\'un Secretaire:',
            'model' => 'User',
            'icon' => 'user-plus',
            'kind' => 1,
            'role' => 5
        ]);//5
        DB::table('history_categories')->insert([
            'name' => 'Enregistrement d\'un Administrateur:',
            'model' => 'User',
            'icon' => 'user-plus',
            'kind' => 1,
            'role' => 6
        ]);//6
        DB::table('history_categories')->insert([
            'name' => 'Enregistrement d\'un Master:',
            'model' => 'User',
            'icon' => 'user-plus',
            'kind' => 1,
            'role' => 6
        ]);//7


        DB::table('history_categories')->insert([
            'name' => 'Payement effectuée pour un Maitre: ( - avec une deficit)',
            'model' => 'User',
            'icon' => 'user-plus',
            'kind' => 0,
            'role' => 4
        ]);//8
        DB::table('history_categories')->insert([
            'name' => 'Payement effectuée pour un Secretaire: ( - avec une deficit)',
            'model' => 'User',
            'icon' => 'user-plus',
            'kind' => 0,
            'role' => 5
        ]);//9
        DB::table('history_categories')->insert([
            'name' => 'Payement effectuée pour un Administrateur: ( - avec une deficit)',
            'model' => 'User',
            'icon' => 'user-plus',
            'kind' => 0,
            'role' => 6
        ]);//10
        DB::table('history_categories')->insert([
            'name' => 'Payement effectuée pour un Master: ( - avec une deficit)',
            'model' => 'User',
            'icon' => 'user-plus',
            'kind' => 0,
            'role' => 6
        ]);//11

        DB::table('history_categories')->insert([
            'name' => 'Ajout dune matiére:',
            'model' => 'Subject',
            'icon' => 'edit',
            'kind' => 1,
            'role' => 3
        ]);//12

        DB::table('history_categories')->insert([
            'name' => 'Liaison dune matiére avec une class:',
            'model' => 'Subject',
            'icon' => 'edit',
            'kind' => 1,
            'role' => 1
        ]);//13

        DB::table('history_categories')->insert([
            'name' => 'Payement d\'un éleve ( - avec une deficit):',
            'model' => 'User',
            'icon' => 'money-bill-alt',
            'kind' => 0,
            'role' => 4
        ]);//14

        DB::table('history_categories')->insert([
            'name' => 'Payement d\'un éleve ( 0 ):',
            'model' => 'User',
            'icon' => 'money-bill-alt',
            'kind' => 1,
            'role' => 4
        ]);//15

        DB::table('history_categories')->insert([
            'name' => 'Payement effectuée pour un Maitre: ( + avec un benefits)',
            'model' => 'User',
            'icon' => 'user-plus',
            'kind' => 2,
            'role' => 4
        ]);//16
        DB::table('history_categories')->insert([
            'name' => 'Payement effectuée pour un Secretaire: ( + avec un benefits)',
            'model' => 'User',
            'icon' => 'user-plus',
            'kind' => 2,
            'role' => 5
        ]);//17
        DB::table('history_categories')->insert([
            'name' => 'Payement effectuée pour un Administrateur: ( + avec un benefits)',
            'model' => 'User',
            'icon' => 'user-plus',
            'kind' => 2,
            'role' => 6
        ]);//18
        DB::table('history_categories')->insert([
            'name' => 'Payement effectuée pour un Master: ( + avec un benefits)',
            'model' => 'User',
            'icon' => 'user-plus',
            'kind' => 2,
            'role' => 6
        ]);//19


        DB::table('history_categories')->insert([
            'name' => 'Payement effectuée pour un Maitre: ( 0 )',
            'model' => 'User',
            'icon' => 'user-plus',
            'kind' => 1,
            'role' => 4
        ]);//20
        DB::table('history_categories')->insert([
            'name' => 'Payement effectuée pour un Secretaire: ( 0 )',
            'model' => 'User',
            'icon' => 'user-plus',
            'kind' => 1,
            'role' => 5
        ]);//21
        DB::table('history_categories')->insert([
            'name' => 'Payement effectuée pour un Administrateur: ( 0 )',
            'model' => 'User',
            'icon' => 'user-plus',
            'kind' => 1,
            'role' => 6
        ]);//22
        DB::table('history_categories')->insert([
            'name' => 'Payement effectuée pour un Master: ( 0 )',
            'model' => 'User',
            'icon' => 'user-plus',
            'kind' => 1,
            'role' => 6
        ]);//23
        DB::table('history_categories')->insert([
            'name' => 'Un test a était a jouté:',
            'model' => 'Test',
            'icon' => 'file',
            'kind' => 1,
            'role' => 3
        ]);//24
        DB::table('history_categories')->insert([
            'name' => 'Un test a était a linké a une class et une matiére:',
            'model' => 'Test',
            'icon' => 'file',
            'kind' => 1,
            'role' => 1
        ]);//25
        DB::table('history_categories')->insert([
            'name' => 'Liaison dune fourniture avec une class:',
            'model' => 'Fourniture',
            'icon' => 'edit',
            'kind' => 1,
            'role' => 1
        ]);//26
        DB::table('history_categories')->insert([
            'name' => 'Un cours a était ajouté:',
            'model' => 'Course',
            'icon' => 'book',
            'kind' => 1,
            'role' => 1
        ]);//27
        DB::table('history_categories')->insert([
            'name' => 'Un subcour a etait crée est ajouté a un coure:',
            'model' => 'Subcourse',
            'icon' => 'book',
            'kind' => 1,
            'role' => 1
        ]);//28
        DB::table('history_categories')->insert([
            'name' => 'Un subcour a etait linké a un coure:',
            'model' => 'Subcourse',
            'icon' => 'book',
            'kind' => 1,
            'role' => 1
        ]);//29
        DB::table('history_categories')->insert([
            'name' => 'Un subcour a etait linké a un coure:',
            'model' => 'Teatchification',
            'icon' => 'pen',
            'kind' => 1,
            'role' => 1
        ]);//30
        DB::table('history_categories')->insert([
            'name' => 'Une demande a etait effectué:',
            'model' => 'Demande',
            'icon' => 'angle-double-right',
            'kind' => 1,
            'role' => 2
        ]);//31

        DB::table('history_categories')->insert([
            'name' => 'Une demande a etait Accepté:',
            'model' => 'Demande',
            'icon' => 'check',
            'kind' => 2,
            'role' => 1
        ]);//32

        DB::table('history_categories')->insert([
            'name' => 'Une Emploi du temps a etait linké maitre - matiére:',
            'model' => 'Calendarteatchification',
            'icon' => 'calendar',
            'kind' => 1,
            'role' => 1
        ]);//33

        DB::table('history_categories')->insert([
            'name' => 'Une Emploi du temps a etait créé:',
            'model' => 'Calendar',
            'icon' => 'calendar',
            'kind' => 1,
            'role' => 1
        ]);//34

        /****************Hna 3ad gadina l7ma9****************/

        DB::table('history_categories')->insert([
            'name' => 'Une Upgradation a etait effectué:',
            'model' => 'User',
            'icon' => 'user',
            'kind' => 1,
            'role' => 4
        ]);//35

        DB::table('history_categories')->insert([
            'name' => 'Une Matiére a etait linké a un maitre:',
            'model' => 'Teatchification',
            'icon' => 'link',
            'kind' => 1,
            'role' => 4
        ]);//36


    }
}
