<?php

namespace App\Http\Controllers\Renter;
use App\Http\Controllers\Controller;
use App\Visit;
use App\Property;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Mail\Locataire;
use App\Mail\LocataireToAdvisor;
use Illuminate\Support\Facades\Mail;

class VisitController extends Controller
{
    public function index(Request $request){

        session()->put('action', 'locataire');
        session()->put('propertyId', $request->propertyId);

        if (auth()->guest()) {
            return redirect ('/locataire/contact');
        }elseif ( auth()->check()) {
            return redirect ('/document/edit');
        }else{
            //return view ('lessor.bailleur');
            return back();
        }

    }

    public function visit(){

        return view('renter.visit');
    }

    public function validateVisit(Request $request){

        $request->offsetUnset('_token');
        $bien = Property::find(session()->get('propertyId'));
        $demande = [
            'date' => $request->get('date'),
            'time'=> $request->get('time'),
            'disponibility' => $request->get('disponibility'),
        ];
 
        if (auth()->guest()) {
            $user = session()->get('guest');
            //mail pour l'utilisateur
            Mail::to($user['email'])->send(new Locataire($demande, $bien, $user));
            //mail pour le conseillé
            Mail::send(new LocataireToAdvisor($demande, $bien, $user));           
        }
        if ( auth()->check()) {
            $user = auth()->user();
            $dateTime = $demande['date'].' '.$demande['time'].':00';
            DB::beginTransaction();
            try {
                $visit = new Visit;
                $visit->date = $dateTime;
                $visit->disponibility = $demande['disponibility'];
                $visit->property_id = $bien->id;
                $visit->user_id = $user->id;
                $visit->save();
            } catch(Exception $e) {
                DB::rollBack();
                throw $e;
            }
            //mail pour l'utilisateur
            Mail::to($user->email)->send(new Locataire($demande, $bien, $user));
            //mail pour le conseillé
            Mail::send(new LocataireToAdvisor($demande, $bien, $user));           
            DB::commit();
        }

        return view('renter.merci');
    }




}
