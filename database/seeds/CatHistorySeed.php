<?php

use Illuminate\Database\Seeder;

class CatHistorySeed extends Seeder
{
    /**
     * Rthe database seeds.
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
            'name' => 'Payement d\'éleve ( + avec benefits):',
            'model' => 'User',
            'icon' => 'money',
            'kind' => 2,
            'role' => 4
        ]);//1

        DB::table('history_categories')->insert([
            'name' => 'Enregistrement d\'éleve :',
            'model' => 'User',
            'icon' => 'graduation-cap',
            'kind' => 1,
            'role' => 4
        ]);//2

        DB::table('history_categories')->insert([
            'name' => 'Enregistrement d\'parent:',
            'model' => 'User',
            'icon' => 'user-plus',
            'kind' => 1,
            'role' => 4
        ]);//3

        DB::table('history_categories')->insert([
            'name' => 'Enregistrement d\'Maitre:',
            'model' => 'User',
            'icon' => 'user-plus',
            'kind' => 1,
            'role' => 4
        ]);//4
        DB::table('history_categories')->insert([
            'name' => 'Enregistrement d\'Secretaire:',
            'model' => 'User',
            'icon' => 'user-plus',
            'kind' => 1,
            'role' => 5
        ]);//5
        DB::table('history_categories')->insert([
            'name' => 'Enregistrement d\'Administrateur:',
            'model' => 'User',
            'icon' => 'user-plus',
            'kind' => 1,
            'role' => 6
        ]);//6
        DB::table('history_categories')->insert([
            'name' => 'Enregistrement d\'Master:',
            'model' => 'User',
            'icon' => 'user-plus',
            'kind' => 1,
            'role' => 6
        ]);//7


        DB::table('history_categories')->insert([
            'name' => 'Payement pour Maitre: ( - avec deficit)',
            'model' => 'User',
            'icon' => 'user-plus',
            'kind' => 0,
            'role' => 4
        ]);//8
        DB::table('history_categories')->insert([
            'name' => 'Payement pour Secretaire: ( - avec deficit)',
            'model' => 'User',
            'icon' => 'user-plus',
            'kind' => 0,
            'role' => 5
        ]);//9
        DB::table('history_categories')->insert([
            'name' => 'Payement pour Administrateur: ( - avec deficit)',
            'model' => 'User',
            'icon' => 'user-plus',
            'kind' => 0,
            'role' => 6
        ]);//10
        DB::table('history_categories')->insert([
            'name' => 'Payement pour Master: ( - avec deficit)',
            'model' => 'User',
            'icon' => 'user-plus',
            'kind' => 0,
            'role' => 6
        ]);//11

        DB::table('history_categories')->insert([
            'name' => 'Ajout dmatiére:',
            'model' => 'Subject',
            'icon' => 'edit',
            'kind' => 1,
            'role' => 3
        ]);//12

        DB::table('history_categories')->insert([
            'name' => 'Liaison dmatiére avec class:',
            'model' => 'Subject',
            'icon' => 'edit',
            'kind' => 1,
            'role' => 1
        ]);//13

        DB::table('history_categories')->insert([
            'name' => 'Payement d\'éleve ( - avec deficit):',
            'model' => 'User',
            'icon' => 'money',
            'kind' => 0,
            'role' => 4
        ]);//14

        DB::table('history_categories')->insert([
            'name' => 'Payement d\'éleve ( 0 ):',
            'model' => 'User',
            'icon' => 'money',
            'kind' => 1,
            'role' => 4
        ]);//15

        DB::table('history_categories')->insert([
            'name' => 'Payement pour Maitre: ( + avec benefits)',
            'model' => 'User',
            'icon' => 'user-plus',
            'kind' => 2,
            'role' => 4
        ]);//16
        DB::table('history_categories')->insert([
            'name' => 'Payement pour Secretaire: ( + avec benefits)',
            'model' => 'User',
            'icon' => 'user-plus',
            'kind' => 2,
            'role' => 5
        ]);//17
        DB::table('history_categories')->insert([
            'name' => 'Payement pour Administrateur: ( + avec benefits)',
            'model' => 'User',
            'icon' => 'user-plus',
            'kind' => 2,
            'role' => 6
        ]);//18
        DB::table('history_categories')->insert([
            'name' => 'Payement pour Master: ( + avec benefits)',
            'model' => 'User',
            'icon' => 'user-plus',
            'kind' => 2,
            'role' => 6
        ]);//19


        DB::table('history_categories')->insert([
            'name' => 'Payement pour Maitre: ( 0 )',
            'model' => 'User',
            'icon' => 'user-plus',
            'kind' => 1,
            'role' => 4
        ]);//20
        DB::table('history_categories')->insert([
            'name' => 'Payement pour Secretaire: ( 0 )',
            'model' => 'User',
            'icon' => 'user-plus',
            'kind' => 1,
            'role' => 5
        ]);//21
        DB::table('history_categories')->insert([
            'name' => 'Payement pour Administrateur: ( 0 )',
            'model' => 'User',
            'icon' => 'user-plus',
            'kind' => 1,
            'role' => 6
        ]);//22
        DB::table('history_categories')->insert([
            'name' => 'Payement pour Master: ( 0 )',
            'model' => 'User',
            'icon' => 'user-plus',
            'kind' => 1,
            'role' => 6
        ]);//23
        DB::table('history_categories')->insert([
            'name' => 'ajout dtest:',
            'model' => 'Test',
            'icon' => 'file',
            'kind' => 1,
            'role' => 3
        ]);//24
        DB::table('history_categories')->insert([
            'name' => 'linkage de test dans class - matier:',
            'model' => 'Test',
            'icon' => 'file',
            'kind' => 1,
            'role' => 1
        ]);//25
        DB::table('history_categories')->insert([
            'name' => 'Liaison dfourniture avec class:',
            'model' => 'Fourniture',
            'icon' => 'edit',
            'kind' => 1,
            'role' => 1
        ]);//26
        DB::table('history_categories')->insert([
            'name' => 'cours a était ajouté:',
            'model' => 'Course',
            'icon' => 'book',
            'kind' => 1,
            'role' => 1
        ]);//27
        DB::table('history_categories')->insert([
            'name' => 'ajout dsubcourse a cour:',
            'model' => 'Subcourse',
            'icon' => 'book',
            'kind' => 1,
            'role' => 1
        ]);//28
        DB::table('history_categories')->insert([
            'name' => 'Linkage cour subcourse:',
            'model' => 'Subcourse',
            'icon' => 'book',
            'kind' => 1,
            'role' => 1
        ]);//29

        /************PROBLEMME*****************/
        DB::table('history_categories')->insert([
            'name' => 'Linkage cour subcourse:',
            'model' => 'Teatchification',
            'icon' => 'book',
            'kind' => 1,
            'role' => 1
        ]);//30
        DB::table('history_categories')->insert([
            'name' => 'demande :',
            'model' => 'Demande',
            'icon' => 'angle-double-right',
            'kind' => 1,
            'role' => 2
        ]);//31

