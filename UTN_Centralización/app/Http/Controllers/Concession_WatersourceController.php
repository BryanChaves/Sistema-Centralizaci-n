<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\Concession_WatersourceRequest;
use App\Http\Controllers\Controller;
use App\Concession_Watersource;
use App\Concession;
use App\Watersource;
use Redirect;
use Session;
use Carbon\Carbon;
use Auth;

class Concession_WatersourceController extends Controller
{
    public function __construct()
    {  
        $this->middleware('auth');
        //$this->middleware('rol');
    }

    public function index()
    {
        $view=Auth::user()->getView();
        $concession_Watersources=Concession_Watersource::all();
        $concessions=Concession::all();
        $watersources=Watersource::all();
        return view('concession_Watersources.index',compact('concession_Watersources','concessions','watersources','view'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $view=Auth::user()->getView();
        $concessions=Concession::all();
        $watersources=Watersource::all();
        return view('concession_Watersources.create',compact('view','concessions','watersources'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Concession_WatersourceRequest $request)
    {
        $date = Carbon::now();        
        $concession_watersource= new Concession_Watersource($request->all());
        $concession_watersource->created_at = $date;
        $concession_watersource->updated_at = $date;           
        $concession_watersource->save();
        return redirect()->route('concesion-naciente.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $view=Auth::user()->getView();
        $concession_watersource = Concession_Watersource::findOrFail($id);
        $concessions=Concession::all();
        $watersources=Watersource::all();
        return view('concession_Watersources.edit',compact('concession_watersource','view','concessions','watersources'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Concession_WatersourceRequest $request, $id)
    {
        $date = Carbon::now();  
        $concession_watersource= Concession_Watersource::findOrFail($id);
        $concession_watersource->fill($request->all());
        $concession_watersource->updated_at = $date; 
        $concession_watersource->save();
        return redirect()->route('concesion-naciente.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $concession_watersource= Concession_Watersource::findOrFail($id);
        $concession_watersource->delete($id);
        Session::flash('message','Fue eliminado de nuestros registros.');
        return redirect()->route('concesion-naciente.index');
    }
}
