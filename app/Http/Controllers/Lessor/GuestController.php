<?php


namespace App\Http\Controllers\Lessor;
use App\Http\Controllers\Controller;
use App\Http\Requests\RequestUpdateUser;
use Illuminate\Http\Request;

class GuestController extends Controller
{


    public function contactInformation()
    { 
        
        //session()->forget('step');
        return view ('guest.coordonnees');
            
        //session()->put('step', 'lessorContact');       
    }

    public function storeContactInformation(RequestUpdateUser $request)
    {

        $request->offsetUnset('_token');
        $request->session()->put('guest', $request->all());
        //session()->put('step', 'lessorClient');

        if (session('action') == 'bailleur') {
            return redirect('/bailleur/récapitulatif');
        }elseif( session('action') == 'renter'){
            //return redirect('/bailleur/récapitulatif');
        }else{
            return back();
        }
    }

    public function updateContactInformation(RequestUpdateUser $request)
    {

        $request->offsetUnset('_token');
        $request->session()->put('guest', $request->all());
        //session()->put('step', 'lessorClient');

        /*if (session('action') == 'bailleur') {
            return redirect('/bailleur/récapitulatif');
        }elseif( session('action') == 'renter'){
            //return redirect('/bailleur/récapitulatif');
        }else{
            return back();
        }*/
        return back();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
