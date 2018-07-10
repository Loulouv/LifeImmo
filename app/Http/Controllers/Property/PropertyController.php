<?php

namespace App\Http\Controllers\Property;
use App\Http\Controllers\Controller;
use App\Property;
use Illuminate\Http\Request;
use App\Http\Requests\RequestpropertyUpdate;

class PropertyController extends Controller
{

    public function getRenting(){
        //les biens : state = 1, c'est à dire en location
        $biens = Property::where('state', 1)->get()->all();

        foreach($biens as $key => $value){
            $biens[$key]['medias'] = $value->medias->where('name', 'photo')->first();
        }

        return view('property.rent', compact('biens', $biens));
    }



    public function get($id){

        $nameMedia = [
            'photo' => 'photo',
            'photo 360' => 'photo_360',
            'vidéo' => 'video',
            'visite virtuelle'=> 'visite_virtuelle'
        ];
        $bien = Property::find($id);
        $proprietaire = $bien->user;
        $medias = $bien->medias;

        if(auth()->check() and auth()->user()->state == 0){
            return view('advisor.edit-propriété', compact('bien', $bien, 'proprietaire', $proprietaire, 'medias', $medias, 'nameMedia', $nameMedia));
        }else{
            return view('property.la-propriété', compact('bien', $bien, 'medias', $medias));
        }
        

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
    
    public function updateUrl(Request $request, $id){
        $bien = Property::find($id);
        $bien->link = $request->link;
        $bien->save();
        return back();
    }


}
