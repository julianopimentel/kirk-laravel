@if ($appPermissao->edit_precadastro == true)
    <x-app-layout :assets="$assets ?? []">
        <div>
            <div class="row">
                <div class="col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                        </div>
                        <div class="col-sm-12">
                            <div class="card-body">
                                <form method="POST" action="{{ route('peopleList.update', $people->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="bd-example">
                                        <nav>
                                            <div class="mb-3 nav nav-tabs" id="nav-tab" role="tablist">
                                                <button class="nav-link active d-flex align-items-center"
                                                    id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home"
                                                    type="button" role="tab" aria-controls="nav-home"
                                                    aria-selected="true">
                                                    <svg width="16" viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M17.294 7.29105C17.294 10.2281 14.9391 12.5831 12 12.5831C9.0619 12.5831 6.70601 10.2281 6.70601 7.29105C6.70601 4.35402 9.0619 2 12 2C14.9391 2 17.294 4.35402 17.294 7.29105ZM12 22C7.66237 22 4 21.295 4 18.575C4 15.8539 7.68538 15.1739 12 15.1739C16.3386 15.1739 20 15.8789 20 18.599C20 21.32 16.3146 22 12 22Z"
                                                            fill="currentColor"></path>
                                                    </svg>
                                                    {{ __('people.personal_data') }}</button>
                                                <button class="nav-link" id="nav-address-tab" data-bs-toggle="tab"
                                                    data-bs-target="#nav-address" type="button" role="tab"
                                                    aria-controls="nav-address" aria-selected="false">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="currentColor" class="bi bi-pin-map-fill"
                                                        viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd"
                                                            d="M3.1 11.2a.5.5 0 0 1 .4-.2H6a.5.5 0 0 1 0 1H3.75L1.5 15h13l-2.25-3H10a.5.5 0 0 1 0-1h2.5a.5.5 0 0 1 .4.2l3 4a.5.5 0 0 1-.4.8H.5a.5.5 0 0 1-.4-.8l3-4z" />
                                                        <path fill-rule="evenodd"
                                                            d="M4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999z" />
                                                    </svg>
                                                    {{ __('people.address') }}</button>
                                                <button class="nav-link" id="nav-note-tab" data-bs-toggle="tab"
                                                    data-bs-target="#nav-note" type="button" role="tab"
                                                    aria-controls="nav-note" aria-selected="false">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="currentColor" class="bi bi-sticky-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M2.5 1A1.5 1.5 0 0 0 1 2.5v11A1.5 1.5 0 0 0 2.5 15h6.086a1.5 1.5 0 0 0 1.06-.44l4.915-4.914A1.5 1.5 0 0 0 15 8.586V2.5A1.5 1.5 0 0 0 13.5 1h-11zm6 8.5a1 1 0 0 1 1-1h4.396a.25.25 0 0 1 .177.427l-5.146 5.146a.25.25 0 0 1-.427-.177V9.5z" />
                                                    </svg>
                                                    {{ __('layout.note') }}</button>
                                            </div>
                                        </nav>
                                        <!-- primeiro form -->
                                        <div class="tab-content iq-tab-fade-up" id="nav-tab-content">
                                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                                aria-labelledby="nav-home-tab">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label class="form-label">{{ __('people.name') }}
                                                                *</label>
                                                            <div class="input-group">
                                                                <input class="form-control" id="name"
                                                                    name="name" type="text"
                                                                    value="{{ $people->name }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.row-->
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label class="form-label">{{ __('people.email') }}
                                                                @if ($appSystem->obg_email == true)
                                                                    *
                                                                @endif
                                                            </label>
                                                            <div class="input-group">
                                                                <input class="form-control" id="email"
                                                                    name="email" type="text"
                                                                    placeholder="joao@live.com"
                                                                    value="{{ $people->email }}" disabled>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.row-->
                                                <div class="row">
                                                    <div class="form-group col-sm-3">
                                                        <div class="form-group">
                                                            <label class="form-label">{{ __('people.mobile') }}
                                                                @if ($appSystem->obg_mobile == true)
                                                                    *
                                                                @endif
                                                            </label>
                                                            <div class="input-group">
                                                                <input class="form-control" id="phone"
                                                                    name="phone" type="tel"
                                                                    value="{{ $people->phone }}"
                                                                    @if ($appSystem->obg_mobile == true) required @endif>
                                                                <span id="valid-msg" class="hide">✓ Valid</span>
                                                                <span id="error-msg" class="hide"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-sm-3">
                                                        <div class="form-group">
                                                            <label class="form-label">{{ __('people.birth') }}
                                                                @if ($appSystem->obg_birth == true)
                                                                    *
                                                                @endif
                                                            </label>
                                                            <div class="input-group">
                                                                <input class="form-control" id="birth_at"
                                                                    name="birth_at" type="date" placeholder="date"
                                                                    value="{{ $people->birth_at }}"
                                                                    @if ($appSystem->obg_birth == true) required @endif>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-sm-3">
                                                        <label class="col-md-4 form-label">{{ __('people.sex') }}
                                                            @if ($appSystem->obg_sex == true)
                                                                *
                                                            @endif
                                                        </label>
                                                        <div class="col-md-12 col-form-label">
                                                            <div class="form-check form-check-inline mr-2">
                                                                <input class="form-check-input" id="sex"
                                                                    type="radio" value="m" name="sex"
                                                                    {{ $people->sex == 'm' ? 'checked' : '' }}
                                                                    @if ($appSystem->sex == true) required @endif>
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
                                                                <input class="form-check-input" id="sex"
                                                                    type="radio" value="f" name="sex"
                                                                    {{ $people->sex == 'f' ? 'checked' : '' }}
                                                                    @if ($appSystem->sex == true) required @endif>
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
                                                @if ($people->user_id == null)
                                                    <div class="mb-3 form-check">
                                                        <input type="checkbox" class="form-check-input"
                                                            id="criar_acesso" name="criar_acesso">
                                                        <label class="form-check-label"
                                                            for="exampleCheck1">{{ __('people.create_access') }}</label>
                                                    </div>
                                                @endif
                                            </div>
                                            <!-- segundo form -->
                                            <div class="tab-pane fade" id="nav-address" role="tabpanel"
                                                aria-labelledby="nav-address-tab">
                                                @if ($appSystem->geolocation == true)
                                                    <div id="map"></div>
                                                    <ul id="geoData">
                                                        <div class="row">
                                                            <div class="form-group col-sm-6">
                                                                <label for="city">{{ __('people.lat') }}</label>
                                                                <div class="input-group-prepend">
                                                                    <span name="lat-span" id="lat-span"></span>
                                                                </div>
                                                                <input class="form-control" name="lat-span"
                                                                    type="text">
                                                            </div>
                                                            <div class="form-group col-sm-6">
                                                                <label
                                                                    for="city">{{ __('people.long') }}</label>
                                                                <div class="input-group-prepend">
                                                                    <span name="lon-span" id="lon-span"></span>
                                                                </div>
                                                                <input class="form-control" name="lon-span"
                                                                    type="text">
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
                                                            <label
                                                                class="form-label">{{ __('people.street') }}</label>
                                                            <div class="input-group">
                                                                <input class="form-control" id="address"
                                                                    name="address" type="text"
                                                                    placeholder="{{ __('people.enter_street') }}"
                                                                    value="{{ $people->address }}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-sm-4">
                                                            <label
                                                                class="form-label">{{ __('people.postal_code') }}</label>
                                                            <div class="input-group">
                                                                <input class="form-control" id="cep"
                                                                    name="cep" type="text"
                                                                    placeholder="{{ __('people.enter_postal') }}"
                                                                    value="{{ $people->cep }}"
                                                                    pattern="[0-9]{5}-[0-9]{3}" maxlength="9">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-sm-4">
                                                            <label
                                                                class="form-label">{{ __('people.country') }}</label>
                                                            <div class="input-group">
                                                                <select id="country-dd" name="country-dd"
                                                                    class="form-select">
                                                                    <option value="">
                                                                        {{ __('layout.select') }}
                                                                    </option>
                                                                    @foreach ($countries as $data)
                                                                        @if ($data->id == $people->country)
                                                                            <option value="{{ $data->id }}"
                                                                                selected="true">
                                                                                {{ $data->name }}</option>
                                                                        @else
                                                                            <option value="{{ $data->id }}">
                                                                                {{ $data->name }}
                                                                            </option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-sm-4">
                                                            <label class="form-label">{{ __('people.state') }}
                                                                @if ($appSystem->obg_state == true)
                                                                    *
                                                                @endif
                                                            </label>
                                                            <div class="input-group">
                                                                <select name="state-dd" id="state-dd"
                                                                    class="form-select">
                                                                    @foreach ($state as $data)
                                                                        <option value="{{ $data->id }}"
                                                                            @if ($data->id == $people->state) selected="true" @endif>
                                                                            {{ $data->name }}</option>
                                                                    @endforeach
                                                                </select @if ($appSystem->obg_state == true)
                                                                required
                                                @endif>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label class="form-label">{{ __('people.city') }} @if ($appSystem->obg_city == true)
                                                    *
                                                @endif
                                            </label>
                                            <div class="input-group">
                                                <select id="city-dd" name="city-dd" class="form-select">
                                                    @foreach ($city as $data)
                                                        <option value="{{ $data->id }}"
                                                            @if ($data->id == $people->city) selected="true" @endif>
                                                            {{ $data->name }}</option>
                                                    @endforeach
                                                </select @if ($appSystem->obg_city == true)
                                                required
