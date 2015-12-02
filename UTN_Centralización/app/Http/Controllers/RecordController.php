<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\RecordRequest;
use App\Http\Controllers\Controller;
use App\Record;
use App\Parameter;
use App\Sampling;
use Auth;
use Carbon\Carbon;
use Redirect;
use Session;

class RecordController extends Controller
{
    public function __construct()
    {  
        $this->middleware('auth');
        //$this->middleware('rol');
    }

    public function index()
    {
        $view=Auth::user()->getView();
        $parameters=Parameter::all();
        $samplings=Sampling::all();
        $records=Record::all();
        
        return view('records.index',compact('records','parameters','samplings','view'));
    }

    public function create()
    {   
        $view=Auth::user()->getView();
        $parameters=Parameter::all();
        $samplings=Sampling::all();
        return view('records.create',compact('parameters','samplings','view'));
    }

    public function store(RecordRequest $request)
    {
        $date = Carbon::now();        
        $record= new Record($request->all());
        $record->created_at = $date;
        $record->updated_at = $date;           
        $record->save();
        return redirect()->route('registros.index'); 
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {   
        $view=Auth::user()->getView();
        $parameters=Parameter::all();
        $samplings=Sampling::all();
        $record = Record::findOrFail($id);
        return view('records.edit',compact('record','parameters','samplings','view'));
    }

    public function update(RecordRequest $request, $id)
    {
        $date = Carbon::now();  
        $record= Record::findOrFail($id);
        $record->fill($request->all());
        $record->updated_at = $date; 
        $record->save();
        return redirect()->route('registros.index');
    }

    public function destroy($id)
    {
        $record= Record::findOrFail($id);
        $record->delete($id);
        Session::flash('message','fue eliminado de nuestros registros.');
        return redirect()->route('registros.index');  
    }

}
