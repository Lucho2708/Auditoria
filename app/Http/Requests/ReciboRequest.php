<?php

namespace Auditoria\Http\Requests;

use Auditoria\Http\Requests\Request;

class ReciboRequest extends Request
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
            'cod'=>'required|min:1|max:10|unique:recibos',
            'fac'=>'required|min:1|max:10|unique:recibos',
            'val'=>'required|min:1|max:10',
            'desc'=>'required|min:1|max:30'
    
        ];
    }
}
