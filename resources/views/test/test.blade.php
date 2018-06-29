@extends('layouts.app')

@section('content')


<form method="POST" action="/bailleur/pack/save">
    @csrf
  First name:<br>
  <input type="text" name="firstname" value="Mickey"><br>
  Last name:<br>
  <input type="text" name="lastname" value="Mouse"><br><br>

  <div class="form-group row mb-0">
    <div class="col-md-6 offset-md-4">
        <button type="submit" class="btn btn-primary">
            {{ __('envoyer') }}
        </button>
    </div>

</form> 


@endsection
