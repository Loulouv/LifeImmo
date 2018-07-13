@extends('layouts.app')

@section('content')



@if(session()->has('guest'))
    @include('forms.modifyCoordonnees')
@else
    @include('forms.coordonnees')
@endif
<p> Vos coordonnées ne seront pas enregistrée dans la base de donnée du site </p>


@endsection