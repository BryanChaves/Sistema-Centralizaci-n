<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EditConcessionRequest extends Request
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
            'owner'=>'required',
            'property_number'=>'required',
            'water_tapping_point'=>'required',
            'authorized_use'=>'required',
            'assigned_flow'=>'required',
            'capacity_flow'=>'required',
            'path'=>'mimes:pdf'  
        ];
    }
}
