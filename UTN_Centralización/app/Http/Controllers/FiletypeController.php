<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\FiletypeRequest;
use App\Http\Controllers\Controller;
use App\Filetype;
use Redirect;
use Session;
use Carbon\Carbon;
use Auth;

class FiletypeController extends Controller
{
    public function __construct()
    {  
        $this->middleware('auth');
        //$this->middleware('rol');
    } 

    public function index()
    {
        $view=Auth::user()->getView();
        $fileTypes=Filetype::all();
        
        return view('fileTypes.index',compact('fileTypes','view'));
    }

    public function create()
    {   
        $view=Auth::user()->getView();
        return view('fileTypes.create',compact('view'));
    }

    public function store(FiletypeRequest $request)
    {
        $date = Carbon::now();        
        $fileType= new Filetype($request->all());
        $fileType->created_at = $date;
        $fileType->updated_at = $date;           
        $fileType->save();
        return redirect()->route('tipos-expediente.index');
    }

    public function show($id)
    {
        
    }

    public function edit($id)
    {   
        $view=Auth::user()->getView();
        $fileType = Filetype::findOrFail($id);
        return view('fileTypes.edit', compact('fileType','view'));
    }

    public function update(FiletypeRequest $request,$id)
    {
        $date = Carbon::now();  
        $fileType= Filetype::findOrFail($id);
        $fileType->fill($request->all());
        $fileType->updated_at = $date; 
        $fileType->save();
        return redirect()->route('tipos-expediente.index');
    }

    public function destroy($id)
    {
        $fileType= Filetype::findOrFail($id);
        $fileType->delete($id);
        Session::flash('message','Fue eliminado de nuestros registros.');
        return redirect()->route('tipos-expediente.index');
    }

}
