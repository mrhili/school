<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use MaddHatter\LaravelFullcalendar\Facades\Calendar;

use App\Calendar as Calendinar;

class CalendarController extends Controller
{
    //

       public function test()
            {
                $events = [];
                $data = Calendinar::all();
                if($data->count()) {
                    foreach ($data as $key => $value) {
                        $events[] = Calendar::event(
                            $value->title,
                            true,
                            new \DateTime($value->start_date),
                            new \DateTime($value->end_date.' +1 day'),
                            null,
                            // Add color and link on event
                         [
                             'color' => '#ff0000',
                             'url' => 'pass here url and any route',
                         ]
                        );
                    }
                }
                $calendar = Calendar::addEvents($events);
                return view('back.calendars.test', compact('calendar'));
            }


}
