<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\EditUserRequest;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\User;
use App\UserEntity;
use Redirect;
use Session;
use Auth;

class UserController extends Controller
{    
    public function __construct()
    {  
        $this->middleware('auth');
    }

    public function index()
    {   
        $idEntity = Auth::user()->idEntity();
        $view = Auth::user()->getView();
        if((Auth::user()->getRol()=="Gestor")){ 
            $users = User::getUsers($idEntity);            
        }else{
            $users = User::all();
        }
        return view('users.index',compact('view','users'));
    }

    public function create()
    {   
        $view = Auth::user()->getView();
        return view('users.create',compact('view'));
    }

    public function store(CreateUserRequest $request)
    { 
        $date = Carbon::now();        
        $users = new User($request->all());
        $users->created_at = $date;
        $users->updated_at = $date;           
        $users->save();
        if (Auth::user()->getRol()=="Gestor") {
            $email = $request->input('email');
            $id = Auth::user()->extractId($email);
            $idEntity = Auth::user()->idEntity();
            $this->insert($id,$idEntity);
        }
        return redirect()->route('usuarios.index');
    }

    public function show($id)
    {
        //
    }
    public function insert($id,$idEntity)
    {
        $date = Carbon::now();        
        $user_entity = new UserEntity();
        $user_entity->user_id = $id;
        $user_entity->entity_id = $idEntity;
        $user_entity->created_at = $date;
        $user_entity->updated_at = $date;           
        $user_entity->save();
    }
    public function edit($id)
    {   
        $view = Auth::user()->getView(); 
        $user = User::findOrFail($id);
        return view('users.edit',compact('user','view'));
    }

    public function update(EditUserRequest $request,$id)
    {
        $date = Carbon::now();  
        $user = User::findOrFail($id);
        $user ->fill($request->all());
        $user ->updated_at = $date; 
        $user ->save();
        return redirect()->route('usuarios.index');
    }

    public function destroy($id)
    {   
        if ((Auth::user()->getRol()=="Institución")&&(Auth::user()->checkRol($id)=="Administrador")) {
            Session::flash('message','No posee privilegios para eliminar este usuario');
            return redirect()->route('usuarios.index');
        }
        $user = User::findOrFail($id);
        $user->delete($id);
        Session::flash('message',$user->full_name.' ' .'fue eliminado de nuestros registros.');
        return redirect()->route('usuarios.index');
    }

}
