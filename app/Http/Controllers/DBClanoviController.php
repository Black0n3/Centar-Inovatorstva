<?php

namespace App\Http\Controllers;

use Request;
use Image; 
use Input;

use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class DBClanoviController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clanovi = User::all();
        return view('dashboard.clanovi.index', compact('clanovi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.clanovi.dodaj', compact('kategorije'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $clan = new User(Request::all());
         if(Input::hasFile('slika')){
           
            $random_tekst   = str_random(40);
            $slika          = Input::file('slika');
            $ext            = $slika->getClientOriginalExtension();
            $naziv          = public_path('uploads/profil/'.$random_tekst.'.'.$ext);
            
            
            $clan['slika'] = 'uploads/profil/'.$random_tekst.'.'.$ext;
            

            Image::make($slika)->resize(1200, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($naziv);
          
            $clan['password'] = \Hash::make($clan->password);
            $clan->save();
            
            $insertedId = $clan->id;
            

            return redirect ('dashboard/clanovi/'. $insertedId .'/slika')->with([
                
                'flash_message' => 'Uspješno ste dodali novog člana!',
                'flash_message_important' => true
                
            ]);
         }else{
             
            $clan['password'] = \Hash::make($clan->password);
            $clan->save();


            return redirect ('dashboard/clanovi')->with([
                
                'flash_message' => 'Uspješno ste dodali novog člana!',
                'flash_message_important' => true
                
            ]); 
             
             
             
            
         }
        
    }


    
    public function slika($id)
    {
        $clan = User::FindOrFail($id);
        return view('dashboard.clanovi.slika', compact('clan'));
    }
    
    public function profil_lozinka($id)
    {
        $user = User::FindOrFail($id);
        return view('dashboard.clanovi.lozinka', compact('user'));
    }
    
   public function slikaspremi(Request $request, $id)
    {
        
        $clan = User::FindOrFail($id);
        
            $input = Request::all();
           
            $w = $input['w'];
            $h = $input['h'];
            $x = $input['x'];
            $y = $input['y'];
            
            $w = round($w,0);
            $h = round($h,0);
            $x = round($x,0);
            $y = round($y,0);
            
            $img = Image::make($clan->slika);
            $img->crop($w, $h, $x, $y);
            $img->save();
            $clan->save();
            return redirect ('dashboard/clanovi')->with([
                'flash_message' => 'Sve promjene uspješno spremljene!',
                'flash_message_important' => true
            ]);
       
    }
    
    public function profil_lozinka_spremi(Requests\LozinkaRequest $request, $id)
    {
       
        $now_password   = Input::get('trenutna_lozinka');
        $password = Input::get('nova_lozinka');
        $user = User::where('id', $id)->first();
        if(\Hash::check($now_password, $user->password)){
        
            $user->password = \Hash::make($password);
            $user->save();
            
            return redirect ('dashboard/clanovi/'.$id.'/edit')->with([
                'flash_message' => 'Lozinka uspješno promjenjena!',
                'flash_message_important' => true
        ]);
       
        } else{
            
            return redirect ('dashboard/clanovi/'.$id.'/lozinka')->with([
                'flash_message' => 'Došlo je do progreške, niste dobro unjeli trenutnu lozinku!',
                'flash_message_important' => true
        ]);
            
        }
        
        

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clan = User::FindOrFail($id);
        return view('dashboard.clanovi.uredi', compact('clan'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_password($id)
    {
        $clan = User::FindOrFail($id);
        return view('dashboard.clanovi.uredipass', compact('clan'));
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
        $clan = User::FindOrFail($id);
        $input = Request::all();
        
    

        $stara_slika = $clan->slika;
        $redirect = 'dashboard/clanovi/'. $id .'/edit';
        

        if(Input::hasFile('slika')){
            $redirect = 'dashboard/clanovi/'. $id .'/slika';
            $random_tekst   = str_random(40);
            $slika          = Input::file('slika');
            $ext            = $slika->getClientOriginalExtension();
            
            $naziv          = public_path('uploads/profil/'.$random_tekst.'.'.$ext);

            $nova_slika = 'uploads/profil/'.$random_tekst.'.'.$ext;
            $input['slika'] = $nova_slika;
            
            Image::make($slika)->resize(1024, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($naziv);
            
            \File::delete($stara_slika);

        }else{
            $input['slika'] = $stara_slika;
        }
        

        $clan->update($input);
        
        return redirect ($redirect)->with([
              
            'flash_message' => 'Uspješno ste uredili člana: '. $clan->name,
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
        //
    }
}
