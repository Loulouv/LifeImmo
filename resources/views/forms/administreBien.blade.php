
                @csrf

                <h3> Général  </h3>

                <p>Type de bien
                <select name="type" >
                    <option @if($bien->type == 'Appartement') selected @endif>
                    Appartement
                    </option>
                    <option @if($bien->type == 'Maison') selected @endif>
                    Maison
                    </option>
                </select>
                </p>
                           

                <div class="form-group row">
                    <label for="adresse" class="col-md-4 col-form-label text-md-right">{{ __('Addresse') }}</label>
            
                    <div class="col-md-6">
                        <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{$bien->address}}" required autofocus>
            
                        @if($errors->has('address'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('address') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            
                <div class="form-group row">
                        <label for="cp" class="col-md-4 col-form-label text-md-right">{{ __('Code Postal') }}</label>
            
                        <div class="col-md-6">
                            <input id="cp" type="postal-code" class="form-control{{ $errors->has('cp') ? ' is-invalid' : '' }}" name="cp" value="{{$bien->cp}}" required autofocus>
            
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
                                <input id="city" type="text" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" value="{{$bien->city}}" required autofocus>
                    
                                @if($errors->has('city'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </div>
            
                    <div class="form-group row">
                            <label for="area" class="col-md-4 col-form-label text-md-right">{{ __('La surface habitable en m² ') }}</label>
                    
                            <div class="col-md-6">
                                <input id="area" type="number" class="form-control{{ $errors->has('area') ? ' is-invalid' : '' }}" name="area" step="0.01" placeholder='m²' value="{{$bien->area}}" required autofocus>
                    
                                @if($errors->has('area'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('area') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </div>
            
                    <div class="form-group row">
                            <label for="rooms" class="col-md-4 col-form-label text-md-right">{{ __('Le nombre de pièces') }}</label>
                    
                            <div class="col-md-6">
                                <input id="rooms" type="number" class="form-control{{ $errors->has('rooms') ? ' is-invalid' : '' }}" name="rooms" value="{{$bien->rooms}}" min="1" step="1" required autofocus>
                    
                                @if($errors->has('rooms'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('rooms') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </div>

                    <div class="form-group row">
                        <label for="furniture" class="col-md-4 col-form-label text-md-right">{{ __('Meublé') }}</label>
                
                        <div class="col-md-6">
                            <input id="furniture" type="text" class="form-control{{ $errors->has('furniture') ? ' is-invalid' : '' }}" name="furniture" value="{{$bien->furniture}}"autofocus>
                
                            @if($errors->has('furniture'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('furniture') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description de l\'offre') }}</label>
                
                        <div class="col-md-6">
                            <input id="description" type="textarea" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{$bien->description}}" autofocus>
                
                            @if($errors->has('description'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Prix pour la location du bien') }}</label>
                
                        <div class="col-md-6">
                            <input id="price" type="number" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" value="{{$bien->price}}" autofocus>
                
                            @if($errors->has('price'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('price') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>


                <h3> Détails </h3>

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Petit descriptif ') }}</label>
            
                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{$bien->name}}" autofocus>
            
                        @if($errors->has('name'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="building" class="col-md-4 col-form-label text-md-right">{{ __('Nom de l\'immeuble (pour un appartement) ') }}</label>
            
                    <div class="col-md-6">
                        <input id="building" type="text" class="form-control{{ $errors->has('building') ? ' is-invalid' : '' }}" name="building" value="{{$bien->building}}" autofocus>
            
                        @if($errors->has('building'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('building') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="floor" class="col-md-4 col-form-label text-md-right">{{ __('Etage (pour un appartement) ') }}</label>
            
                    <div class="col-md-6">
                        <input id="floor" type="number" class="form-control{{ $errors->has('floor') ? ' is-invalid' : '' }}" name="floor" value="{{$bien->floor}}" autofocus>
            
                        @if($errors->has('floor'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('floor') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="energy_class" class="col-md-4 col-form-label text-md-right">{{ __('Classe énergie') }}</label>
            
                    <div class="col-md-6">
                        <input id="energy_class" type="text" class="form-control{{ $errors->has('energy_class') ? ' is-invalid' : '' }}" name="energy_class" value="{{$bien->energy_class}}" autofocus>
            
                        @if($errors->has('energy_class'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('energy_class') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="ges" class="col-md-4 col-form-label text-md-right">{{ __('GES') }}</label>
            
                    <div class="col-md-6">
                        <input id="ges" type="text" class="form-control{{ $errors->has('ges') ? ' is-invalid' : '' }}" name="ges" value="{{$bien->ges}}" autofocus>
            
                        @if($errors->has('ges'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('ges') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                    <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Modifier') }}
                                </button>
                            </div>
                    </div>
            
</form>


