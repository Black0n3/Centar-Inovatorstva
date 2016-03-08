<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Galerija;
use App\GalerijaSlike;

class DBGalerijaSlikeController extends Controller
{
  
    public function create()
    {
        return view('dashboard.slike.dodaj');
    }

    public function edit($id)
    {
        $slika = GalerijaSlike::FindOrFail($id);
        return view('dashboard.slike.uredi', compact('slika'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slika = GalerijaSlike::FindOrFail($id);
        $galerija = $slika->galerija_id;
        \File::delete($slika->slika);
        \File::delete($slika->vekika_slika);
        $slika->delete();
        
        return redirect ('dashboard/galerija/' . $galerija)->with([
            'flash_message' => 'Uspješno ste obrisali sliku',
            'flash_message_important' => true
        ]);
    }
}
