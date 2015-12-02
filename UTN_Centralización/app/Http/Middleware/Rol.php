<?php

namespace App\Http\Middleware;
use Illuminate\Contracts\Auth\Guard;
use Closure;
use Session;
class Rol
{
    protected $auth;
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }
    
    public function handle($request, Closure $next)
    {
        $rol= $this->auth->user()->getRol();
        if($rol=="Administrador") {
            return view('administrator');
        }elseif($rol=="Institución"){
            return view('institution');
        }elseif($rol=="Gestor"){
            return view('agent');   
        }else{
            return view('auth.login');
        }
        Auth::logout();
        return $next($request);

    }
}
