<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\CreateConcessionRequest;
use App\Http\Requests\EditConcessionRequest;
use App\Http\Controllers\Controller;
use App\Resolution;
use App\File;
use App\Filetype;
use App\Viability;
use App\Concession;
use App\Entity;
use Redirect;
use Session;
use Carbon\Carbon;
use Auth;

class ConcessionController extends Controller
{
    public function __construct()
    {  
        $this->middleware('auth');
        //$this->middleware('rol');
    }

    public function index()
    {   
        $entities=Entity::getEntities();
        $view=Auth::user()->getView();
        $concessions=Concession::all();
        return view('concessions.index',compact('concessions','view','entities'));
    }

    public function create()
    {   
        $view=Auth::user()->getView();
        $resolutions=Resolution::all();
        $files=File::all();
        $fileTypes=Filetype::all();
        $viabilities=Viability::all();
        $entities=Entity::getEntities();
        return view('concessions.create',compact('resolutions','files','fileTypes','viabilities','view','entities'));
    }

    public function store(CreateConcessionRequest $request)
    {
        $date = Carbon::now();
        $startDate = $request->input('conferment_date');
        $endDate = $request->input('due_date');  
        if ($startDate<$endDate) {
            Session::flash('message','Existe un error con las fechas favor revisar');
            return redirect()->route('concesiones.create');
        }      
        $concession= new Concession($request->all());
        $concession->created_at = $date;
        $concession->updated_at = $date;           
        $concession->save();
        return redirect()->route('concesiones.index');
    }

    public function show($id)
    {   
        $view=Auth::user()->getView();
        $resolutions=Resolution::all();
        $files=File::all();
        $fileTypes=Filetype::all();
        $viabilities=Viability::all();
        $entities=Entity::getEntities();
        $concession = Concession::findOrFail($id);
        return view('concessions.show',compact('resolutions','files','fileTypes','viabilities','concession','view','entities'));
    }

    public function edit($id)
    {   
        $view=Auth::user()->getView();
        $resolutions=Resolution::all();
        $files=File::all();
        $fileTypes=Filetype::all();
        $viabilities=Viability::all();
        $entities=Entity::getEntities();
        $concession = Concession::findOrFail($id);
        return view('concessions.edit',compact('resolutions','files','fileTypes','viabilities','concession','view','entities'));
    }

    public function update(Request $request, $id)
    {
        $date = Carbon::now();  
        $concession= Concession::findOrFail($id);
        $concession->fill($request->all());
        $concession->updated_at = $date; 
        $concession->save();
        return redirect()->route('concesiones.index');
    }

    public function destroy($id)
    {
        $concession= Concession::findOrFail($id);
        $concession->delete($id);
        Session::flash('message','Fue eliminado de nuestros registros.');
        return redirect()->route('concesiones.index');
    }

}
