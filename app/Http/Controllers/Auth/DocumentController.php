<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestDocument;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Document;
use Response;
use Auth;
use Validator;
use ZipArchive;
//use Chumper\Zipper\Zipper;

class DocumentController extends Controller
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


     /**
     * fenetre de gestion des document d'un utilisateur
     *
     * @return document
     */
    public function gestion(){

        $documents = [
            "identite" => 'identite',
            "emploi" => "attestation d emploi",
            "imposition" => "avis d imposition",
            "taxe" => "taxe d habitation",
            "quittance" => "quittance",
            "Kbis" => "Kbis"
        ];
        $revenu = [
            'justificatif de revenu 1',
            "justificatif de revenu 2",
            "justificatif de revenu 3"
        ];
        $loyer =[
            "quittance loyer 1",
            "quittance loyer 2",
            "quittance loyer 3"
        ];

        $user = auth()->user();
        $userDocuments = Document::where('user_id' , '=', $user->id)->get();

        foreach($userDocuments as $key){
            //si le nom de $userDocuments est dans $documents alors :
            if($key->name == 'justificatif de revenu 1' or 'justificatif de revenu 2' or 'justificatif de revenu 3'){
                if(in_array($key->name, $revenu)){
                    unset($revenu[array_search($key->name, $revenu)]);
                }
            }
            if($key->name == 'quittance loyer 1' or 'quittance loyer 2' or 'quittance loyer 3'){
                if(in_array($key->name, $loyer)){
                    unset($loyer[array_search($key->name, $loyer)]);
                }
            }
            
            if(in_array($key->name, $documents) ){
                unset($documents[array_search($key->name, $documents)]);
            }
        }

        if(!empty($revenu)){
            $documents['revenu'] =  $revenu;
        }
        if(!empty($loyer)){
            $documents['loyer'] = $loyer;
        }
        
        //return view ('users.doc', compact('userDocuments', $userDocuments, 'documents', $documents));
    return view ('users.doc', compact('userDocuments', $userDocuments, 'documents', $documents/*, 'justification', $justification*/));
    }

        
    /**
     * Pour créer un document
     *
     * 
     */
    public function create(RequestDocument $request)
    {
        //utilisateur
        $user = auth()->user();

        //$document = Document::firstOrCreate('name', $request->nom); 
        
        /*$request->validate([
            'document' => 'required|max:10000|mimes:doc,pdf,docx,zip,application/vnd.openxmlformats-officedocument.wordprocessingml.document,jpeg,png,jpg',
        ]);*/

        
        //chemin pour sauvegarder les fichiers
        $path = "Users/user$user->id/Documents";

        //$name = $request->file('document')->getClientOriginalName();
        
        //le nom du document
        $docname = $request->get('nom');       	
        $docname = preg_replace('/ /', '_', $docname);

        //renomage du fichier
        $docname = $user->id . '_' . $docname . '.' . $request->file('document')->getClientOriginalExtension();

        //enregistrement en bdd
        $document = new Document;
        //$document = Document::updateOrCreate( ['user_id'  => $user->id], ['name', $request->get('nom')] ); 
        $document->name = $request->get('nom'); 
        $document->rname = $docname; 
        $document->path = $path; 
        //$document->file = $request->get('size'); 

        $request->file('document')->storeAs($path, $docname, 'local');

        $user->documents()->save($document);

        return back();
        //return view ('users.edit', compact('user', $user))->with('message', 'Le profil a bien été mis à jour');
        
    }


    /**
     * Pour modifier un document
     *
     * 
     */
    public function update(RequestDocument $request)
    {
        /*$request->validate([
            'document' => 'required|max:10000|mimes:doc,pdf,docx,zip,application/vnd.openxmlformats-officedocument.wordprocessingml.document,jpeg,png,jpg',
        ]);*/

        //utilisateur
        $user = auth()->user();

        //chemin pour sauvegarder les images
        $path = "Users/user$user->id/Documents";

        //le nom du document
        $docname = $request->get('nom');       	
        $docname = preg_replace('/ /', '_', $docname);

        //renomage du fichier
        $docname = $user->id . '_' . $docname . '.' . $request->file('document')->getClientOriginalExtension();

        //enregistrement en bdd
        $document = Document::findOrFail($request->documentId);
        $file = storage_path().'/app/'.$document->path.'/'.$document->rname;
        $document->name = $request->get('nom'); 
        $document->rname = $docname; 
        $document->path = $path;

        unlink($file);
        $request->file('document')->storeAs($path, $docname, 'local');

        $document->save();

        return back();
        //return view ('users.edit', compact('user', $user))->with('message', 'Le profil a bien été mis à jour');
        
    }


    /**
     * Pour supprimer un document
     *
     * 
     */
    public function delete(Request $request){

        $document = Document::findOrFail($request->documentId);
        $file = storage_path().'/app/'.$document->path.'/'.$document->rname;

        unlink($file);

        $document->delete();

        return back();
    }


    /**
     * Pour supprimer un document
     *
     * 
     */
    public function deleteAll(Request $request){

        $user = auth()->user();

        $document = Document::where('user_id', $user->id)->get()->all();

        foreach($document as $key => $value){
            $file = storage_path().'/app/'.$value->path.'/'.$value->rname;

            unlink($file);
    
            $value->delete();
        }

        return back();
    }


    /**
     * Pour récupérer un document
     *
     * 
     */
    public function download(Request $request){

        $document = Document::findOrFail($request->documentId);
        $file = storage_path().'/app/'.$document->path.'/'.$document->rname;

        return Response::download($file);

    }


    /**
     * Pour récupérer tous les documents d'un utilisateur
     *
     * 
     */
    public function downloadAll(){

        //utilisateur
        $user = auth()->user();
        if(isset(request()->userId)){

        }elseif(empty(request()->userId)){
            $id = $user->id;
        }

        $pathZip = storage_path().'/app/'."Users/user$user->id/DocZip/Documents.zip";
        $files = storage_path().'/app/'."Users/user$user->id/Documents/";

        $zipper = new \Chumper\Zipper\Zipper;
        $zipper->make($pathZip)->add($files);
        $zipper->close();

        return Response::download($pathZip, 'Documents.zip');

    }


}
