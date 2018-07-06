<?php

namespace App\Http\Controllers\Pack;
use App\Http\Controllers\Controller;
use App\Order;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    
    public function commandeState($state){
        $order = Order::where('state', $state)->get()->all();
        
        foreach($order as $key => $value){
            $order[$key]['user'] = $order[$key]->user;
            $order[$key]['options'] = $order[$key]->options->all();
        }
        return view('advisor.commandes-state', compact('order', $order, 'state', $state));
    }

    public function update(Request $request, $id){
        $order = Order::find($id);
        $order->state = $request->state;


        if($request->state == 2){
            $options = $order->options->all();

            DB::beginTransaction();
            try 
            {
                $order->save();
                foreach($options as $key => $value){
                    if($value->state != 1){
                        $value->state = 1;
                        $value->save();
                    }
                }

            } catch(Exception $e){
                DB::rollBack();
                throw $e;
            }
            DB::commit();
            
            //envoyer un mail : a faire
        }

        return back();
    }



    public function getCommande($id){
        $order = Order::find($id);
        $order['user'] = $order->user;
        $order['options'] = $order->options->all();
        $order['property'] = $order->property;
        return view('advisor.la-commande', compact('order', $order));
    }



}
