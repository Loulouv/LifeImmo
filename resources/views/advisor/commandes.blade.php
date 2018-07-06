@extends('layouts.app')

@section('content')

<li class="nav-item">
    <a class="nav-link" href="/conseiller/administration/commandes/etat/0">@lang('Nouvelles commandes')</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="/conseiller/administration/commandes/etat/1">@lang('Commandes en cours')</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="/conseiller/administration/commandes/etat/2">@lang('Commandes terminées')</a>
</li>


@endsection