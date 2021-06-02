<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function event()
    {

      $event = Event::all();

       return view('users.dashboard.event.event',
       [
        
           'event'=>$event

       ]);


    }

    public function addEventForm()
    {

       return view('users.dashboard.event.eventadd');

    }

    public function addEventData(Request $request)
    {

      if($request->isMethod('post'))
      {

         $request->validate
         ([
              'event_name' => 'required',
              'start_date' => 'required',
              'event_type' => 'required',
              'end_date' => 'required',
         ]);

         $event = new Event;

         $event->eventname = $request->event_name;
         $event->startdate = date('Y-m-d',strtotime($request->start_date));
         $event->enddate = date('Y-m-d',strtotime($request->end_date));
         $event->event_type = $request->event_type;
         $event->status = $request->status;

         $data = $event->save();

         if($data)
         {

            return redirect('event')->with('msg','Event Added Sucessfully.');

         }
         else
         {

            return redirect('event-form')->with('msg','Event Not Added Sucessfully.');


         }

         


      }


    }

    public function editEvent($id)
    {

       $event = Event::find($id);

       return view('users.dashboard.event.eventedit',
       [
        
         'event'=>$event

       ]);

    }

    public function updateEvent(Request $request,$id)
    {

      if($request->isMethod('post'))
      {

         $request->validate
         ([
              'event_name' => 'required',
              'start_date' => 'required',
              'event_type' => 'required',
              'end_date' => 'required',
         ]);

         $event = Event::find($id);

         $event->eventname = $request->event_name;
         $event->startdate = date('Y-m-d',strtotime($request->start_date));
         $event->enddate = date('Y-m-d',strtotime($request->end_date));
         $event->event_type = $request->event_type;
         $event->status = $request->status;

         $data = $event->save();

         if($data)
         {

            return redirect('edit-event/'.$id)->with('msg','Event Updated Sucessfully.');

         }
         else
         {

            return redirect('edit-event/'.$id)->with('msg','Event Not Updated Added Sucessfully.');


         }

         


      }



    }

    public function eventDelete($id)
    {

       $event = Event::find($id);

       $event->delete();

       return redirect('event')->with('msg','Event Deleted Sucessfully.');

    }


}
