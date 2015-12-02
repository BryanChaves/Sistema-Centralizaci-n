<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Concession extends Model
{
  	protected $table = 'concession';
	protected $fillable = array('agent_id','agent_ID','resolution_id','file_id','fileType_id','conferment_date','due_date','owner','property_number','water_tapping_point','authorized_use','assigned_flow','capacity_flow','viability_id','path','created_at','updated_at');
	protected $guarded  = array('id');
	public    $timestamps = false;
}
