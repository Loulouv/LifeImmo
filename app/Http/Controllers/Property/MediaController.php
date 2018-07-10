<?php

namespace App\Http\Controllers\Property;
use App\Http\Controllers\Controller;
use App\Property;
use App\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MediaController extends Controller
{

    /**
     * Pour enregistrer un médias
     *
     * 
     */
    public function create(Request $request, $id)
    {
        //nom du média
        $name = $request->name;

        if($name == 'photo'){
            //utilisateur
            $user = Property::find($id)->user;
            //nombre de médias
            $medias = Media::where(['property_id' => $id, 'name' => $name])->count();
            //chemin pour sauvegarder les fichiers
            $path = "Properties/property$id/$name";

            //renomage du fichier
            $file = $id . '_' . $name . '_'. $medias . '.' . $request->file('file')->getClientOriginalExtension();

            DB::beginTransaction();
            try {
            //enregistrement en bdd
            $media = new Media;
            $media->name = $name; 
            $media->file = $file; 
            $media->path = $path; 
            $media->property_id = $id;
            $media->save();

            $request->file('file')->storeAs($path, $file, 'public');

            } catch(Exception $e) {
                DB::rollBack();
                throw $e;
            }
            DB::commit();
        }elseif($name == 'video'){

            preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $request->url, $url);
            $url = $url[0];
            $url = "https://www.".$url;
            //dd($url);

            $media = new Media;
            $media->name = $name; 
            $media->path = $url; 
            $media->property_id = $id;
            $media->save();

        }else{
            $media = new Media;
            $media->name = $name; 
            $media->path = $request->url; 
            $media->property_id = $id;
            $media->save();
        }

        return back();
        
    }

    public function delete($id){

        $media = Media::findOrFail($id);

        if($media->name == 'photo'){
            DB::beginTransaction();
            try {
                $file = storage_path().'/app/public/'.$media->path.'/'.$media->file;
                $media->delete();
                unlink($file);
            } catch(Exception $e) {
                DB::rollBack();
                throw $e;
            }
            DB::commit(); 
        }else{
            $media->delete();
        }

        return back();

    }




}
