<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateRolRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'=>'required|alpha|unique:rol'
                
        ];
    }
}
