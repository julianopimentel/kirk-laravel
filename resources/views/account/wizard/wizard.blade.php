<x-app-layout layout="boxedfancy" :assets="$assets ?? []">
    <div>
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Pré-cadastro</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="form-wizard1" class="text-center mt-3" method="POST" action="{{ route('wizard.store') }}">
                                @csrf
                                {!! csrf_field() !!}
                            <ul id="top-tab-list" class="p-0 row list-inline">
                                <li class="col-lg-3 col-md-6 text-start mb-2 active" id="account">
                                    <a href="javascript:void();">
                                        <div class="iq-icon me-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                        </div>
                                        <span>Dados Pessoal</span>
                                    </a>
                                </li>
                                <li id="personal" class="col-lg-3 col-md-6 mb-2 text-start">
                                    <a href="javascript:void();">
                                        <div class="iq-icon me-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                        </div>
                                        <span>Endereço</span>
                                    </a>
                                </li>
                                <li id="confirm" class="col-lg-3 col-md-6 mb-2 text-start">
                                    <a href="javascript:void();">
                                        <div class="iq-icon me-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7" />
                                            </svg>
                                        </div>
                                        <span>Finalização</span>
                                    </a>
                                </li>
                            </ul>
                            <!-- fieldsets -->
                            <fieldset>
                                <div class="form-card text-start">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Nome: *</label>
                                                <input class="form-control" id='name' name="name" type="text"
                                                    value='{{ Auth::user()->name }}' maxlength="250" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Email: *</label>
                                                <input class="form-control" id='email' name="email" type="email"
                                                    value="{{ Auth::user()->email }}" disabled>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-sm-4">
                                                <label class="form-label">Celular @if ($campo->obg_mobile == true)
                                                    *
                                                @endif</label>
                                                <div class="input-group">
                                                    <div class="input-group mb-3">
                                                        <input class="form-control" id="phone" name="phone"
                                                            type="tel" value="{{ Auth::user()->phone }}" @if ($campo->obg_mobile == true)
                                                            required
                                                        @endif>
                                                        <span id="valid-msg" class="hide">✓ Valid</span>
                                                        <span id="error-msg" class="hide"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-3">
                                                <label class="form-label">Data de Nascimento @if ($campo->obg_birth == true)
                                                    *
                                                @endif</label>
                                                <div class="input-group">
                                                    <input class="form-control" name="birth_at" type="date"
                                                        placeholder="date" @if ($campo->obg_birth == true)
                                                        required
                                                    @endif>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-3">
                                                <label class="form-label">Sexo @if ($campo->obg_sex == true)
                                                    *
                                                @endif</label>
                                                <div class="col-md-12 col-form-label">
                                                    <div class="form-check form-check-inline mr-2">
                                                        <input class="form-check-input" type="radio"
                                                            value="m" name="sex"
                                                            @if ($campo->sex == true) required @endif>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor"
                                                            class="bi bi-gender-male" viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd"
                                                                d="M9.5 2a.5.5 0 0 1 0-1h5a.5.5 0 0 1 .5.5v5a.5.5 0 0 1-1 0V2.707L9.871 6.836a5 5 0 1 1-.707-.707L13.293 2H9.5zM6 6a4 4 0 1 0 0 8 4 4 0 0 0 0-8z" />
                                                        </svg>
                                                        <label class="form-check-label"
                                                            for="m">{{ __('people.m') }}</label>
                                                    </div>
                                                    <div class="form-check form-check-inline mr-2">
                                                        <input class="form-check-input" type="radio"
                                                            value="f" name="sex"
                                                            @if ($campo->sex == true) required @endif>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor"
                                                            class="bi bi-gender-female" viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd"
                                                                d="M8 1a4 4 0 1 0 0 8 4 4 0 0 0 0-8zM3 5a5 5 0 1 1 5.5 4.975V12h2a.5.5 0 0 1 0 1h-2v2.5a.5.5 0 0 1-1 0V13h-2a.5.5 0 0 1 0-1h2V9.975A5 5 0 0 1 3 5z" />
                                                        </svg>
                                                        <label class="form-check-label"
                                                            for="f">{{ __('people.f') }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" name="next"
                                    class="btn btn-primary next action-button float-end"
                                    value="Next">Próximo</button>
                            </fieldset>
                            <fieldset>
                                <div class="form-card text-start">
                                    <div class="row">
                                        @if ($campo->geolocation == true)
                                            <div id="map"></div>
                                            <ul id="geoData">
                                                <div class="row">
                                                    <div class="form-group col-sm-6">
                                                        <label for="city">{{ __('people.lat') }}</label>
                                                        <div class="input-group-prepend">
                                                            <span name="lat-span" id="lat-span"></span>
                                                        </div>
                                                        <input class="form-control" name="lat-span" type="text">
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label for="city">{{ __('people.long') }}</label>
                                                        <div class="input-group-prepend">
                                                            <span name="lon-span" id="lon-span"></span>
                                                        </div>
                                                        <input class="form-control" name="lon-span" type="text">
                                                    </div>
                                                    Por favor copiar valores nos campos acima ao selecionar
                                                    o
                                                    local no
                                                    mapa
                                                </div>
                                            </ul>
                                        @else
                                            <div class="row">
                                                <div class="form-group col-sm-8">
                                                    <label class="form-label">{{ __('people.street') }}</label>
                                                    <div class="input-group">
                                                        <input class="form-control" name="address" type="text"
                                                            placeholder="{{ __('people.enter_street') }}">
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label class="form-label">{{ __('people.postal_code') }}</label>
                                                    <div class="input-group">
                                                        <input class="form-control" name="cep" type="text"
                                                            placeholder="{{ __('people.enter_postal') }}"
                                                            pattern="[0-9]{5}-[0-9]{3}" maxlength="9">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-sm-4">
                                                    <label class="form-label">{{ __('people.country') }}</label>
                                                    <div class="input-group">
                                                        <select id="country-dd" name="country-dd"
                                                            class="form-select">
                                                            <option value="">
                                                                {{ __('layout.select') }}
                                                            </option>
                                                            @foreach ($countries as $data)
                                                                <option value="{{ $data->id }}">
                                                                    {{ $data->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label class="form-label">{{ __('people.state') }}
                                                        @if ($campo->obg_state == true)
                                                            *
                                                        @endif
                                                    </label>
                                                    <div class="input-group">
                                                        <select name="state-dd" id="state-dd" class="form-select">
                                                        </select @if ($campo->obg_state == true)
                                                        required
                                        @endif
                                        >
                                    </div>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label class="form-label">{{ __('people.city') }} @if ($campo->obg_city == true)
                                            *
                                        @endif
                                    </label>
                                    <div class="input-group">
                                        <select id="city-dd" name="city-dd" class="form-select">
                                        </select @if ($campo->obg_city == true)
                                        required
                                        @endif
                                        >
                                    </div>
                                </div>
                    </div>
                    @endif
                </div>
            </div>
            <button type="button" name="next" class="btn btn-primary next action-button float-end"
                value="Submit">Próximo</button>
            <button type="button" name="previous"
                class="btn btn-dark previous action-button-previous float-end me-1" value="Previous">Voltar</button>
            </fieldset>

            <fieldset>
                <div class="form-card">

                    <h2 class="text-success text-center"><strong>Finalização !</strong></h2>
                    <br>
                    <div class="row justify-content-center">
                        <div class="col-7 text-center">
                            <h5 class="purple-text text-center">Estaremos enviado esses dados ao responsável, ficando
                                pendente apenas da
                                aprovação para ter os acessos a conta cadastrada.</h5>
                            <br>
                            <button class="btn btn-success btn-lg btn-square pull-right"
                                type="submit">Concluir</button>
                        </div>
                    </div>
                </div>
                <button type="button" name="previous"
                    class="btn btn-dark previous action-button-previous float-end me-1"
                    value="Previous">Voltar</button>
            </fieldset>
            </form>
        </div>
    </div>
    </div>
    </div>
    </div>

                               



    @if ($campo->geolocation == true)
        <style type="text/css">
            #map {
                width: 100%;
                height: 400px;
            }
        </style>
        <script>
            function initMap() {
                var myLatLng = {


                    @if ($locations->lat)
                        {{ $locations->lat }}
                    @endif ,
                    @if ($locations->lng)
                        {{ $locations->lng }}
                    @endif
                };

                var map = new google.maps.Map(document.getElementById('map'), {
                    center: myLatLng,
                    zoom: 16
                });

                var marker = new google.maps.Marker({
                    position: myLatLng,
                    map: map,
                    title: 'Ponto',
                    draggable: true
                });

                google.maps.event.addListener(marker, 'dragend', function(marker) {
                    var latLng = marker.latLng;
                    document.getElementById('lat-span').innerHTML = latLng.lat();
                    document.getElementById('lon-span').innerHTML = latLng.lng();
                });
            }
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?libraries=places&callback=initMap" async defer></script>
    @endif

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#country-dd').on('change', function() {
                var idCountry = this.value;
                $("#state-dd").html('');
                $.ajax({
                    url: "{{ url('api/fetch-states') }}",
                    type: "POST",
                    data: {
                        country_id: idCountry,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#state-dd').html(
                            '<option value="">{{ __('layout.select') }} {{ __('people.state') }}</option>'
                        );
                        $.each(result.states, function(key, value) {
                            $("#state-dd").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                        $('#city-dd').html(
                            '<option value="">{{ __('layout.select') }} {{ __('people.city') }}</option>'
                        );
                    }
                });
            });
            $('#state-dd').on('change', function() {
                var idState = this.value;
                $("#city-dd").html('');
                $.ajax({
                    url: "{{ url('api/fetch-cities') }}",
                    type: "POST",
                    data: {
                        state_id: idState,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(res) {
                        $('#city-dd').html(
                            '<option value="">{{ __('layout.select') }} {{ __('people.city') }}</option>'
                        );
                        $.each(res.cities, function(key, value) {
                            $("#city-dd").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
            });
        });
    </script>

</x-app-layout>
