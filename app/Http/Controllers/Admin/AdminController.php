<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Order;
use App\Option;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function TableauBord(){
        return view('advisor.tableau-de-bord');
    }

    public function commandes(){
        return view('advisor.commandes');
    }





}
