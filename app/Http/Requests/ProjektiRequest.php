<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProjektiRequest  extends Request
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
            
            'naziv' => 'required|min:3',
            'slika' => 'image',
            'voditelj_id' => 'required',
            'mentor_id' => 'required',
            'tekst' => 'required'
            
        ];

    }
}
