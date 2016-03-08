<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PristupnicaRequest extends Request
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
            
            'email'     => 'required|min:3',
            'adresa'    => 'required|min:3',
            'mjesto'    => 'required|min:3',
            'oib'       => 'required|min:3',
            'rodenje'   => 'required|min:3',
            'kontakt'   => 'required|min:3',
            'zanimanje' => 'required|min:3',
            'radni_status' => 'required|min:3'

            
       
        ];
    }
}