@endif
>
</div>
</div>
</div>
@endif
</div>

<div class="tab-pane fade" id="nav-note" role="tabpanel" aria-labelledby="nav-note-tab">
    <div class="card-body">
        <div class="form-group row">
            <label class="col-md-3 col-form-label" for="textarea-input">{{ __('layout.note') }}
                @if ($appSystem->obg_note == true)
                    *
                @endif
            </label>
            <div class="col-md-9">
                <textarea class="form-control" id="note" name="note" rows="9" placeholder="Content.."
                    @if ($people->status_id != '21') disabled @endif
                    @if ($appSystem->obg_note == true) required @endif>{{ $people->note }}</textarea>
            </div>
        </div>
    </div>
</div>
</div>

<div class="row">
    @if ($people->status_id == '21' and $appPermissao->edit_precadastro == true)
        <div class="col-sm-2">
            <div class="form-group">
                <button class="btn btn-success" type="submit">Aprovar</button>
            </div>
        </div>
    </form>
        <div class="col-sm-2">
            <div class="form-group">
                <form action="{{ route('peopleList.reprovar', $people->id) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger" type="submit">Reprovar</button>
                </form>
            </div>
        </div>
    @endif
    <div class="col-sm-2">
        <a class="btn btn-primary" href="{{ route('peopleList.index') }}">Retornar</a>
    </div>
</div>
</div>
<!-- /.col-->
</div>

</div>
<!-- /.row-->
<!-- /.col-->
</div>
<!-- /.row-->
</div>
</div>
<script>
    $("#name").on("input", function() {
        $(this).val($(this).val().toUpperCase());
    });
    $("#state").on("input", function() {
        $(this).val($(this).val().toUpperCase());
    });
</script>


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
@else
@include('errors.redirecionar')
@endif