        DB::table('history_categories')->insert([
            'name' => 'accepte de demande :',
            'model' => 'Demande',
            'icon' => 'check',
            'kind' => 2,
            'role' => 1
        ]);//32

        DB::table('history_categories')->insert([
            'name' => 'linkage  maitre matier pour emplois du temp:',
            'model' => 'Calendarteatchification',
            'icon' => 'calendar',
            'kind' => 1,
            'role' => 1
        ]);//33

        DB::table('history_categories')->insert([
            'name' => 'Creation demplois du temp:',
            'model' => 'Calendar',
            'icon' => 'calendar',
            'kind' => 1,
            'role' => 1
        ]);//34

        /****************Hna 3ad gadina l7ma9****************/

        DB::table('history_categories')->insert([
            'name' => 'Upgradation dCadre:',
            'model' => 'User',
            'icon' => 'user',
            'kind' => 1,
            'role' => 4
        ]);//35

        DB::table('history_categories')->insert([
            'name' => 'Linkage de matiére:',
            'model' => 'Teatchification',
            'icon' => 'link',
            'kind' => 1,
            'role' => 4
        ]);//36

        DB::table('history_categories')->insert([
            'name' => 'Creation de bil :',
            'model' => 'Bil',
            'icon' => 'money',
            'kind' => 1,
            'role' => 4
        ]);//37

