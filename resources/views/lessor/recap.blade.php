@extends('layouts.app')

@section('content')


    @include('forms.modifyBien')

<h2>Votre demande</h2>

<p>Pack : {{$demande['pack']}} </p>
<p>Services </p>
@foreach($demande['choixOption'] as $key => $value)
<p> {{$value}} </p>
@endforeach


    @include('forms.modifyCoordonnees')

    <form method="POST" action="/bailleur/finish">
        @csrf
        <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Envoyer ma commande') }}
                    </button>
                </div>
            </div>
    </form>


@endsection