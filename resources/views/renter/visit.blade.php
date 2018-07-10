@extends('layouts.app')

@section('content')

<h1> Planification de la visite </h1>

<pr>
<h3> veuillez entrer vos disponibilités </h3>
<form action='/locataire/rendez-vous/validate' method='post'>
    @csrf
    <div>
        <input type='date' name='date' class="form-control{{ $errors->has('date') ? ' is-invalid' : '' }}" required>
            @if ($errors->has('date'))
                <span class="invalid-feedback">
                <strong>{{ $errors->first('date') }}</strong>
                </span>
            @endif
        <input type='time' name='time' class="form-control{{ $errors->has('time') ? ' is-invalid' : '' }}" required>
            @if ($errors->has('time'))
                <span class="invalid-feedback">
                <strong>{{ $errors->first('time') }}</strong>
                </span>
            @endif
        <textarea name='disponibility' placeholder='Entrez vos autres disponibilitées' class="form-control{{ $errors->has('disponibility') ? ' is-invalid' : '' }}"></textarea>
            @if ($errors->has('disponibility'))
                <span class="invalid-feedback">
                <strong>{{ $errors->first('disponibility') }}</strong>
                </span>
            @endif
        <p><input type='submit' value='valider' /></p>
    </div>
</form>


@endsection