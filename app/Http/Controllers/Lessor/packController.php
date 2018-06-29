<?php

namespace App\Http\Controllers\Lessor;
use App\Http\Controllers\Controller;
use App\Http\Requests\RequestProperty;
use Illuminate\Http\Request;
use App\Property;
use App\Order;

class packController extends Controller
{

    public function storePack(Request $request)
    {
        //store pack into session
        //session()->put('step', 'lessorPack');
        $request->offsetUnset('_token');
        $request->session()->put('demande', $request->all());

        /*//go to the next form
        $demande = session()->get('demande');
        return view ('lessor.leBien', compact('demande', $demande));*/

        return redirect('/bailleur/bien');
    }

    public function updatePack(Request $request)
    {
        //store pack into session
        //session()->put('step', 'lessorPack');
        $request->offsetUnset('_token');
        $request->session()->put('demande', $request->all());

        /*//go to the next form
        $demande = session()->get('demande');
        return view ('lessor.leBien', compact('demande', $demande));*/

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
