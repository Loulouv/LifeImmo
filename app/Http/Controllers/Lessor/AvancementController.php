<?php

namespace App\Http\Controllers\Lessor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Option;

class AvancementController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $user = auth()->user();
        $commandes = $user->orders->where('state', '0');

        foreach($commandes as $key => $value){
            $commandes[$key]['options'] = $commandes[$key]->options->all();
        }
        
        return view('users.commandes', compact('commandes', $commandes));
    }

}
