<?php

namespace App\Http\Controllers;

use Request;
use Image; 
use Input;
use Carbon\Carbon;
use Auth;


use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Galerija;
use App\GalerijaSlike;

class DBGalerijaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galerije = Galerija::all();
        return view('dashboard.galerija.index', compact('galerije'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.galerija.dodaj', compact('kategorije'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\GalerijaRequest $request)
    {
       
            $galerija = new Galerija(Request::all());
            $galerija->visible = 1;
            $galerija->save();
            $insertedId = $galerija->id;
           
            return redirect ('dashboard/galerija/'.$insertedId)->with([
                
                'flash_message' => 'Uspješno ste dodali galeriju!',
                'flash_message_important' => true
                
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $galerija = Galerija::FindOrFail($id);
        return view('dashboard.galerija.pregled', compact('galerija'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $galerija = Galerija::FindOrFail($id);
        return view('dashboard.galerija.uredi', compact('galerija'));
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
        $galerija = Galerija::FindOrFail($id);
       
        
        $input = Request::all();
      
        $galerija->update($input);
        
        return redirect ('dashboard/galerija/'. $id .'/edit')->with([
              
            'flash_message' => 'Uspješno ste uredili galeriju: '. $galerija->naziv,
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
        $galerija = Galerija::FindOrFail($id);
        
        foreach($galerija->slike as $slika){

            \File::delete($slika->slika);
            \File::delete($slika->velika_slika);
        }
        
        $galerija->delete();
        

        return redirect ('dashboard/galerija')->with([
            'flash_message' => 'Uspješno ste obrisali galeriju: '. $galerija->naziv,
            'flash_message_important' => true
        ]);
    }
    
    public function createSliku($id)
    {
        $galerija = Galerija::FindOrFail($id);
        return view('dashboard.slike.dodaj', compact('galerija'));
    }
    
    public function storeSliku(Requests\SlikaRequest $request, $id )
    {
       
              //validate
        if(Input::hasFile('slika')){
           
            $random_tekst   = str_random(40);
            $slike          = new GalerijaSlike(Request::all());
            $slika          = Input::file('slika');
            $ext            = $slika->getClientOriginalExtension();
            $naziv          = public_path('uploads/galerija/'.$random_tekst.'.'.$ext);
            $velika          = public_path('uploads/galerija/v_'.$random_tekst.'.'.$ext);
            
            $slike->slika = 'uploads/galerija/'.$random_tekst.'.'.$ext;
            $slike->velika_slika = 'uploads/galerija/v_'.$random_tekst.'.'.$ext;
            
            Image::make($slika)->fit(400)->save($naziv);
            Image::make($slika)->resize(1920, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($velika);
            
            $galerija = Galerija::find($id);

            $galerija->slike()->save($slike);
            

           
            return redirect ('dashboard/galerija/'.$id.'/dodajsliku')->with([
                
                'flash_message' => 'Uspješno ste dodali sliku! Uredite sliku za nastavak.',
                'flash_message_important' => true
                
            ]);
        }
    }
    
}
