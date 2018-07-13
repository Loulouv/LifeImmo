<h2>votre bien</h2>

{{-- 
<form method="post" action="/bailleur/bien/update">
    @csrf
--}}
    <p>Type de bien
    <select name="type" >
        <option @if($bien['type'] == 'Appartement') selected @endif>
        Appartement
        </option>
        <option @if($bien['type'] == 'Maison') selected @endif>
        Maison
        </option>
    </select>
    </p>


    <div class="form-group row">
        <label for="adresse" class="col-md-4 col-form-label text-md-right">{{ __('Addresse') }}</label>

        <div class="col-md-6">
            <input id="addresse" type="text" class="form-control{{ $errors->has('addresse') ? ' is-invalid' : '' }}" name="addresse" value="{{$bien['addresse']}}" required autofocus>

            @if($errors->has('addresse'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('addresse') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
            <label for="cp" class="col-md-4 col-form-label text-md-right">{{ __('Code Postal') }}</label>

            <div class="col-md-6">
                <input id="cp" type="postal-code" class="form-control{{ $errors->has('cp') ? ' is-invalid' : '' }}" name="cp" value="{{$bien['cp']}}" required autofocus>

                @if($errors->has('cp'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('cp') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
                <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('Ville') }}</label>
        
                <div class="col-md-6">
                    <input id="city" type="text" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" value="{{$bien['city']}}" required autofocus>
        
                    @if($errors->has('city'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('city') }}</strong>
                        </span>
                    @endif
                </div>
        </div>

        <div class="form-group row">
                <label for="surface" class="col-md-4 col-form-label text-md-right">{{ __('La surface de votre bien en m² ') }}</label>
        
                <div class="col-md-6">
                    <input id="surface" type="number" class="form-control{{ $errors->has('surface') ? ' is-invalid' : '' }}" name="surface" step="0.01" placeholder='m²' value="{{$bien['surface']}}" required autofocus>
        
                    @if($errors->has('surface'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('surface') }}</strong>
                        </span>
                    @endif
                </div>
        </div>

        <div class="form-group row">
                <label for="room" class="col-md-4 col-form-label text-md-right">{{ __('Le nombre de pièces') }}</label>
        
                <div class="col-md-6">
                    <input id="room" type="number" class="form-control{{ $errors->has('room') ? ' is-invalid' : '' }}" name="room" value="{{$bien['room']}}" required autofocus>
        
                    @if($errors->has('room'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('room') }}</strong>
                        </span>
                    @endif
                </div>
        </div>
    
{{--        <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Modifier') }}
                    </button>
                </div>
        </div>

    </form>
--}}