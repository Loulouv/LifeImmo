
<form method="post" action="/bailleur/bien/save">
    @csrf

    <h1>Proposez votre bien</h1>

    <p>Type de bien
    <select name="type">
        <option>
        Appartement
        </option>
        <option>
        Maison
        </option>
    </select>
    </p>


    <div class="form-group row">
        <label for="adresse" class="col-md-4 col-form-label text-md-right">{{ __('Addresse') }}</label>

        <div class="col-md-6">
            <input id="addresse" type="text" class="form-control{{ $errors->has('addresse') ? ' is-invalid' : '' }}" name="addresse" required autofocus>

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
                <input id="cp" type="postal-code" class="form-control{{ $errors->has('cp') ? ' is-invalid' : '' }}" name="cp" required autofocus>

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
                    <input id="city" type="text" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" required autofocus>
        
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
                    <input id="surface" type="number" class="form-control{{ $errors->has('surface') ? ' is-invalid' : '' }}" name="surface" min="1" step="0.01" placeholder='m²' required autofocus>
        
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
                    <input id="room" type="number" class="form-control{{ $errors->has('room') ? ' is-invalid' : '' }}" name="room" min="1" step="1" required autofocus>
        
                    @if($errors->has('room'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('room') }}</strong>
                        </span>
                    @endif
                </div>
        </div>
    
    <input type="submit"  value="Continuer"/>
    </form>