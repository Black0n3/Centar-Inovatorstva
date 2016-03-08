<?php

namespace App\Http\Controllers;

use Request;
use Image; 
use Input;

use Carbon\Carbon;
use Auth;


use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Projekti;
use App\User;

class DBProjektiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projekti = Projekti::all();
        return view('dashboard.projekti.index', compact('projekti'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clanovi = User::lists('name', 'id');
        return view('dashboard.projekti.dodaj', compact('clanovi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\ProjektiRequest $request)
    {
         //validate
        if(Input::hasFile('slika')){
           
            $random_tekst   = str_random(40);
            $projekt        = new Projekti(Request::all());
            $slika          = Input::file('slika');
            $ext            = $slika->getClientOriginalExtension();
            $naziv          = public_path('uploads/projekti/'.$random_tekst.'.'.$ext);
            $velika          = public_path('uploads/projekti/v_'.$random_tekst.'.'.$ext);
            
            $projekt->slika = 'uploads/projekti/'.$random_tekst.'.'.$ext;
            $projekt->velika_slika = 'uploads/projekti/v_'.$random_tekst.'.'.$ext;
            

            Image::make($slika)->resize(1920, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($naziv);
            Image::make($slika)->resize(1920, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($velika);
            
            
            $projekt->save();
            
            $id = $projekt->id;
            
        
           
            return redirect ('dashboard/projekti/'. $id .'/slika')->with([
                
                'flash_message' => 'Uspješno ste dodali projekt! uredite sliku.',
                'flash_message_important' => true
                
            ]);
        }
    }

    public function slika( $id)
    {
        $projekt = Projekti::FindOrFail($id);
        return view('dashboard.projekti.slika', compact('projekt'));
    }
    
    public function slikaspremi(Request $request, $id)
    {
        
        $projekt = Projekti::FindOrFail($id);
        
            $input = Request::all();
           
            $w = $input['w'];
            $h = $input['h'];
            $x = $input['x'];
            $y = $input['y'];
            
            $w = round($w,0);
            $h = round($h,0);
            $x = round($x,0);
            $y = round($y,0);
            
            $img = Image::make($projekt->slika);
            $img->crop($w, $h, $x, $y);
            $img->save();
            $projekt->visible = '1';
            $projekt->save();
            return redirect ('dashboard/projekti')->with([
                'flash_message' => 'Projekt uspješno objavljen!',
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
        $clanovi = User::lists('name', 'id');
        $projekt = Projekti::FindOrFail($id);
        return view('dashboard.projekti.uredi', compact('projekt', 'clanovi'));
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
        $projekt = Projekti::FindOrFail($id);
        $stara_slika = $projekt->slika;
        $redirect = 'dashboard/projekti/'. $id .'/edit';
        
        $input = Request::all();
        if(Input::hasFile('slika')){
            $redirect = 'dashboard/projekti/'. $id .'/slika';
            $random_tekst   = str_random(40);
            $slika          = Input::file('slika');
            $ext            = $slika->getClientOriginalExtension();
            
            $naziv          = public_path('uploads/projekti/'.$random_tekst.'.'.$ext);
            $velika          = public_path('uploads/projekti/v_'.$random_tekst.'.'.$ext);
            
            $nova_slika = 'uploads/projekti/'.$random_tekst.'.'.$ext;
            $input['slika'] = $nova_slika;
            
            Image::make($slika)->resize(1024, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($naziv);
            Image::make($slika)->resize(1024, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($velika);
            \File::delete($stara_slika);

        }else{
            $input['slika'] = $stara_slika;
        }
        

        $projekt->update($input);
        
        return redirect ($redirect)->with([
              
            'flash_message' => 'Uspješno ste uredili projekt: '. $projekt->naziv,
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
        $projekt = Projekti::FindOrFail($id);
        $slika = $projekt->slika;
        $projekt->delete();
        \File::delete($slika);
        return redirect ('dashboard/projekti')->with([
            'flash_message' => 'Uspješno ste obrisali projekt: '. $projekt->naziv,
            'flash_message_important' => true
        ]);
    }
}
