<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\ResolutionRequest;
use App\Http\Controllers\Controller;
use App\Resolution;
use Redirect;
use Session;
use Carbon\Carbon;
use Auth;

class ResolutionController extends Controller
{
    public function __construct()
    {  
        $this->middleware('auth');
        //$this->middleware('rol');
    }

    public function index()
    {
        $view=Auth::user()->getView();
        $resolutions=Resolution::all();
       
        return view('resolutions.index',compact('resolutions','view'));
    }

    public function create()
    {
        $view=Auth::user()->getView();
        return view('resolutions.create',compact('view'));
    }

    public function store(ResolutionRequest $request)
    {
        $date = Carbon::now();        
        $resolution= new Resolution($request->all());
        $resolution->created_at = $date;
        $resolution->updated_at = $date;           
        $resolution->save();
        return redirect()->route('resoluciones.index');
    }

    public function show($id)
    {   
        $resolution = Resolution::findOrFail($id);
        return view('resolutions.show', compact('resolution'));
    }

    public function edit($id)
    {   
        $view=Auth::user()->getView();
        $resolution = Resolution::findOrFail($id);
        return view('resolutions.edit', compact('resolution','view'));
    }

    public function update(ResolutionRequest $request,$id)
    {
        $date = Carbon::now();  
        $resolution= Resolution::findOrFail($id);
        $resolution->fill($request->all());
        $resolution->updated_at = $date; 
        $resolution->save();
        return redirect()->route('resoluciones.index');
    }

    public function destroy($id)
    {
        $resolution= Resolution::findOrFail($id);
        $resolution->delete($id);
        Session::flash('message','Fue eliminado de nuestros registros.');
        return redirect()->route('resoluciones.index');
    }

}
