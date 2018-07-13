@extends('layouts.app')

@section('content')

<h1>Biens à louer</h1>

@isset($biens)
@foreach($biens as $key => $value)

<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __($value->name) }}</div>
                    <div class="card-body">
                        
                        

                        <img src={{asset("storage/".$value->medias->path."/".$value->medias->file)}} style='width:20%;float:left;'>

                        <h2>{{$value->name}}</h2>
                        <p> {{$value->type}} , {{$value->area}} m², {{$value->rooms}} pièces, {{$value->city}}</p>
                        <h2>{{$value->price}} euros</h2>




                            <a class="nav-link" href="/bien/{{$value->id}}">@lang('Informations sur le bien')</a>


                           <form method="POST"  action="/locataire/index">
                                @csrf
                                <input type="hidden" name="propertyId" value="{{$value->id}}"  />
                                <button type="submit" >
                                    {{ __('Programmer un rendez-vous') }}
                                </button>
                            
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@else
<p> "Il n'y a pas de biens en location" </p>
@endisset

@endsection