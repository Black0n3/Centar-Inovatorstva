<?php

namespace App\Http\Controllers;

use Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Clanarina;
use App\User;
use Carbon\Carbon;

class DBClanarineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clanarine = Clanarina::all();
        return view('dashboard.clanarine.index', compact('clanarine'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clanovi = User::whereNotIn('udruga_clan', ['Ne'])
                    ->lists('name', 'id');
        return view('dashboard.clanarine.dodaj', compact('clanovi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        
        
        $clanarina = new Clanarina(Request::all());
        $clanarina->save();
            
        return redirect ('dashboard/clanarine')->with([
                
                'flash_message' => 'Uspješno ste dodali članarinu.',
                'flash_message_important' => true
                
            ]);
       
    }

  
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clanovi = User::whereNotIn('udruga_clan', ['Ne'])
                    ->lists('name', 'id');
        $clanarina = Clanarina::FindOrFail($id);
        return view('dashboard.clanarine.uredi', compact('clanarina','clanovi'));
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
        $clanarina = Clanarina::FindOrFail($id);
        $input = Request::all();
      
        $clanarina->update($input);
        
        return redirect ('dashboard/clanarine/'. $id .'/edit')->with([
              
            'flash_message' => 'Uspješno ste uredili članarinu za člana: '. $clanarina->clan->name,
            'flash_message_important' => true
                
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $clanarina = Clanarina::FindOrFail($id);
        $clanarina->delete();
       
        return redirect ('dashboard/clanarine')->with([
            'flash_message' => 'Uspješno ste obrisali članarinu',
            'flash_message_important' => true
        ]);
    }
}
