<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;


class AnalysisRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            
            'laboratory_name'=>'required|alpha',
            'date'=>'required|date',
            'report_number'=>'required|alpha_num',
            //'path'=>'mimes:pdf'

        ];
    }
}
