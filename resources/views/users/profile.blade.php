@extends('layouts.app')

@section('content')

    <h2 class="profil" >information du compte</h2 >

	<div class="container">
		<dl class="row">
			<dt class="col-sm-3"></dt>
			<dt class="col-sm-3">Nom</dt>
			<dd class="col-sm-6">{{ $user->fname }}</dd>
			<dt class="col-sm-3"></dt>
			<dt class="col-sm-3">Prénom</dt>
			<dd class="col-sm-6">{{ $user->sname }}</dd>
			<dt class="col-sm-3"></dt>
			<dt class="col-sm-3">Courriel</dt>
			<dd class="col-sm-6">{{ $user->email }}</dd>
            <dt class="col-sm-3"></dt>
            <dt class="col-sm-3">Téléphone</dt>
			<dd class="col-sm-6">{{ $user->phone }}</dd>
            <dt class="col-sm-3"></dt>
            <dt class="col-sm-3">address</dt>
			<dd class="col-sm-6">{{ $user->address }}</dd>
            <dt class="col-sm-3"></dt>
            <dt class="col-sm-3">Code postal</dt>
			<dd class="col-sm-6">{{ $user->cp }}</dd>
            <dt class="col-sm-3"></dt>
            <dt class="col-sm-3">Ville</dt>
			<dd class="col-sm-6">{{ $user->city }}</dd>
            <dt class="col-sm-3"></dt>

		</dl>
    </div>
    
    <li class="nav-item">
		<a class="nav-link" href="/profile/edit">@lang('Modifier votre profile')</a>
		<a class="nav-link" href="/document/edit">@lang('Vos documents')</a>
    </li>


@endsection