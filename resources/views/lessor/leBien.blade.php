@extends('layouts.app')

@section('content')


@if(session()->has('bien')))
<form method="post" action="/bailleur/bien/save">
    @csrf
    @include('forms.modifyBien')
    <input type="submit"  value="Continuer"/>
</form>
@else
@include('forms.createBien')
@endif

@endsection