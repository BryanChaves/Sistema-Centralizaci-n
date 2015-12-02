<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\ReportQualityRequest;
use App\Http\Controllers\Controller;
use App\Watersource;
use App\Flow_Measurement;
use App\Samplingsite;
use Auth;
use Carbon\Carbon;
use Redirect;
use Session;

class ReportqualityController extends Controller
{
    
    public function __construct()
    {  
        $this->middleware('auth');
        //$this->middleware('rol');
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $view=Auth::user()->getView();
        $idEntity=Auth::user()->idEntity();
        $tipo = Auth::user()->getRol();
        if($tipo == "Gestor"){
            $samplingSites = \DB::select("select * from sampling_site where agent_id  =".$idEntity);
        }else{
           $samplingSites=Samplingsite::all();
       }

       return view('reports.quality.index',compact('samplingSites','view'));
   }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(ReportQualityRequest $request)
    {       
        $view=Auth::user()->getView();
        $samplingSites=Samplingsite::all();
        $sampling_id = (int)$request->input('sampling_site_id');
        $startDate = (string)$request->input('startDate');
        $endDate = (string)$request->input('endDate');
        $tipo = Auth::user()->getRol();
        $idEntity=Auth::user()->idEntity();
//var_dump($startDate."...".$endDate);
//die();
        if($tipo == "Gestor"){
                       $record = \DB::select("select p.parameter, p.unit, r.value, p.maximum_allowable, s.id, a.report_number from record r
            inner join parameter p on p.id = r.parameter_id
            inner join sampling s on s.id = r.sampling_id
            inner join sampling_site sa on sa.id = s.sampling_site_id and sa.id=".$sampling_id."
            and date(s.created_at) >= date('".$startDate."') and date(s.created_at) <= date('".$endDate."')
            inner join entity e on e.id = sa.agent_id and e.id =".$idEntity."
            inner join analysis a on a.agent_id = e.id and s.analysis_id = a.id");


        }else{
           $record = \DB::select("select p.parameter, p.unit, r.value, p.maximum_allowable, s.id, a.report_number from record r
            inner join parameter p on p.id = r.parameter_id
            inner join sampling s on s.id = r.sampling_id
            inner join sampling_site sa on sa.id = s.sampling_site_id and sa.id=".$sampling_id."
            and date(s.created_at) >= date('".$startDate."') and date(s.created_at) <= date('".$endDate."')
            inner join entity e on e.id = sa.agent_id
            inner join analysis a on a.agent_id = e.id and s.analysis_id = a.id");

       }              
             //  $sampling = \DB::select("select id from sampling where sampling_site_id =".$sampling_id);
       //dd($record);
       return view('reports.quality.resultado',compact('samplingSites','view','record'));
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
