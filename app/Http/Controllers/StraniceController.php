<?php

namespace App\Http\Controllers;

use Request;
use Image; 
use Input;
use Mail;


use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Novosti;
use App\Galerija;
use App\GalerijaSlike;
use App\Projekti;
use App\User;
use App\Stranice;


class StraniceController extends Controller
{
    
    // Novosti
    public function novosti()
    {
        Carbon::setLocale('hr');
        $novosti = Novosti::where('visible', '1')->orderBy('id', 'desc')->paginate(6);
        $zadnji_projekti = Projekti::where('visible', '1')->orderBy('id', 'desc')->take(5)->get();
        $zadnje_galerije = Galerija::where('visible', '1')->orderBy('id', 'desc')->take(5)->get();
        return view('novosti.index', compact('novosti', 'zadnji_projekti', 'zadnje_galerije'));
    }
    
    public function novostPrikaz($id, $naziv)
    {
        $novost = Novosti::FindOrFail($id);
        $zadnji_projekti = Projekti::where('visible', '1')->orderBy('id', 'desc')->take(5)->get();
        $zadnje_galerije = Galerija::where('visible', '1')->orderBy('id', 'desc')->take(5)->get();
        Carbon::setLocale('hr');
        return view('novosti.novost', compact('novost', 'zadnji_projekti', 'zadnje_galerije'));
    }
    
    // Projekti
    public function projekti()
    {
        $projekti = Projekti::where('visible', '1')->orderBy('id', 'desc')
                ->paginate(10);
        $zadnji_projekti = Projekti::where('visible', '1')->orderBy('id', 'desc')->take(5)->get();
        $zadnje_galerije = Galerija::where('visible', '1')->orderBy('id', 'desc')->take(5)->get();
        Carbon::setLocale('hr');
        return view('projekti.index', compact('projekti', 'zadnji_projekti', 'zadnje_galerije'));
    }

    public function projektPrikaz($id)
    {
        $projekt = Projekti::FindOrFail($id);
        $zadnji_projekti = Projekti::orderBy('id', 'desc')->take(5)->get();
        $zadnje_galerije = Galerija::orderBy('id', 'desc')->take(5)->get();
        Carbon::setLocale('hr');
        return view('projekti.projekt', compact('projekt', 'zadnji_projekti', 'zadnje_galerije'));
    }
    
    // Galerija Slika
    public function galerija()
    {
        $galerije = Galerija::where('visible', '1')->orderBy('id', 'desc')->paginate(6);
        $zadnji_projekti = Projekti::where('visible', '1')->orderBy('id', 'desc')->take(5)->get();
        $zadnje_galerije = Galerija::where('visible', '1')->orderBy('id', 'desc')->take(5)->get();
        Carbon::setLocale('hr');
        return view('galerija.index', compact('galerije', 'zadnji_projekti', 'zadnje_galerije'));
    }

    
    public function galerijaPrikaz($id)
    {
        $galerija = Galerija::FindOrFail($id);
        $zadnji_projekti = Projekti::orderBy('id', 'desc')->take(5)->get();
        $zadnje_galerije = Galerija::orderBy('id', 'desc')->take(5)->get();
        Carbon::setLocale('hr');
        return view('galerija.galerija', compact('galerija', 'zadnji_projekti', 'zadnje_galerije'));
    }
    
    public function onama()
    {
        $onama = Stranice::FindOrFail(1);
        return view('stranice.onama', compact('onama'));
    }
    
    public function privacypolicy()
    {
         $zadnji_projekti = Projekti::orderBy('id', 'desc')->take(5)->get();
        $zadnje_galerije = Galerija::orderBy('id', 'desc')->take(5)->get();
        return view('stranice.privacy-policy',compact('zadnji_projekti', 'zadnje_galerije'));
    }
    
    public function pristupnica()
    {
        
        $zadnji_projekti = Projekti::where('visible', '1')->orderBy('id', 'desc')->take(5)->get();
        $zadnje_galerije = Galerija::where('visible', '1')->orderBy('id', 'desc')->take(5)->get();
        return view('stranice.pristupnica', compact('zadnji_projekti', 'zadnje_galerije'));
    }
    
