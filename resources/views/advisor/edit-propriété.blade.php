@extends('layouts.app')

@section('content')

<h1> Le bien à louer </h1>
<br>

<h2> Lien vers le site lifeimmo.com <h2>
    <form method="POST"  action="/conseiller/administration/bien/{{$bien->id}}/update/url">
        <input id="link" type="url" class="form-control{{ $errors->has('link') ? ' is-invalid' : '' }}" name="link" value="{{$bien->link}}" placeholder="http://www.lifeimmo.com/"required >
        @csrf
        @if ($errors->has('link'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('link') }}</strong>
            </span>
        @endif
        <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Enregistrer') }}
                    </button>
                </div>
            </div>
        </form>



<h2> Etat du bien </h2>
    <form method="post" action="/conseiller/administration/bien/{{$bien->id}}/update/state">
        @csrf
        <p>Etat du bien
            <select name="state" >
                <option @if($bien->state == 0) selected @endif value=0>
                    En traitement
                </option>
                <option @if($bien->state == 1) selected @endif value=1>
                    A louer
                </option>
                <option @if($bien->state == 2) selected @endif value=2>
                    Loué
                </option>
            </select>
        </p>
        <button type="submit">
            {{ __('Valider') }}
        </button>
    </form>
<br><br><br>


@include('forms.administreBien')

<br><br><br>

<h2> Médias actuels</h2>
@if(isset($medias))

    <h4> Photos <h4>
    @foreach($medias->where('name', 'photo') as $key => $value)
        <img src={{asset("storage/$value->path/$value->file")}} width="300" height="200">
        <form method="POST"  action="/conseiller/administration/bien/media/{{$value->id}}/delete">
            @csrf
                <button type="submit" >
                    {{ __('Supprimer') }}
                </button>
        </form>
    @endforeach

    <h4> Photos 360 <h4>
    @foreach($medias->where('name', 'photo_360') as $key => $value)
        <a href="{{$value->path}}" target=_blank>{{$value->path}}</a> 
        <form method="POST"  action="/conseiller/administration/bien/media/{{$value->id}}/delete">
            @csrf
                <button type="submit" >
                    {{ __('Supprimer') }}
                </button>
        </form>
    @endforeach

    <h4> Vidéo <h4>
    @foreach($medias->where('name', 'video') as $key => $value)
        <iframe width="940" height="720" src="{{$value->path}}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
        <form method="POST"  action="/conseiller/administration/bien/media/{{$value->id}}/delete">
            @csrf
                <button type="submit" >
                    {{ __('Supprimer') }}
                </button>
        </form>
    @endforeach

    <h4> Visite virtuelle <h4>
    @foreach($medias->where('name', 'visite_virtuelle') as $key => $value)
        <a href="{{$value->path}}" target=_blank>{{$value->path}}</a> 
        <form method="POST"  action="/conseiller/administration/bien/media/{{$value->id}}/delete">
            @csrf
                <button type="submit" >
                    {{ __('Supprimer') }}
                </button>
        </form>
    @endforeach


@endif

<br>

<h2> Ajouter des Médias </h2>
@foreach ($nameMedia as $key => $value)


<h4> Ajouter une {{$key}} </h4>

<form method="POST" enctype='multipart/form-data' action="/conseiller/administration/bien/{{$bien->id}}/media/create">
    @csrf

    @if($value == 'photo')
    <div class="form-group">
        <input type="file" class="form-control {{ $errors->has('file') ? 'is-invalid' : '' }}" name="file" id="file"  value="{{ old('file') }}" required>
    </div>
    @elseif($value == 'video')
    <div class="col-md-6">
            <label for="url">Entrez le code d intégration de la vidéo (youtube)</label>
            <input id="url" type="text" class="form-control{{ $errors->has('url') ? ' is-invalid' : '' }}" name="url" value="{{ old('url') }}" required >

            @if ($errors->has('url'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('url') }}</strong>
                </span>
            @endif
        </div>
    @else
    <div class="col-md-6">
            <label for="url">Entrez l url du média: </label>
            <input id="url" type="url" class="form-control{{ $errors->has('url') ? ' is-invalid' : '' }}" name="url" value="{{ old('url') }}" placeholder="https://example.com"required >

            @if ($errors->has('url'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('url') }}</strong>
                </span>
            @endif
    </div>
    @endif

    <input type='hidden' value={{$value}} name='name'/>
        
    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Enregistrer') }}
            </button>
        </div>
    </div>
</form>

@endforeach


@endsection


