<?php

use Illuminate\Database\Seeder;

use App\{
  Unity,
  Subunity,
  Subject
};

class UnitySubunitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $unities = [
          'English',
          'Informatique',
          'Sport',
          'Mathématique',
          'الرياضيات',
          'التربية الفنية',
          'التربية الإسلامية',
          'اللغة العربة',
          'Francais'
        ];

        $subunities = [
          'تمارين',
          'دروس'
        ];


        $subjects = [
          'الدعم',
          'الفهم',
        ];

        foreach ($unities as $key => $value) {
          // code...
          $unity = Unity::create([
            'name' => $value
          ]);

          foreach ($subunities as $k => $v) {
            // code...
            $subunity = Subunity::create([
              'name' => $value.' '.$v,
              'unity_id' => $unity->id
            ]);

            foreach ($subjects as $sk => $sv) {
              // code...
              $subject = Subject::create([
                'name' => $value.' '.$v.' '.$sv,
                'subunity_id' => $subunity->id
              ]);

            }

          }

        }

    }
}
