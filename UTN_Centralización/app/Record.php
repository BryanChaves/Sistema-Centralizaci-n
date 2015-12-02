<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    protected $table = 'record';
	protected $fillable = array('sampling_id','parameter_id','value','created_at','updated_at');
	protected $guarded  = array('id');
	public    $timestamps = false;


}
