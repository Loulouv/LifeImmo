<?php

namespace App\Http\Controllers\Lessor;

use Illuminate\Http\Request;

class LessorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pack()
    {
        return view ('lessor.bailleur');
    }

    public function storePack()
    {
        return redirect('/bailleur/bien');
    }

    public function bien()
    {
        return view ('lessor.leBien');
    }

    public function storeBien()
    {
        return redirect('/profile/edit');
    }

    public function contactInformation()
    {
        return view ('guest.contact');
    }

    public function storeContactInformation()
    {
        return redirect('/profile/edit');
    }

    public function recap()
    {
        return view ('lessor.recap');
    }

    public function finish(){
        
        return redirect('/profile/success');
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
