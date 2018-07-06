@extends('layouts.app')

@section('content')

<h1> Commande {{ $order->id }}  </h1>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __("Pack : $order->pack" ) }}</div>
                    <div class="card-body">
                        <h3> Infos </h3>
                            <p> dâte de la commande : {{ $order->created_at }} </p>
                            <p> Client : {{$order->user->fname}} {{$order->user->sname}} </p>

                        <h3> Avancement </h3>
                            <form method="post" action="/conseiller/administration/commande/{{$order->id}}/update/options">
                                @csrf
                                @foreach($order->options as $key => $value)
                                    <input type='checkbox' name="optionId{{$key}}" value={{$value->id}} id={{$key}} @if($value->state == 1)checked @endif/>
                                    <label for={{$key}}> {{ $value->name }} </label><br />
                                @endforeach
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Valider') }}
                                </button>
                            </form>

                        <h3> Etat </h3>
                            <form method="post" action="/conseiller/administration/commande/{{$order->id}}/update">
                                @csrf
                                <p>Etat de la commande
                                    <select name="state" >
                                        <option @if($order->state == 0) selected @endif value=0>
                                            Nouvelle
                                        </option>
                                        <option @if($order->state == 1) selected @endif value=1>
                                            En traitement
                                        </option>
                                        <option @if($order->state == 2) selected @endif value=2>
                                            Traitée
                                        </option>
                                    </select>
                                </p>
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Valider') }}
                                    </button>
                            </form>


                        <h3> Client </h3>
                            <p> Nom : {{ $order->user->fname }} </p>
                            <p> Prénom : {{ $order->user->sname }} </p>
                            <p> Mail : {{ $order->user->email }} </p>
                            <p> Téléphone : {{ $order->user->phone }} </p>

                        <h3> Le bien à louer </h3>
                            <p> Type de bien : {{ $order->property->type }} </p>
                            <p> Addresse : {{ $order->property->address }} </p>
                            <p> Code postal : {{ $order->property->cp }} </p>
                            <p> Ville : {{ $order->property->city}} </p>
                            <p>  sa Surface : {{ $order->property->area }} m²</p>
                            <p> Nombre de pièces : {{ $order->property->rooms }} </p>

                            <a class="nav-link" href="/conseiller/administration/bien/{{$order->property->id}}">@lang('Accéder à la propriété')</a>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

