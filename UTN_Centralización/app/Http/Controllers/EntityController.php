<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\CreateEntityRequest;
use App\Http\Requests\EditEntityRequest;
use App\Http\Controllers\Controller;
use App\Rol;
use App\Entity;
use Redirect;
use Session;
use Carbon\Carbon;
use Auth;

class EntityController extends Controller
{
    public function __construct()
    {  
        $this->middleware('auth');
       $this->middleware('auth');
        if (Auth::user()->getRol()=="Administrador") {
           $this->middleware('administrator'); 
        }elseif(Auth::user()->getRol()=="Institución"){
            $this->middleware('institution'); 
        }elseif(Auth::user()->getRol()=="Gestor"){
            $this->middleware('agent');
            
        }else{
            Auth::logout();
        }
    }

    public function index()
    {   
        $view=Auth::user()->getView();
        $roles=Rol::all();
        $entities=Entity::all();
        return view('entities.index',compact('entities','roles','view'));
    }

    public function create()
    {   
        $view=Auth::user()->getView();
        $roles=Rol::all();
        return view('entities.create',compact('roles','view'));
    }

    public function store(CreateEntityRequest $request)
    {   
        $rol_id = $request->input('rol_id');
        if ((Auth::user()->getRol()=="Institución")&&(Auth::user()->extractRol($rol_id)=="Institución")||(Auth::user()->extractRol($rol_id)=="Administrador")) {
           Session::flash('message','No posee privilegios para crear una entidad con el rol de institución ó administrador');
           return redirect()->route('entidades.create');
        }
        $date = Carbon::now();        
        $entity= new Entity($request->all());
        $entity->created_at = $date;
        $entity->updated_at = $date;           
        $entity->save();
        return redirect()->route('entidades.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {   
        $view=Auth::user()->getView();
        $roles=Rol::all();
        $entity = Entity::findOrFail($id);
        return view('entities.edit',compact('entity','roles','view'));
    }

    public function update(EditEntityRequest $request,$id)
    {
        $date = Carbon::now();  
        $entity= Entity::findOrFail($id);
        $entity->fill($request->all());
        $entity->updated_at = $date; 
        $entity->save();
        return redirect()->route('entidades.index');
    }

    public function destroy($id)
    {   
        if ((Auth::user()->getRol()=="Institución")&&(Auth::user()->extractRolName($id)=="Administrador")) {
            Session::flash('message','No posee privilegios para eliminar esta entidad');
            return redirect()->route('entidades.index');
        }
        $entity= Entity::findOrFail($id);
        $entity->delete($id);
        Session::flash('message',$entity->name.' ' .'fue eliminado de nuestros registros.');
        return redirect()->route('entidades.index');
    }

}
