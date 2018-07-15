<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use MaddHatter\LaravelFullcalendar\Facades\Calendar;

use App\Calendar as Calendinar;

use Carbon\Carbon;

class CalendarController extends Controller
{
    //

    public function index()
    {
        $calendar_events = Calendinar::all();
        return view('back.calendars.index', compact('calendar_events'));
    }

    public function create()
    {
        return view('back.calendars.create');
    }

    public function store(Request $request)
    {
        $calendar_event = new Calendinar();
        $calendar_event->title            = $request->input("title");
        $calendar_event->start_date            = $request->input("start_date");
        $calendar_event->end_date              = $request->input("end_date");
        $calendar_event->is_all_day       = (bool)$request->input("is_all_day");
        $calendar_event->background_color = $request->input("background_color");
        $calendar_event->save();
        return redirect()->route('calendars.index')->with('message', 'Item created successfully.');
    }

    public function show($cal)
    {
        $calendar_event = Calendinar::findOrFail($cal);
        return view('back.calendars.show', compact('calendar_event'));
    }

    public function edit($cal)
    {
        $calendar_event = Calendinar::findOrFail($cal);
        return view('back.calendars.edit', compact('calendar_event'));
    }

    public function update(Request $request, $cal)
    {
        $calendar_event = Calendinar::findOrFail($id);
        $calendar_event->title            = $request->input("title");
        $calendar_event->start_date            = $request->input("start_date");
        $calendar_event->end_date              = $request->input("end_date");
        $calendar_event->is_all_day       = $request->input("is_all_day");
        $calendar_event->background_color = $request->input("background_color");
        $calendar_event->save();
        return redirect()->route('back.calendars.index')->with('message', 'Item updated successfully.');
    }

    public function destroy($cal)
    {
        $calendar_event = Calendinar::findOrFail($id);
        $calendar_event->delete();
        return redirect()->route('back.calendars.index')->with('message', 'Item deleted successfully.');
    }


public function test2()
            {
                $events = [];

                $data = Calendinar::all();

                if($data->count()) {
                    foreach ($data as $key => $value) {
                        $events[] = Calendar::event(
                            $value->title,
                            $value->is_full_day,
                            new \DateTime($value->start_date),
                            new \DateTime($value->end_date),
                            null,
                            // Add color and link on event
                         [
                             'color' => '#ff0000',
                             'url' => 'pass here url and any route',
                         ]
                        );
                    }
                }

                $calendar = Calendar::addEvents($events)->setOptions([ //set fullcalendar options
                    'firstDay' => 1
                ])->setCallbacks([ //set fullcalendar callback options (will not be JSON encoded)
                    'viewRender' => 'function() {

/*
                        var myEvent = {
                          title:"my new event",
                          allDay: true,
                          start: new Date(),
                          end: new Date( new Date().getTime() +  60 * 60 * 1000),
                        dow: [1,2]
                        };

                        calendar.fullCalendar( "renderEvent", myEvent );

*/

                    }'
                ]);


                return view('back.calendars.test2', compact('calendar'));
            }



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

                $calendar = Calendar::addEvents($events)
                /*    
                    ->addEvent($eloquentEvent, [ //set custom color fo this event
                        'color' => '#800',
                        'editable' => true,
                        'dropable' => true
                    ])
                */


                    ->setOptions([ //set fullcalendar options
                        'firstDay' => 1,
                        'header' => [
                            'left' => 'prev,next today',
                            'center' => 'title',
                            'right' => 'month,agendaWeek,agendaDay'
                            ],
                        'buttonText' => [
                            'today' => 'today',
                            'month' => 'month',
                            'week' => 'week',
                            'day' => 'day'
                            ],
                        'editable' => true,
                        'dropable' => true,
                    ])->setCallbacks([ //set fullcalendar callback options (will not be JSON encoded)
                        'viewRender' => 'function() {alert("Callbacks!");}',
                        'drop' => "function (date, allDay) { // this function is called when something is dropped
                                alert('something is droped');
                                    var date = new Date()
                                    var d    = date.getDate(),
                                        m    = date.getMonth(),
                                        y    = date.getFullYear();
                                // retrieve the dropped element's stored Event Object
                                var originalEventObject = $(this).data('eventObject')
                        
                                // we need to copy it, so that multiple events don't have a reference to the same object
                                var copiedEventObject = $.extend({}, originalEventObject)
                        
                                // assign it the date that was reported
                                copiedEventObject.start           = date
                                copiedEventObject.allDay          = allDay
                                copiedEventObject.backgroundColor = $(this).css('background-color')
                                copiedEventObject.borderColor     = $(this).css('border-color')
                        
                                // render the event on the calendar
                                // the last `true` argument determines if the event \"sticks\" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
                               $(\"[id^='calendar']\").fullCalendar('renderEvent', copiedEventObject, true)
                        
                                // is the \"remove after drop\" checkbox checked?
                                if ($('#drop-remove').is(':checked')) {
                                  // if so, remove the element from the \"Draggable Events\" list
                                  $(this).remove()
                                }
                        
                              }"
                    ])


                    ;


                return view('back.calendars.test', compact('calendar'));
            }


}
