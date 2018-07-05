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

    public function finish(){

        $demande = session()->get('demande');
        $bien = session()->get('bien');
        $surface = $bien['surface'];

        //les différentes variables
        $options = [
            'com' => 1.2,
            'photo360' => 2.1,
            'fly' => 3.3,
            'rdv' => 4.5,
            'can' => 5.4,
            'vis' => 6.7,
            'dos' => 7.6,
            'bail' => 9.8,
            'edl' => 10.9,
            'dosc' => 1.1,
            'vod' => 1.2
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
                switch ($value) {
                    case 'Communication':
                      $total = $total + intval($options['com'] * $surface);
                      break;
                    case 'Vidéo':
                      $total = $total + intval($options['vod'] * $surface);
                      break;
                    case 'Photo 360':
                      $total = $total + intval($options['photo360'] * $surface);
                      break;
                    case 'Flyers':
                      $total = $total + intval($options['fly'] * $surface);
                      break;
                    case 'Prise de rdv':
                      $total = $total + intval($options['rdv'] * $surface);
                      break;
                    case 'Présélection des candidats':
                      $total = $total + intval($options['can'] * $surface);
                      break;
                    case 'Visites':
                      $total = $total + intval($options['vis'] * $surface);
                      break;
                    case 'Constitution des dossiers':
                      $total = $total + intval($options['dos'] * $surface);
                      break;
                    case 'Rédaction du Bail':
                      $total = $total + intval($options['bail'] * $surface);
                      break;
                    case 'Rédaction de l\'EDL':
                      $total = $total + intval($options['edl'] * $surface);
                      break;
                    case 'Remise du dossier complet':
                      $total = $total + intval($options['dosc'] * $surface);
                      break;
                }               
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
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
