<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\SportEvent;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Organizer;

class OrganizerController extends Controller
{
    public function index()
    {
        $organizerModel = new Organizer();
        $allorganizers = $organizerModel::all();

        return view('organizers.index')->with('organizers', $allorganizers);
    }

    public function create()
    {
        return view('organizers.create');
    }

    public function store(Request $request)
    {
        $rules = array(
            'organizerName'=>'required|min:2|max:128',

        );

        $validator = Validator::make($request->all(),$rules);

        if($validator->fails()){
            return redirect('organizers/create')->WithErrors($validator);
        }
        else{
            $organizer = new Organizer([
                'organizerName'=> $request->get('organizerName'),

            ]);

            $organizer->save();
            return redirect('organizers');
        }
    }

    public function show($id)
    {
        $organizer = Organizer::find($id);

        return view('organizers.show',compact('organizer','id'));
    }

    public function edit($id)
    {
        $organizer = Organizer::find($id);

        return view('organizers.edit',compact('organizer','id'));
    }

    public function update(Request $request, $id)
    {
        $organizer = Organizer::find($id);
        $organizer->organizerName = $request->get('organizerName');
        $organizer->save();
        return redirect('organizers')->with('success', 'Task was successful');
    }

    public function destroy($id)
    {
        $organizer = Organizer::find($id);
        $organizer->delete();
        //

        return redirect('organizers')->with('success','Organizer has been deleted');
    }
}