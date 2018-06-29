@extends('layouts.app')

@section('content')

@if($errors->count() > 0)
    <div class="row  justify-content-center">
        <div class="col-md-8 col-md-offset-2">
            <div class="alert alert-danger">
                <button data-dismiss="alert" type="button" class="close">x</button>
                    @foreach( $errors->all() as $message)
                        <b>Erreur!</b> {{ $message }}
                    @endforeach
            </div>
        </div>
    </div>
@endif

@if(empty($userDocuments->first()))
@else
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Vos documents') }}</div>

                <div class="card-body">
                    
                        @foreach($userDocuments as $doc)
                        <form method="POST" action="/document/update" enctype='multipart/form-data' >
                            @csrf

                            <p> {{ $doc->name }} </p>
                            <div class="form-group">
                                <input type="file" class="form-control {{ $errors->has('file') ? 'is-invalid' : '' }}" name="document" id="file"  value="{{ old('file') }}" required>
                            </div>
                            <input type='hidden' value="{{$doc->name}}" name='nom'/>
                            <input type='hidden' value={{$doc->id}} name='documentId'/>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Modifier') }}
                                    </button>
                                </div>
                            </div>
                        </form>

                        <form method="POST" action="/document/delete">
                            @csrf
                            <input type='hidden' value={{$doc->id}} name='documentId'/>
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('supprimer') }}
                                    </button>
                        </form>

                        <form method="POST" action="/document/load">
                            @csrf
                            <input type='hidden' value={{$doc->id}} name='documentId'/>
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Télécharger') }}
                                    </button>
                        </form>

                        @endforeach


                    </div>

                <form method="POST" action="/document/load/all">
                    @csrf
                        <button type="submit" class="btn btn-primary">
                            {{ __('Tout Télécharger') }}
                        </button>
                </form>
                <form method="POST" action="/document/delete/all">
                    @csrf
                        <button type="submit" class="btn btn-primary">
                            {{ __('Tout supprimer') }}
                        </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endif


@if(!empty($documents)))
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Vous pouvez importer vos documents si vous le voulez') }}</div>
                    <div class="card-body">
                        @foreach($documents as $doc => $value)

                            @if($doc == 'identite')
                                Carte nationale d identité, passeport, permis de conduire ou carte de séjour
                            @elseif($doc == 'emploi')
                                Contrat de travail ou attestation d emploi (précisant la nature du contrat et la rémunération)                            
                            @elseif($doc == 'imposition')                                   
                                Dernier avis d imposition (recto/verso)                        
                            @elseif($doc == 'taxe')
                                Dernière taxe d habitation                                                           
                            @elseif($doc == 'quittance')
                                Dernière quittance EDF ou Telecom
                            @elseif($doc == 'Kbis')
                                Extrait Kbis pour les sociétés

                            @elseif($doc == 'revenu')
                                @if(!empty($value))
                                    Trois derniers bulletins de salaire et/ou justificatifs de revenus sur les trois derniers mois (sauf profession libérale)
                                @endif
                                @foreach($value as $justificatif => $donnee)
                                    <form method="POST" enctype='multipart/form-data' action="/document/create">
                                        @csrf

                                        {{ $donnee }} 
                                        <div class="form-group">
                                            <input type="file" class="form-control {{ $errors->has('file') ? 'is-invalid' : '' }}" name="document" id="file"  value="{{ old('file') }}" required>
                                        </div>

                                        <input type='hidden' value="{{$donnee}}" name='nom'/>
                                            
                                        <div class="form-group row mb-0">
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Enregistrer') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                @endforeach
                                                        
                            @elseif($doc == 'loyer')
                                @if(!empty($value))
                                    Trois dernières quittances de loyer ou taxe foncière ou attestation du propriétaire précisant que vous êtes à jour dans le réglement des loyers
                                @endif
                                @foreach($value as $loyer => $donnee)
                                    <form method="POST" enctype='multipart/form-data' action="/document/create">
                                        @csrf

                                        {{ $donnee }} 
                                        <div class="form-group">
                                            <input type="file" class="form-control {{ $errors->has('file') ? 'is-invalid' : '' }}" name="document" id="file"  value="{{ old('file') }}" required>
                                        </div>

                                        <input type='hidden' value="{{$donnee}}" name='nom'/>
                                            
                                        <div class="form-group row mb-0">
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Enregistrer') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                @endforeach
                            @endif  

                            @if($doc != 'revenu' and $doc !=  'loyer')
                                <form method="POST" enctype='multipart/form-data' action="/document/create">
                                    @csrf
                                    {{ $doc }} 

                                    <div class="form-group">
                                        <input type="file" class="form-control {{ $errors->has('file') ? 'is-invalid' : '' }}" name="document" id="file"  value="{{ old('file') }}" required>
                                    </div>

                                    <input type='hidden' value="{{ $value }}" name='nom'/>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Enregistrer') }}
                                            </button>
                                        </div>
                                    </div>
                                    
                                </form>
                            @endif

                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endif


@endsection
