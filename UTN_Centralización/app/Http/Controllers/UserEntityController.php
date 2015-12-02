<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\UserEntityRequest;
use App\Http\Controllers\Controller;
use App\UserEntity;
use App\Entity;
use App\User;
use Session;
use Carbon\Carbon;
use Auth;

class UserEntityController extends Controller
{ 
    public function __construct()
    {  
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
        $users=User::all();
        $entities=Entity::all();
        $usersEntities=UserEntity::all();
        return view('usersEntities.index',compact('usersEntities','users','entities','view'));
    }

    public function create()
    {   
        $view=Auth::user()->getView();
        $users=User::all();
        $entities=Entity::all();
        return view('usersEntities.create',compact('users','entities','view'));
    }

    public function store(UserEntityRequest $request)
    {   
        $entity_id = $request->input('entity_id');
         if (Auth::user()->getRol()=="Institución") {
            if (Auth::user()->extractRolName($entity_id)=="Administrador") {
                Session::flash('message','No posee privilegios de vincular un usuario a esta entidad');
                $view=Auth::user()->getView();
                return redirect()->route('usuarios-entidades.create');
            }
        }
        $date = Carbon::now();        
        $user_entity= new UserEntity($request->all());
        $user_entity->created_at = $date;
        $user_entity->updated_at = $date;           
        $user_entity->save();
        return redirect()->route('usuarios-entidades.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {   
        $view=Auth::user()->getView();
        $users=User::all();
        $entities=Entity::all();
        $userEntity = UserEntity::findOrFail($id);
        return view('usersEntities.edit',compact('userEntity','users','entities','view'));
    }

    public function update(UserEntityRequest $request,$id)
    {
        $date = Carbon::now();  
        $user_entity= UserEntity::findOrFail($id);
        $user_entity->fill($request->all());
        $user_entity->updated_at = $date; 
        $user_entity->save();
        return redirect()->route('usuarios-entidades.index');
    }

    public function destroy($id)
    {
        $user_entity= UserEntity::findOrFail($id);
        $user_entity->delete($id);
        Session::flash('message','Fue eliminado de nuestros registros.');
        return redirect()->route('usuarios-entidades.index');
    }
    
}
