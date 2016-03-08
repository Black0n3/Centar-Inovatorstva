<?php

namespace App\Http\Controllers;

use Request;
use Image; 
use Input;
use Response;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Pristupnica;
use App\User;

class DBPristupnicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pristupnice = Pristupnica::all();
        return view('dashboard.pristupnica.index', compact('pristupnice'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clan = Pristupnica::FindOrFail($id);
        return view('dashboard.pristupnica.uredi', compact('clan'));
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
        $pristupnica = Pristupnica::FindOrFail($id);
        $pristupnica->delete();
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

    public function broj()
    {
        $broj = Pristupnica::count();
        return Response::json($broj);
    }

     
    public function destroy($id)
    {
        $pristupnica = Pristupnica::FindOrFail($id);
        $pristupnica->delete();
       
        return redirect ('dashboard/pristupnica')->with([
            'flash_message' => 'Uspješno ste obrisali pristupnicu: '. $pristupnica->name,
            'flash_message_important' => true
        ]);
    }
}
