<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\SportEvent;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Type;

class TypeController extends Controller
{
    public function index()
    {
        $typeModel = new Type();
        $alltypes = $typeModel::all();

        return view('types.index')->with('types', $alltypes);
    }

    public function create()
    {
        return view('types.create');
    }

    public function store(Request $request)
    {
        $rules = array(
            'type'=>'required',
        );

        $validator = Validator::make($request->all(),$rules);

        if($validator->fails()){
            return redirect('types/create')->WithErrors($validator);
        }
        else{
            $type = new Type([
                'type'=> $request->get('type'),
            ]);

            $type->save();
            return redirect('type');
        }
    }

    public function show($id)
    {
        $type = Type::find($id);

        return view('types.show',compact('type','id'));
    }

    public function edit($id)
    {
        $type = Type::find($id);

        return view('types.edit',compact('type','id'));
    }

    public function update(Request $request, $id)
    {
        $type = Type::find($id);
        $type->type = $request->get('type');
        $type->save();
        return redirect('types')->with('success', 'Task was successful');
    }

    public function destroy($id)
    {
        $type = Type::find($id);
        $type->delete();
        //

        return redirect('types')->with('success','Type has been deleted');
    }
}
