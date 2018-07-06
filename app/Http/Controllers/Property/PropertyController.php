<?php

namespace App\Http\Controllers\Property;
use App\Http\Controllers\Controller;
use App\Property;
use Illuminate\Http\Request;
use App\Http\Requests\RequestpropertyUpdate;

class PropertyController extends Controller
{

    public function get($id){

        $bien = Property::find($id);
        $proprietaire = $bien->user;
        $medias = $bien->medias;

        return view('advisor.edit-propriété', compact('bien', $bien, 'proprietaire', $proprietaire, 'medias', $medias));
    }

    public function update(RequestpropertyUpdate $request, $id){

        $request->offsetUnset('_token');
        $request = $request->toArray();
        $bien = Property::find($id);

        foreach($request as $key => $value){
            $bien->$key = $value;
        }
        $bien->save();

        return back();
    }

    public function updateState(Request $request, $id){
        $bien = Property::find($id);
        $bien->state = $request->state;
        $bien->save();
        return back();
    }
    


}
