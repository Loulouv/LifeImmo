<?php

namespace App\Http\Controllers\Lessor;
use App\Http\Controllers\Controller;
use App\Http\Requests\RequestProperty;
use Illuminate\Http\Request;
use App\Property;
use App\Order;

class bienController extends Controller
{

    public function bien()
    {
        //session()->forget('step');
        //$demande = session()->get('demande');
        if(session()->has('bien')){
            $bien = session()->get('bien');
            return view ('lessor.leBien', compact('bien', $bien));
        }else{
            return view ('lessor.leBien');
        }

    }

    public function storeBien(RequestProperty $request)
    {
        //store bien into session
        $request->offsetUnset('_token');
        $request->session()->put('bien', $request->all());
        //session()->put('step', 'lessorBien');

        if (auth()->guest()) {
            return redirect('/bailleur/contact');
        }elseif ( auth()->check()) {
            return redirect('/bailleur/récapitulatif');
        }else{
            return back();
        }
    }

    public function updateBien(RequestProperty $request)
    {
        //store bien into session
        $request->offsetUnset('_token');
        $request->session()->put('bien', $request->all());

            return back();
                    
    }

}
