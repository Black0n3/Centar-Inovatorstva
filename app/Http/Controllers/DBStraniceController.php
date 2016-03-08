<?php

namespace App\Http\Controllers;

use Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Stranice;

class DBStraniceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stranica = Stranice::findOrFail($id);
        
        return view('dashboard.stranice.uredi', compact('stranica'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $stranica = Stranice::FindOrFail($id);
        $input = Request::all();
      
        $stranica->update($input);
        
        return redirect ('dashboard/stranice/'. $id .'/edit')->with([
              
            'flash_message' => 'Uspješno ste uredili stranicu: '. $stranica->naziv,
            'flash_message_important' => true
                
        ]);
    
    }

}
