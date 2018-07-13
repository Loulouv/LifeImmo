@extends('layouts.app')

@section('content')

<h2>Votre bien </h2>

<p>Type du bien : {{$bien['type']}} </p>
<p>Adresse: {{$bien['addresse']}} </p>
<p>Code postal: {{$bien['cp']}} </p>
<p>Ville : {{$bien['city']}} </p>
<p>Surface : {{$bien['surface']}} </p>
<p>Nombre de pièces : {{$bien['room']}} </p>


<h2>Votre demande</h2>

<p>Pack : {{$demande['pack']}} </p>
<p>Services </p>
@foreach($demande['choixOption'] as $key => $value)
<p> {{$value}} </p>
@endforeach


<h2>Vos coordonnées</h2>


<p>Nom : {{$client['fname']}} </p>
<p>Prénom: {{$client['sname']}} </p>
<p>Mail : {{$client['email']}} </p>
<p>Téléphone: {{$client['phone']}} </p>


    <form method="POST" action="/bailleur/finish">
        @csrf
        <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                        @captcha
                        @if ($errors->has('g-recaptcha-response'))
                            <span class="help-block">
                                <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                            </span>
                        @endif
                    <button type="submit" class="btn btn-primary">
                        {{ __('Envoyer ma commande') }}
                    </button>
                </div>
            </div>
    </form>


@endsection