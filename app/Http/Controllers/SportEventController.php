<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\SportEvent;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class SportEventController extends Controller
{
    public function index()
    {
        $sportEventModel = new SportEvent();
        $allsportsEvents = $sportEventModel::all();

        return view('sportsEvents.index')->with('sportsEvents', $allsportsEvents);
    }

    public function create()
    {
        return view('sportsEvents.create');
    }

    public function store(Request $request)
    {
        $rules = array(
            'sportEventName'=>'bail||required|min:2|max:255',
            'organizerName'=>'required|min:2|max:128',
            'date'=>'required',
            'continuance'=>'required',
            'type'=>'required',
        );

        $validator = Validator::make($request->all(),$rules);

        if($validator->fails()){
            return redirect('sportsEvents/create')->WithErrors($validator);
        }
        else{
            $sportEvent = new SportEvent([
            'sportEventName'=> $request->get('sportEventName'),
            'organizerName'=> $request->get('organizerName'),
            'date'=> $request->get('date'),
            'continuance'=> $request->get('continuance'),
            'type'=> $request->get('type'),
                ]);

            $sportEvent->save();
            return redirect('sportsEvents');
        }
    }

    public function show($id)
    {
        $sportEvent = SportEvent::find($id);

        return view('sportsEvents.show',compact('sportEvent','id'));
    }

    public function edit($id)
    {
        $sportEvent = SportEvent::find($id);

        return view('sportsEvents.edit',compact('sportEvent','id'));
    }

    public function update(Request $request, $id)
    {
        $sportEvent = SportEvent::find($id);
        $sportEvent->sportEventName = $request->get('sportEventName');
        $sportEvent->organizerName = $request->get('organizerName');
        $sportEvent->date = $request->get('date');
        $sportEvent->continuance = $request->get('continuance');
        $sportEvent->type = $request->get('type');
        $sportEvent->save();
        return redirect('sportsEvents')->with('success', 'Task was successful');
    }

    public function destroy($id)
    {
        $sportEvent = SportEvent::find($id);
        $sportEvent->delete();
        //

        return redirect('sportsEvents')->with('success','Sport event have been deleted');
    }
}
