<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Pristupnica;

class PristupnicaController extends Controller
{
   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\PristupnicaRequest $request)
    {   
        
        if (Pristupnica::where('email', '=', $request['email'])->exists()) {
            return redirect ('pristupnica')->with([
                    
                'flash_message' => 'Greška, već ste se prijavili za članstvo u udruzi!',
                'flash_message_important' => true
                    
            ]);
        }else{
             $request['name'] = $request->prezime .' '. $request->ime;
            $user = Pristupnica::create($request->all());
    
    
            return redirect ('pristupnica')->with([
                    
                'flash_message' => 'Uspješno ste zatražili članstvo! U roku od 10 dana odbor će razmotriti vaš zahtjev.',
                'flash_message_important' => true
                    
            ]);
            
        }
        
    }

   
}
