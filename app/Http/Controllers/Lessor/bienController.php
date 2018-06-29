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
        $demande = session()->get('demande');
        return view ('lessor.leBien', compact('demande', $demande));

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
