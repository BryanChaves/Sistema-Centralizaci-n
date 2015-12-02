<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ReportCapacityRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'check_point'=>'required|in:watersource,sampling_site',
            'startDate'=>'required|date',
            'endDate'=>'required|date'
        ];
    }
}
