<?php

use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('subjects')->insert([
            'name' => 'English'
        ]);
        DB::table('subjects')->insert([
            'name' => 'Informatique'
        ]);
        DB::table('subjects')->insert([
            'name' => 'Sport'
        ]);
        DB::table('subjects')->insert([
            'name' => 'Mathématique'
        ]);

        DB::table('subjects')->insert([
            'name' => 'الرياضيات'
        ]);
        DB::table('subjects')->insert([
            'name' => 'التربية الفنية'
        ]);
        DB::table('subjects')->insert([
            'name' => 'النشاط العلمي'
        ]);
        DB::table('subjects')->insert([
            'name' => 'التربية الإسلامية'
        ]);
        DB::table('subjects')->insert([
            'name' => 'اللغة العربية - القراءة'
        ]);
        DB::table('subjects')->insert([
            'name' => 'اللغة العربية - الإملاء'
        ]);
        DB::table('subjects')->insert([
            'name' => 'اللغة العربية - الشكل'
        ]);
        DB::table('subjects')->insert([
            'name' => 'اللغة العربية - التراكيب'
        ]);
        DB::table('subjects')->insert([
            'name' => 'اللغة العربية - الصرف والتحويل'
        ]);
        DB::table('subjects')->insert([
            'name' => 'اللغة العربية - فهم المقروء'
        ]);
        DB::table('subjects')->insert([
            'name' => 'اللغة العربية - إنشاء'
        ]);
        DB::table('subjects')->insert([
            'name' => 'الاجتماعيات - التاريخ'
        ]);
        DB::table('subjects')->insert([
            'name' => 'الاجتماعيات - الجغرافية'
        ]);
        DB::table('subjects')->insert([
            'name' => 'الاجتماعيات - التربية على المواطنة'
        ]);
        DB::table('subjects')->insert([
            'name' => 'Français - Activités de prod. écrite'
        ]);
        DB::table('subjects')->insert([
            'name' => 'Français - Lexique'
        ]);
        DB::table('subjects')->insert([
            'name' => 'Français - Grammaire'
        ]);
        DB::table('subjects')->insert([
            'name' => 'Français - Conjugaison'
        ]);
        DB::table('subjects')->insert([
            'name' => 'Français - Orthographe/Dictée'
        ]);
        DB::table('subjects')->insert([
            'name' => 'Français - Activités de Lecture'
        ]);
        DB::table('subjects')->insert([
            'name' => 'Français - communication et actes de langage'
        ]);
        DB::table('subjects')->insert([
            'name' => 'Français - Poésie/lecture/diction'
        ]);
    }
}
