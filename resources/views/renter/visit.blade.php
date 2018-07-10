@extends('layouts.app')

@section('content')

<h1> Planification de la visite </h1>

<pr>
<h3> veuillez entrer vos disponibilités </h3>
<form action='/locataire/rendez-vous/validate' method='post'>
    @csrf
    <div>
        <input type='date' name='date'>
        <input type='time' name='time'>
        <textarea name='disponibility' placeholder='Entrez vos autres disponibilitées'></textarea>
        <p><input type='submit' value='valider' /></p>
    </div>
</form>


@endsection