@extends('layouts.app')

@section('content')

@if($state == 0)
<h1> Nouvelles commandes </h1>
@elseif($state == 1)
<h1> Commandes en cour </h1>
@elseif($state == 2)
<h1> Commandes terminées </h1>
@endif

    @foreach($order as $key => $value)
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __("Pack : $value->pack" ) }}</div>
                            <div class="card-body">
                                <h3> Infos </h3>
                                <p> dâte de la commande : {{ $value->created_at }} </p>
                                <p> Client : {{$value->user->fname}} {{$value->user->sname}} </p>
                                <h3> Avancement </h3>

                                <form method="post" action="/conseiller/administration/commande/{{$value->id}}/update/options">
                                    @csrf
                                    @foreach($value->options as $key1 => $value1)

                                        <input type='checkbox' name="optionId{{$key1}}" value={{$value1->id}} id={{$key1}} @if($value1->state == 1)checked @endif/>
                                        <label for={{$key1}}> {{ $value1->name }} </label><br />

                                    @endforeach

                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Valider') }}
                                    </button>
                                </form>

                                
                                    
                                <form method="post" action="/conseiller/administration/commande/{{$value->id}}/update">
                                    @csrf
                                    <p>Etat de la commande
                                        <select name="state" >
                                            <option @if($value->state == 0) selected @endif value=0>
                                                Nouvelle
                                            </option>
                                            <option @if($value->state == 1) selected @endif value=1>
                                                En traitement
                                            </option>
                                            <option @if($value->state == 2) selected @endif value=2>
                                                Traitée
                                            </option>
                                        </select>
                                    </p>
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Valider') }}
                                        </button>
                                </form>
                                <a class="nav-link" href="/conseiller/administration/commande/{{$value->id}}">@lang('Plus d\'informations')</a>
                                <a class="nav-link" href="/conseiller/administration/bien/{{$value->propertyId}}">@lang('Accéder à la propriété')</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@endsection