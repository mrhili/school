<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
/*
use MaddHatter\LaravelFullcalendar\Event;

class Calendar extends Model implements Event
{
 */   //

use MaddHatter\LaravelFullcalendar\Event;
class Calendar extends Model
{

    protected $fillable = ['url','title','start_date','end_date',
     'is_all_day', 'background_color', 'repeated', 'holiday', 'repeated_type', 'end_repeated_date', 'role'
   ];



   /**
     * Get the event's title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }
    /**
     * Is it an all day event?
     *
     * @return bool
     */
    public function isAllDay()
    {
        return $this->is_all_day;
    }
    /**
     * Get the start time
     *
     * @return DateTime
     */
    public function getStart()
    {
        return $this->start_date;
    }
    /**
     * Get the end time
     *
     * @return DateTime
     */
    public function getEnd()
    {
        return $this->end_date;
    }
    /**
     * Get the event's ID
     *
     * @return int|string|null
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * Optional FullCalendar.io settings for this event
     *
     * @return array
     */
    public function getEventOptions()
    {
        return [
            'color' => $this->background_color,
        ];
    }


    public function teatchifications()
    {
        return $this->belongsToMany('App\Teatchification')->withPivot('year_id');
    }




}
