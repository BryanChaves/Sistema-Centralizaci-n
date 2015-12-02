<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\FileRequest;
use App\Http\Controllers\Controller;
use App\File;
use Redirect;
use Session;
use Carbon\Carbon;
use Auth;

class FileController extends Controller
{
    public function __construct()
    {  
        $this->middleware('auth');
        //$this->middleware('rol');
    }    

    public function index(Request $request)
    {   
        $view=Auth::user()->getView();
        $files=File::all();
       
        return view('files.index',compact('files','view'));
    }

    public function create()
    {   
        $view=Auth::user()->getView();
        return view('files.create',compact('view'));
    }

    public function store(FileRequest $request)
    {
        $date = Carbon::now();        
        $file= new File($request->all());
        $file->created_at = $date;
        $file->updated_at = $date;           
        $file->save();
        return redirect()->route('expedientes.index');
    }

    public function show($id)
    {   
     
    }

    public function edit($id)
    {   
        $view=Auth::user()->getView();
        $file = File::findOrFail($id);
        return view('files.edit', compact('file','view'));
    }

    public function update(FileRequest $request,$id)
    {
        $date = Carbon::now();  
        $file= File::findOrFail($id);
        $file->fill($request->all());
        $file->updated_at = $date; 
        $file->save();
        return redirect()->route('expedientes.index');
    }

    public function destroy($id)
    {
        $file= File::findOrFail($id);
        $file->delete($id);
        Session::flash('message','Fue eliminado de nuestros registros.');
        return redirect()->route('expedientes.index');
    }

}
