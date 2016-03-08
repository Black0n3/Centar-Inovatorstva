<?php

namespace App\Http\Controllers;

use Request;
use App\Http\Requests;
use Image; 
use Input;
use Carbon\Carbon;
use Auth;



use App\Http\Controllers\Controller;
use App\Novosti;


class DBNovostiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $novosti = Novosti::all();
        return view('dashboard.novosti.index', compact('novosti'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.novosti.dodaj', compact('kategorije'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\NovostiRequest $request)
    {
         //validate
        if(Input::hasFile('slika')){
           
            $random_tekst   = str_random(40);
            $input          = new Novosti(Request::all());
            $slika          = Input::file('slika');
            $ext            = $slika->getClientOriginalExtension();
            $naziv          = public_path('uploads/novosti/'.$random_tekst.'.'.$ext);
            $velika          = public_path('uploads/novosti/v_'.$random_tekst.'.'.$ext);
            
            $input['slika'] = 'uploads/novosti/'.$random_tekst.'.'.$ext;
            $input['velika_slika'] = 'uploads/novosti/v_'.$random_tekst.'.'.$ext;
            

            Image::make($slika)->resize(1920, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($naziv);
            Image::make($slika)->resize(1920, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($velika);
            $id = Auth::user()->novosti()->save($input)->id;
           
            
           
            return redirect ('dashboard/novosti/'. $id .'/slika')->with([
                
                'flash_message' => 'Novost dodana! Uredite sliku kako bi se novost prikazala na web stranicama',
                'flash_message_important' => true
                
            ]);
        }
    }
    
    public function slika( $id)
    {
        $novost = Novosti::FindOrFail($id);
        return view('dashboard.novosti.slika', compact('novost'));
    }
    
    public function slikaspremi(Request $request, $id)
    {
        
        $novost = Novosti::FindOrFail($id); 
        
            $input = Request::all();
           
            $w = $input['w'];
            $h = $input['h'];
            $x = $input['x'];
            $y = $input['y'];
            
            $w = round($w,0);
            $h = round($h,0);
            $x = round($x,0);
            $y = round($y,0);
            
            $img = Image::make($novost->slika);
            $img->crop($w, $h, $x, $y);
            $img->save();
            $novost->visible = '1';
            $novost->save();
            return redirect ('dashboard/novosti/create')->with([
                'flash_message' => 'Novost uspješno objavljena',
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $novost = Novosti::FindOrFail($id);
        return view('dashboard.novosti.uredi', compact('novost'));
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
        $novost = Novosti::FindOrFail($id);
        $stara_slika = $novost->slika;
        $redirect = 'dashboard/novosti/'. $id .'/edit';
        
        $input = Request::all();
        if(Input::hasFile('slika')){
            $redirect = 'dashboard/novosti/'. $id .'/slika';
            $random_tekst   = str_random(40);
            $slika          = Input::file('slika');
            $ext            = $slika->getClientOriginalExtension();
            
            $naziv          = public_path('uploads/novosti/'.$random_tekst.'.'.$ext);
            $velika          = public_path('uploads/novosti/v_'.$random_tekst.'.'.$ext);
            
            $nova_slika = 'uploads/novosti/'.$random_tekst.'.'.$ext;
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
        

        $novost->update($input);
        
        return redirect ($redirect)->with([
              
            'flash_message' => 'Uspješno ste uredili novost: '. $novost->naziv,
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
        $novost = Novosti::FindOrFail($id);
        $slika = $novost->slika;
        $velika_slika = $novost->vekika_slika;
        $novost->delete();
        \File::delete($slika);
        \File::delete($velika_slika);
        return redirect ('dashboard/novosti')->with([
            'flash_message' => 'Uspješno ste obrisali novosti: '. $novost->naziv,
            'flash_message_important' => true
        ]);
    }
}
