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
        $request->offsetUnset('_token');
        $request->session()->put('demande', $request->all());

        return redirect('/bailleur/bien');
    }

    public function updatePack(Request $request)
    {
        //store pack into session
        $request->offsetUnset('_token');
        $request->session()->put('demande', $request->all());

        return back();
    }


}
