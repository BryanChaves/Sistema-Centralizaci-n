<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\SamplingsiteRequest;
use App\Http\Controllers\Controller;
use App\Samplingsite;
use App\Entity;
use Redirect;
use Session;
use Auth;
use Carbon\Carbon;

class SamplingsiteController extends Controller
{
    public function __construct()
    {  
        $this->middleware('auth');
        //$this->middleware('rol');
    } 

    public function index(Request $request)
    {   
        $view=Auth::user()->getView();
        
        if (Auth::user()->getRol()=="Gestor") {
             $samplingSites=Samplingsite::allAgent();       
        }else{
             $samplingSites=Samplingsite::all();       
                    
        }
        
        return view('samplingSites.index',compact('samplingSites','view'));
    }

    public function create()
    {   
        $view=Auth::user()->getView();
        return view('samplingSites.create',compact('view'));
    }

    public function store(SamplingsiteRequest $request)
    {   
            $date = Carbon::now();        
            $sampling_site= new Samplingsite($request->all());
        if (Auth::user()->getRol()=="Gestor") {
            
            $sampling_site->agent_id = Auth::user()->idEntity();
            
        }
            $sampling_site->created_at = $date;
            $sampling_site->updated_at = $date;           
            $sampling_site->save();
            return redirect()->route('sitios-muestreo.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {   
        $view=Auth::user()->getView();
        $sampling_site = Samplingsite::findOrFail($id);
        return view('samplingSites.edit', compact('sampling_site','view'));
    }

    public function update(SamplingsiteRequest $request,$id)
    {
        
            $date = Carbon::now();  
            $sampling_site= Samplingsite::findOrFail($id);
            $sampling_site->fill($request->all());
            $sampling_site->updated_at = $date; 
            $sampling_site->save();
            return redirect()->route('sitios-muestreo.index');
        
       
    }

    public function destroy($id)
    {
        $sampling_site= Samplingsite::findOrFail($id);
        $sampling_site->delete($id);
        Session::flash('message','Fue eliminado de nuestros registros.');
        return redirect()->route('sitios-muestreo.index');
    }

}
