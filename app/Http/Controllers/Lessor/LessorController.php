<?php

namespace App\Http\Controllers\Lessor;
use App\Http\Controllers\Controller;
use App\Http\Requests\RequestProperty;
use Illuminate\Http\Request;
use App\Property;
use App\Order;
use App\Option;
use Illuminate\Support\Facades\DB;
use App\Mail\Bailleur;
use App\Mail\CommandeAdvisor;
use Illuminate\Support\Facades\Mail;

class LessorController extends Controller
{

    public function lessor()
    {
        //session()->put('step', 'lessorPack');
        session()->put('action', 'bailleur');
        return view ('lessor.bailleur');
    }

    
    public function recap()
    {
        //dd(session()->get('demande'));
        if(!empty(session('demande')) and !empty(session('bien'))){
            //session()->put('step', 'recap');
            $demande = session()->get('demande');
            $bien = session()->get('bien');
            if (auth()->guest() and !empty(session('guest'))) {
                $client = session()->get('guest');
            }elseif ( auth()->check()) {
                $client = auth()->user();
            }else{
                return view ('lessor.bailleur');
            }

            return view ('lessor.recap', compact('demande', $demande, 'bien', $bien, 'client', $client));

        }
        else{
            return view ('lessor.bailleur');
        }
       
    }

    public function finish(Request $request){

        $request->validate([
            'g-recaptcha-response' => 'required|captcha'
        ]);

        $demande = session()->get('demande');
        $bien = session()->get('bien');
        $surface = $bien['surface'];

        //les différentes variables
        $options = [
            'Communication' => 1.2,
            'Photo 360' => 2.1,
            'Flyers' => 3.3,
            'Prise de rdv' => 4.5,
            'Présélection des candidats' => 5.4,
            'Visites' => 6.7,
            'Constitution des dossiers' => 7.6,
            'Rédaction du Bail' => 9.8,
            "Rédaction de l\'EDL" => 10.9,
            'Remise du dossier complet' => 1.1,
            'Vidéo' => 1.2
        ];
        $total = 0;
        $packComplet = 399;
        $packSummer = 199;

        //calcule du prix
        if($demande['pack'] == 'complet'){
            $total = $packComplet;
        }
        if($demande['pack'] == 'summer'){
            $total = $packSummer;
        }
        if($demande['pack'] == 'carte'){
            foreach($demande['choixOption'] as $value){
                    $total = $total + intval($options[$value] * $surface);   
                }      
            
            $total = intval($total);
            if($total >= $packComplet){
                $total = $packComplet;
            }
            if($total >= $packSummer and  !in_array(['Communication',  'Vidéo', 'Photo 360', 'Flyers'], $demande['choixOption'])){
                $total = $packSummer;
            }
        }


        //enregitrement dans la BDD quand l'utilisateur est connecté
        if (auth()->check()) {
            
            $user = auth()->user();
            
            DB::beginTransaction();
            try {
    
                $property = new Property;
                $property->type  = $bien['type'];
                $property->area  = $bien['surface'];
                $property->rooms  = $bien['room'];
                $property->address = $bien['addresse'];
                $property->cp     = $bien['cp'];
                $property->city   = $bien['city'];  
                $property->user_id = $user->id;
                $property->save();

                $order = new Order;
                $order->pack =  $demande['pack'];
                $order->price =  $total;
                $order->user_id = $user->id;
                $order->property_id =  $property->id;
                $order->save();

                foreach($demande['choixOption'] as $value){
                    $option = new Option;       
                    $option->name = $value;
                    $option->order_id = $order->id;
                    $option->save();
                }

            } catch(Exception $e) {
                DB::rollBack();
                throw $e;
            }

            Mail::to($user['email'])->send(new Bailleur($demande, $bien, $user));

            DB::commit();
            
        }
        //envoie du mail pour l'utilisateur non connecté
        if(auth()->guest()){
            $user = session()->get('guest');
            Mail::to($user['email'])->send(new Bailleur($demande, $bien, $user));
        }

        //mail pour le conseillé
        Mail::send(new CommandeAdvisor($demande, $bien, $user));           
        

        return redirect('/bailleur/success');
    }

    public function success(){

        return view ('lessor.success');
    }

   
}