        DB::table('history_categories')->insert([
            'name' => 'Generation de billage:',
            'model' => 'Bil',
            'icon' => 'money',
            'kind' => 1,
            'role' => 4
        ]);//38

        /*************TOADD********************/

        DB::table('history_categories')->insert([
            'name' => 'refusement de billage:',
            'model' => 'Bil',
            'icon' => 'money',
            'kind' => 1,
            'role' => 1
        ]);//39

        DB::table('history_categories')->insert([
            'name' => 'payement de billage:',
            'model' => 'Biling',
            'icon' => 'money',
            'kind' => 2,
            'role' => 1
        ]);//40

        DB::table('history_categories')->insert([
            'name' => 'benefit enregistrer dans le wallet:',
            'model' => 'Wallet',
            'icon' => 'money',
            'kind' => 2,
            'role' => 6
        ]);//41

        DB::table('history_categories')->insert([
            'name' => 'deficit enregistrer dans le wallet:',
            'model' => 'Wallet',
            'icon' => 'money',
            'kind' => 0,
            'role' => 6
        ]);//42

        DB::table('history_categories')->insert([
            'name' => 'prise dsomme :',
            'model' => 'Transparancy',
            'icon' => 'money',
            'kind' => 2,
            'role' => 4
        ]);//43

        DB::table('history_categories')->insert([
            'name' => 'payement dsomme :',
            'model' => 'Transparancy',
            'icon' => 'money',
            'kind' => 0,
            'role' => 4
        ]);//44

        DB::table('history_categories')->insert([
            'name' => 'switch de prise de biling :',
            'model' => 'Biling',
            'icon' => 'hand-lizard-o',
            'kind' => 1,
            'role' => 2
        ]);//45

        DB::table('history_categories')->insert([
            'name' => 'Linkage course dans matiere class :',
            'model' => 'Courseyearsubclass',
            'icon' => 'hand-lizard-o',
            'kind' => 1,
            'role' => 4
        ]);//46
        DB::table('history_categories')->insert([
            'name' => 'ajout dun material deficite :',
            'model' => 'Materialdeficite',
            'icon' => 'exclamation',
            'kind' => 0,
            'role' => 5
        ]);//47

        DB::table('history_categories')->insert([
            'name' => 'Nouveau ordering dun eleve :',
            'model' => 'User',
            'icon' => 'random',
            'kind' => 1,
            'role' => 4
        ]);//48

        DB::table('history_categories')->insert([
            'name' => 'Ajout dun loi :',
            'model' => 'Rule',
            'icon' => 'list',
            'kind' => 1,
            'role' => 4
        ]);//49

        DB::table('history_categories')->insert([
            'name' => 'Prise dune loi :',
            'model' => 'Ruleholder',
            'icon' => 'list',
            'kind' => 1,
            'role' => 4
        ]);//50

        DB::table('history_categories')->insert([
            'name' => 'Supression dune prise de loi :',
            'model' => 'Ruleholder',
            'icon' => 'list',
            'kind' => 1,
            'role' => 4
        ]);//51

        DB::table('history_categories')->insert([
            'name' => 'Supression dune loi et une rejection de la prise :',
            'model' => 'Rule',
            'icon' => 'list',
            'kind' => 1,
            'role' => 4
        ]);//52


        /*****************/

        DB::table('history_categories')->insert([
            'name' => 'Envoi dun message :',
            'model' => 'Contact',
            'icon' => 'envelope',
            'kind' => 1,
            'role' => 4
        ]);//53


    }
}
