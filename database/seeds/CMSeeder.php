<?php

use Illuminate\Database\Seeder;
use App\{
  CMS,
  Page,
  Partial,
  Component,
  Pagepartial,
  Particompo
};
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

      $results =  CMS::create([
            'txt' => 'Navigations',
            'slug' => 'navigation',
            'children' => [

                [
                    'txt' => 'Les prix',
                    'slug' => 'prices',
                ],
                [
                    'txt' => 'Alerts',
                    'slug' => 'alerts',
                ],
                [
                    'txt' => 'Sur nous',
                    'slug' => 'about',
                ],
                [
                    'txt' => 'Contactez nous',
                    'slug' => 'contact',
                ]

            ]
        ]);
      /*Partials*/

      $box = Partial::create(['slug' => 'box']);
      $jumbotron = Partial::create(['slug' => 'jumbotron']);
      $time_line = Partial::create(['slug' => 'time_line']);


      /*Componenets*/

      $pricing_table = Component::create(['slug' => 'pricing_table']);
      $h1 = Component::create(['slug' => 'h1']);
      $p = Component::create(['slug' => 'p']);
      $c_f = Component::create(['slug' => 'contact_form']);
      $ii_tl = Component::create(['slug' => 'item_image_time_line']);

/****************************PRICE*****************/
      $prices = CMS::where('slug', 'prices')->first();


      $page = Page::create([
        'title' => $prices->txt,
        'cms_id' =>  $prices->id
       ]);


       $page_partial = Pagepartial::create([
          'page_id' => $page->id,
          'partial_id' =>  $box->id,
          'json' => '{"title":"Les prix denseinement", "class":"col-md-6"}'
         ]);

       Particompo::create([
            'component_id' => $pricing_table->id,
            'page_partial_id' =>  $page_partial->id,
            'json' => '{
                         "table": {
                           "th": [
                             "Classes",
                             "Prix denregistremement",
                             "Prix dassurence",
                             "Prix montielle"
                           ],
                           "tr": [
                             [
                               "Maternelle",
                               "100 Dh",
                               "200 Dh",
                               "250 Dh"
                             ],
                             [
                               "Primaire depuis class 1 jusqua 4",
                               "100 Dh",
                               "200 Dh",
                               "350 Dh"
                             ],
                             [
                               "Primaire depuis class 5 jusqua 6",
                               "100 Dh",
                               "200 Dh",
                               "400 Dh"
                             ]
                           ]
                         }
                       }'
           ]);



       $page_partial =  Pagepartial::create([
          'page_id' => $page->id,
          'partial_id' =>  $box->id,
          'json' => '{"title":"Les prix de transport", "class":"col-md-6"}'
         ]);

       Particompo::create([
            'component_id' => $pricing_table->id,
            'page_partial_id' =>  $page_partial->id,
            'json' => '{
                         "table": {
                           "th": [
                             "Classes",
                             "Prix dassurence",
                             "Prix montielle"
                           ],
                           "tr": [
                             [
                               "Pour tout",
                               "200 Dh",
                               "à partire de 200 Dh"
                             ]
                           ]
                         }
                       }'
           ]);





/*********************About US***************************/

      $about = CMS::where('slug', 'about')->first();

      $page = Page::create([
        'title' => $about->txt,
        'cms_id' =>  $about->id
       ]);

     $page_partial = Pagepartial::create([
        'page_id' => $page->id,
        'partial_id' =>  $jumbotron->id,
        'json' => '[]'
       ]);

     Particompo::create([
          'component_id' => $h1->id,
          'page_partial_id' =>  $page_partial->id,
          'json' => '{"h1":"Ecole primaire fatima azzahrae"}'
         ]);

     Particompo::create([
          'component_id' => $p->id,
          'page_partial_id' =>  $page_partial->id,
          'json' => '{"p":"La seule ecole dans allal tazi qui fait une education de allal tazi."}'
         ]);


    /*********************Contact***************************/

          $contact = CMS::where('slug', 'contact')->first();

          $page = Page::create([
            'title' => $contact->txt,
            'cms_id' =>  $contact->id
           ]);

         $page_partial = Pagepartial::create([
            'page_id' => $page->id,
            'partial_id' =>  $box->id,
            'json' => '{"title":"Contact nous ici !" }'
           ]);

         Particompo::create([
              'component_id' => $c_f->id,
              'page_partial_id' =>  $page_partial->id,
              'json' => '[]'
             ]);
     /*********************Contact***************************/

         $alerts = CMS::where('slug', 'alerts')->first();

         $page = Page::create([
           'title' => $alerts->txt,
           'cms_id' =>  $alerts->id
          ]);

        $page_partial = Pagepartial::create([
           'page_id' => $page->id,
           'partial_id' =>  $time_line->id,
           'json' => '{"title":"Contact nous ici !" }'
          ]);



        Particompo::create([
             'component_id' => $ii_tl->id,
             'page_partial_id' =>  $page_partial->id,

             'json' => '{"img":"africa_code_week.jpg","body":"Ecole fatima azzahrae entre dans un chalenge afriquane de programation","title":"Afriqua code week","icon":"code","time":"'.Carbon::now().'" }'
            ]);


        }

}
