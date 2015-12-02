<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\WatersourceRequest;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Watersource;
use Redirect;
use Session;
use Auth;

class WatersourceController extends Controller
{
    public function __construct()
    {  
        $this->middleware('auth');
        
    } 
    
    public function index()
    {  
        $view=Auth::user()->getView();
        $watersources=Watersource::all();
        
        return view('watersources.index',compact('watersources','view'));
    }

    public function create()
    {
        $view=Auth::user()->getView();
        return view('watersources.create',compact('view'));
    }

    public function store(WatersourceRequest $request)
    {   
        $date = Carbon::now();
        $watersource= new Watersource($request->all());
        $watersource->created_at = $date;
        $watersource->updated_at = $date;           
        $watersource->save();
        return redirect()->route('nacientes.index');
    }

    public function show($id)
    {
        $watersource = Watersource::findOrFail($id);
        return view('watersources.show', compact('watersource'));
    }

    public function edit($id)
    {   
        $view=Auth::user()->getView();
        $watersource = Watersource::findOrFail($id);
        return view('watersources.edit',compact('watersource','view'));
    }

    public function update(WatersourceRequest $request,$id)
    {
        $date = Carbon::now();  
        $watersource= Watersource::findOrFail($id);
        $watersource->fill($request->all());
        $watersource->updated_at = $date; 
        $watersource->save();
        return redirect()->route('nacientes.index');  
    }

    public function destroy($id)
    {
        $watersource= Watersource::findOrFail($id);
        $watersource->delete($id);
        Session::flash('message',$watersource->sampling_site_name.' ' .'fue eliminado de nuestros registros.');
        return redirect()->route('nacientes.index');
    }

}
