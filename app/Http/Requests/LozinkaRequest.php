<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class LozinkaRequest extends Request
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
            'trenutna_lozinka'          => 'required|min:4',
            'nova_lozinka'              => 'required|min:4|confirmed|different:trenutna_lozinka',
            'nova_lozinka_confirmation' => 'required|min:4'
        ];
    }
}
