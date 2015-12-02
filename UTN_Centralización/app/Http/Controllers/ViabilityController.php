<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;
use App\Http\Requests\EditViabilityRequest;
use App\Http\Requests\CreateViabilityRequest;
use App\Http\Controllers\Controller;
use App\Viability;
use App\Province;
use App\Canton;
use App\District;
use Redirect;
use Session;
use Carbon\Carbon;
use Auth;

class ViabilityController extends Controller
{
    public function __construct()
    {  
        $this->middleware('auth');
        //$this->middleware('rol');
    }
    
    public function index()
    {   
        $view=Auth::user()->getView();   
        $provinces=Province::all();
        $viabilities=Viability::all();
        
        return view('viabilities.index',compact('viabilities','provinces','view'));
    }

    public function create()
    {   
        $view=Auth::user()->getView();
        return view('viabilities.create', compact('provinces','view'));
    }
    
    public function store(ViabilityRequest $request)
    {
        $date = Carbon::now();        
        $viability= new Viability($request->all());
        $viability->created_at = $date;
        $viability->updated_at = $date;           
        $viability->save();
        return redirect()->route('viabilidades.index');
    }

    public function show($id)
    {   $view=Auth::user()->getView();
        $provinces=Province::all();
        $cantons=Canton::all();
        $districts=District::all();
        $viability = Viability::findOrFail($id);
        return view('viabilities.show', compact('viability','provinces','cantons','districts','view'));
    }

    public function edit($id)
    {   
        $view=Auth::user()->getView();
        $provinces=Province::all();
        $cantons=Canton::all();
        $districts=District::all();
        $viability = Viability::findOrFail($id);
        return view('viabilities.edit', compact('viability','provinces','cantons','districts','view'));
    }

    public function update(ViabilityRequest $request,$id)
    {
        $date = Carbon::now();  
        $viability= Viability::findOrFail($id);
        $viability->fill($request->all());
        $viability->updated_at = $date; 
        $viability->save();
        return redirect()->route('viabilidades.index');
    }

    public function destroy($id)
    {
        $viability= Viability::findOrFail($id);
        $viability->delete($id);
        Session::flash('message','Fue eliminado de nuestros registros.');
        return redirect()->route('viabilidades.index');
    }
    
    public function canton($value)
    {  
        $id=(int)$value;
        $cantons=Canton::getCanton($id);
        return response()->json($cantons); 
    }
    
    public function district($value)
    {  
        $id=(int)$value;
        $districts=District::getDistrict($id);
        return response()->json($districts); 
    }

}
