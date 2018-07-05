@extends('layouts.app')

@section('content')

<h2>Vos commandes</h2 >

    @foreach($commandes as $key => $value)
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __("Pack : $value->pack " ) }}</div>
                            <div class="card-body">
                                <h3> Infos </h3>
                                <p> dâte de la commande : {{ $value->created_at }} </p>
                                <p> Prix : {{ $value->price }} </p>
                                

                                <h3> Avancement </h3>
                                    @foreach($value->options as $key1 => $value1)
                                        <p> {{ $value1->name }} </p>
                                        @if($value1->state == 0)
                                        <p> non traité </p>
                                        @elseif($value1->state == 1)
                                        <p> traité </p>
                                        @endif
                                    @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@endsection