    public function pristupnicaSpremi()
    {
        
        $zadnji_projekti = Projekti::where('visible', '1')->orderBy('id', 'desc')->take(5)->get();
        $zadnje_galerije = Galerija::where('visible', '1')->orderBy('id', 'desc')->take(5)->get();
        return view('stranice.pristupnica', compact('zadnji_projekti', 'zadnje_galerije'));
    }
    
    public function kontakt()
    {
        $kontakti = User::whereIn('vrsta_clana', ['Predsjednik', 'Dopredsjednik', 'Tajnik'])->get();
        return view('stranice.kontakt', compact('kontakti'));
        
    }
    
    
    public function dashboard()
    {
        return view('dashboard.index');
    }
    
    public function profil()
    {
        $user = \Auth::user();
        return view('stranice.profil', compact('user'));
    }
    
    public function profilClanarina()
    {
        $user = \Auth::user();
        return view('stranice.profilclanarine', compact('user'));
    }
    
    public function profilProjekti()
    {
        $user = \Auth::user();
        return view('stranice.profilprojekti', compact('user'));
    }
    
    
    
    public function posaljiemail(Request $request)
    {
        $input = Input::all();
         $data = array(
            'name' => $input['ime'],
            'email' => $input['email'],
            'poruka' => $input['poruka'],
        );

        Mail::send('stranice.mail', $data, function ($message) {
    
            $message->from('brtanivan@gmail.com', 'Centar inovatorstva');
    
            $message->to('antun.web@gmail.com')->subject('Centar inovatorstva / kontakt forma');
    
        });
    
         return redirect ('kontakt')->with([
                'flash_message' => 'Poruka uspješno poslana!',
                'flash_message_important' => true
            ]);
    }
    
    
    /////////////////////////////////
    //profil/////////////////////////
    /////////////////////////////////
    
    
    public function slika()
    {
        $user = \Auth::user();
        $id = $user->id;
        $clan = User::FindOrFail($id);
        return view('stranice.slika', compact('clan','user'));
    }
    
    public function profil_lozinka()
    {
        $user = \Auth::user();
        $id = $user->id;
        $user = User::FindOrFail($id);
        return view('stranice.lozinka', compact('user'));
    }
    
   public function slikaspremi(Request $request)
    {
        $user = \Auth::user();
        $id = $user->id;
        
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
            return redirect ('profil')->with([
                'flash_message' => 'Sve promjene uspješno spremljene!',
                'flash_message_important' => true
            ]);
       
    }
    
    public function profil_lozinka_spremi(Requests\LozinkaRequest $request)
    {
        $user1 = \Auth::user();
        $id = $user1->id;
        
        $now_password   = Input::get('trenutna_lozinka');
        $password = Input::get('nova_lozinka');
        $user = User::where('id', $id)->first();
        if(\Hash::check($now_password, $user->password)){
        
            $user->password = \Hash::make($password);
            $user->save();
            
            return redirect ('profil')->with([
                'flash_message' => 'Lozinka uspješno promjenjena!',
                'flash_message_important' => true
        ]);
       
        } else{
            
            return redirect ('profil/lozinka')->with([
                'flash_message' => 'Došlo je do progreške, niste dobro unjeli trenutnu lozinku!',
                'flash_message_important' => true
        ]);
            
        }
        
        

    }

   
  
    public function update_profil(Request $request)
    {
        $user = \Auth::user();
        $id = $user->id;
        $clan = User::FindOrFail($id);
        $input = Request::all();
        
    

        $stara_slika = $clan->slika;
        $redirect = 'profil';
        

        if(Input::hasFile('slika')){
            $redirect = 'profil/slika';
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
              
            'flash_message' => 'Uspješno ste uredili profilne informacije ',
            'flash_message_important' => true
                
        ]);
    }
    
    

}
