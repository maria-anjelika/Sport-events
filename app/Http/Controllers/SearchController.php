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
        $search = Input::get('search');
        $sportEvent = SportEvent::where('sportEventName','LIKE','%'.$search.'%')->orWhere('sportEventName','LIKE','%'.$search.'%')->get();
        if(count($sportEvent)>0)
            return view('sportsEvents.search')->withDetails($sportEvent)->withQuery($search);
        else return view('sportsEvents.search')->withMessage('No detail found. Try to search again!');
    }

    public function searchOrganizers(){
        $search = Input::get('search');
        $organizer = Organizer::where('organizerName','LIKE','%'.$search.'%')->get();
        if(count($organizer)>0)
            return view('organizers.search')->withDetails($organizer)->withQuery($search);
        else return view('organizers.search')->withMessage('No detail found. Try to search again!');
    }

    public function searchTypes(){
        $search = Input::get('search');
        $type = Type::where('type','LIKE','%'.$search.'%')->get();
        if(count($type)>0)
            return view('types.search')->withDetails($type)->withQuery($search);
        else return view('types.search')->withMessage('No detail found. Try to search again!');
    }
}

