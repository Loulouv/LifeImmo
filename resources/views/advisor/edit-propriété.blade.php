@extends('layouts.app')

@section('content')

<h1> Le bien à louer </h1>


<h2> Etat du bien </h2>
<form method="post" action="/conseiller/administration/bien/{{$bien->id}}/update/state">
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

<h2>Informations générales</h2>
<form method="post" action="/conseiller/administration/bien/{{$bien->id}}/update">
@include('forms.administreBien')


<h2> Médias actuels</h2>
@if(isset($medias))
@foreach($medias as $key => $value)

    @if($value->name == 'photo')
    @endif
    @if($value->name == 'photo 360')
    @endif
    @if($value->name == 'video')
    @endif
    @if($value->name == 'virtuel')
    @endif

@endforeach
@endif

<h2> Ajouter des Médias </h2>



@endsection

