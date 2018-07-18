<?php


namespace App\Http\Controllers\Guest;
use App\Http\Controllers\Controller;
use App\Http\Requests\RequestUpdateUser;
use Illuminate\Http\Request;

class GuestController extends Controller
{


    public function contactInformation()
    { 


        if(auth()->check()){
            if (session('action') == 'bailleur') {
                return redirect('/bailleur/récapitulatif');
            }elseif( session('action') == 'locataire'){
                return redirect('/locataire/rendez-vous');
            }
        }

        if (auth()->guest()) {
            if(session()->has('guest')){
                $client = session()->get('guest');
                return view ('guest.coordonnees', compact('client', $client));
            }else{
                return view ('guest.coordonnees');
            } 
        }

        return redirect('/home');
     
    }

    public function storeContactInformation(RequestUpdateUser $request)
    {

        $request->offsetUnset('_token');
        $request->session()->put('guest', $request->all());
        //session()->put('step', 'lessorClient');

        if (session('action') == 'bailleur') {
            return redirect('/bailleur/récapitulatif');
        }elseif( session('action') == 'locataire'){
            return redirect('/locataire/rendez-vous');
        }else{
            return back();
        }
    }

    public function updateContactInformation(RequestUpdateUser $request)
    {

        $request->offsetUnset('_token');
        $request->session()->put('guest', $request->all());
        return back();
    }

}
