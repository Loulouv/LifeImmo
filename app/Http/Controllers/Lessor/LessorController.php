<?php

namespace App\Http\Controllers\Lessor;
use App\Http\Controllers\Controller;
use App\Http\Requests\RequestProperty;
use Illuminate\Http\Request;
use App\Property;
use App\Order;

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

        if ( auth()->check()) {
            $demande = session()->get('demande');
            $bien = session()->get('bien');
            $user = auth()->user();
    
            $property = new Property;
            $property->type  = $bien['type'];
            $property->area  = $bien['surface'];
            $property->rooms  = $bien['room'];
            $property->address = $bien['addresse'];
            $property->cp     = $bien['cp'];
            $property->city   = $bien['city'];           
            $user->property()->save($property);

            $date=date("m.d.y");
            $state = "En attente";
            $order = new Order;
            $stmtRequest->bindParam(':r_pack', $_POST["pack"]);
            $stmtRequest->bindParam(':r_state', $state);
            $stmtRequest->bindParam(':u_id', $idUser["user_id"]);
            $stmtRequest->bindParam(':p_id', $dernier_id);
            $stmtRequest->execute();
            
        }






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
