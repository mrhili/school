<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use MaddHatter\LaravelFullcalendar\Facades\Calendar;

use App\Calendar as Calendinar;

use Carbon\Carbon;

use Application;

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

      if(Carbon::parse( $request->start_date ) < Carbon::parse( $request->end_date ) ){

      }else{
        return back()->withInput();
      }

      $array = [
        'title' => $request->title,
        'start_date' => $request->start_date,
        'end_date' => $request->end_date,
        'background_color' => $request->background_color,
        'role' => $request->role
      ];
      if( $request->is_all_day ){
        $array['is_all_day'] = true;
      }else{
        $array['is_all_day'] = false;
      }

      if( $request->holiday ){
        $array['holiday'] = true;
      }else{
        $array['holiday'] = false;
      }

      if( $request->repeated ){

        if(! $request->validate([
            'repeated_type' => 'required',
            'end_repeated_type' => 'required',
          ])
        ){
            return back()->withInput();
        }
        $array['repeated'] = true;
        $array['repeated_type'] = $request->repeated_type;
        $array['end_repeated_type'] = $request->end_repeated_type;
      }else{
        $array['repeated'] = false;
        $array['repeated_type'] = null;
        $array['end_repeated_date'] = null;
      }

      $calendinar = Calendinar::create($array);

      return redirect()->route('calendars.index');
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

      $data = Calendinar::where('repeated', false)->get();

      if($data->count()) {
          foreach ($data as $value) {
              $events[] = Calendar::event(
                  $value->title,
                  $value->is_full_day,
                  new Carbon($value->start_date),
                  new Carbon($value->end_date),
                  null,
                  // Add color and link on event
               [
                   'color' => $value->background_color,
                   'url' => 'pass here url and any route',
               ]

              );
          }
      }

      $datas_repeated = Calendinar::where('repeated', true)->get();

      $events = Application::repeatedEvent($datas_repeated, $events);


                $calendar = Calendar::addEvents($events)
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
                ])


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
