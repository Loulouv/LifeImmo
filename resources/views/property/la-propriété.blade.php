@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

    <img src={{asset("storage/".$medias->where('name', 'photo')->first()->path."/".$medias->where('name', 'photo')->first()->file)}} style='width:20%;float:left;'>

        <h2>{{$bien->name}}</h2>
        <p> {{$bien->type}} , {{$bien->area}} m², {{$bien->rooms}} pièces, {{$bien->city}}</p>
        <h2>{{$bien->price}} euros</h2>


        <p> {{$bien->description}} </p>
    

        <p> Pour plus d informations </p>
        <a href="{{$bien->link}}" target=_blank>{{$bien->link}}</a> 





        <form method="POST"  action="/locataire/index">
            @csrf
                <button type="submit" >
                    {{ __('Programmer un rendez-vous') }}
                </button>
            
        </form>

    </div>
</div>
</div>
</div>


@endsection