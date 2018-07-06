@extends('layouts.app')

@section('content')

<li class="nav-item">
    <a class="nav-link" href="/conseiller/administration">@lang('Les clients')</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="/conseiller/administration">@lang('Les Biens')</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="/conseiller/administration/commandes">@lang('Les commandes')</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="/conseiller/administration">@lang('Visites')</a>
</li>



@endsection