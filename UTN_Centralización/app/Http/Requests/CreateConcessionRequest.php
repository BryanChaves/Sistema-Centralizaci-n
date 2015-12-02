<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateConcessionRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'agent_id'=>'required|numeric',
            'agent_ID'=>'required',
            'conferment_date'=>'required|date',
            'due_date'=>'required|date',
            'owner'=>'required|alpha',
            'property_number'=>'required',
            'water_tapping_point'=>'required',
            'authorized_use'=>'required|alpha',
            'assigned_flow'=>'required|numeric',
            'capacity_flow'=>'required|numeric',
            'path'=>'mimes:pdf'    
        ];
    }
}
