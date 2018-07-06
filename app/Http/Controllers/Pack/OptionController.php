<?php

namespace App\Http\Controllers\Pack;
use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class OptionController extends Controller
{


    public function update(Request $request, $id){

        $request->offsetUnset('_token');
        $options = Order::find($id)->options->all();
        $request = $request->toArray();

        DB::beginTransaction();
        try 
        {
            foreach($options as $key => $value){
                if(in_array($value->id, $request) and $value->state == 0){
                    $value->state = 1;
                    $value->save();
                }
                if(!in_array($value->id, $request) and $value->state == 1){
                    $value->state = 0;
                    $value->save();
                }              
            }
        } catch(Exception $e){
            DB::rollBack();
            throw $e;
        }
        DB::commit();

        return back();
    }


    public function get(){
       
    }

}
