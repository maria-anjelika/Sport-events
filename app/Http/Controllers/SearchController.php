<?php

namespace App\Http\Controllers;

use App\Organizer;
use App\Type;
use Illuminate\Http\Request;
use App\SportEvent;
use Illuminate\Support\Facades\Input;

class SearchController extends Controller
{
    public function searchSportsEvents(){
        $q = Input::get('q');
        $sportEvent = SportEvent::where('sportEventName','LIKE','%'.$q.'%')->orWhere('sportEventName','LIKE','%'.$q.'%')->get();
        if(count($sportEvent)>0)
            return view('sportsEvents.search')->withDetails($sportEvent)->withQuery($q);
        else return view('sportsEvents.search')->withMessage('No detail found. Try to search again!');
    }

    public function searchOrganizers(){
        $q = Input::get('q');
        $organizer = Organizer::where('organizerName','LIKE','%'.$q.'%')->get();
        if(count($organizer)>0)
            return view('organizers.search')->withDetails($organizer)->withQuery($q);
        else return view('organizers.search')->withMessage('No detail found. Try to search again!');
    }

    public function searchTypes(){
        $q = Input::get('q');
        $type = Type::where('type','LIKE','%'.$q.'%')->get();
        if(count($type)>0)
            return view('types.search')->withDetails($type)->withQuery($q);
        else return view('types.search')->withMessage('No detail found. Try to search again!');
    }
}

