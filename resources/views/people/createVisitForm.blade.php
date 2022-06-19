@if ($appPermissao->add_people == true or $appPermissao->home_cadastro_visitante == true)
    <x-app-layout :assets="$assets ?? []">
        <div>
            <div class="row">
                <div class="col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Cadastrar Visitante</h4>
                            </div>
                        </div>
                        <form method="POST" action="{{ route('peoplevisit.store') }}">
                            @csrf
                            <div class="card-body">
                                <form>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label">{{ __('people.name') }} *</label>
                                                <div class="input-group">
                                                    <input class="form-control" id='name' name="name" type="text"
                                                        placeholder="João" required>
                                                </div>
                                            </div>
                                        </div>
                                        @if ($appSystem->visit_last_name == true)
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-label">{{ __('people.last_name') }} @if ($appSystem->obg_last_name == true)
                                                            *
                                                        @endif
                                                    </label>
                                                    <div class="input-group">
                                                        <input class="form-control" id='last_name' name="last_name"
                                                            type="text" placeholder="Silva"
                                                            @if ($appSystem->obg_last_name == true) required @endif>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="row">
                                        @if ($appSystem->visit_email == true)
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">{{ __('people.email') }} @if ($appSystem->obg_email == true)
                                                            *
                                                        @endif
                                                    </label>
                                                    <div class="input-group">
                                                        <input class="form-control" name="email" type="email"
                                                            placeholder="joao@live.com" autocomplete="joao@live.com"
                                                            @if ($appSystem->obg_email == true) required @endif>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <!-- /.row-->
                                    <div class="row">
                                        @if ($appSystem->visit_mobile == true)
                                            <div class="form-group col-sm-3">
                                                <div class="form-group">
                                                    <label class="form-label">{{ __('people.mobile') }} @if ($appSystem->obg_mobile == true)
                                                            *
                                                        @endif
                                                    </label>
                                                    <div class="input-group">
                                                        <input class="form-control" id="phone" name="phone" type="tel"
                                                            @if ($appSystem->obg_mobile == true) required @endif>
                                                        <span id="valid-msg" class="hide">✓
                                                            {{ __('people.valid_phone') }} </span>
                                                        <span id="error-msg" class="hide"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($appSystem->visit_birth == true)
                                            <div class="form-group col-sm-3">
                                                <div class="form-group">
                                                    <label class="form-label">{{ __('people.birth') }} @if ($appSystem->obg_birth == true)
                                                            *
                                                        @endif
                                                    </label>
                                                    <div class="input-group">
                                                        <input class="form-control" name="birth_at" type="date"
                                                            placeholder="date"
                                                            @if ($appSystem->obg_birth == true) required @endif>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($appSystem->visit_sex == true)
                                            <div class="form-group col-sm-3">
                                                <label class="col-md-4 form-label">{{ __('people.sex') }}
                                                    @if ($appSystem->obg_sex == true)
                                                        *
                                                    @endif
                                                </label>
                                                <div class="col-md-12 form-label">
                                                    <div class="form-check form-check-inline mr-2">
                                                        <input class="form-check-input" type="radio" value="m"
                                                            name="sex"
                                                            @if ($appSystem->sex == true) required @endif>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gender-male" viewBox="0 0 16 16">
                                                                <path fill-rule="evenodd" d="M9.5 2a.5.5 0 0 1 0-1h5a.5.5 0 0 1 .5.5v5a.5.5 0 0 1-1 0V2.707L9.871 6.836a5 5 0 1 1-.707-.707L13.293 2H9.5zM6 6a4 4 0 1 0 0 8 4 4 0 0 0 0-8z"/>
                                                              </svg>
                                                        <label class="form-check-label"
                                                            for="m">{{ __('people.m') }}</label>
                                                    </div>
                                                    <div class="form-check form-check-inline mr-2">
                                                        <input class="form-check-input" type="radio" value="f"
                                                            name="sex"
                                                            @if ($appSystem->sex == true) required @endif>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gender-female" viewBox="0 0 16 16">
                                                                <path fill-rule="evenodd" d="M8 1a4 4 0 1 0 0 8 4 4 0 0 0 0-8zM3 5a5 5 0 1 1 5.5 4.975V12h2a.5.5 0 0 1 0 1h-2v2.5a.5.5 0 0 1-1 0V13h-2a.5.5 0 0 1 0-1h2V9.975A5 5 0 0 1 3 5z"/>
                                                              </svg>
                                                        <label class="form-check-label"
                                                            for="f">{{ __('people.f') }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                        <button type="submit" class="btn btn-success" id="botao" title="Salvar">Salvar</button>
                                        <a type="submit" href="{{ route('peoplevisit.create') }}" class="btn btn-danger">Cancelar</a>
                                </form>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $("#name").on("input", function() {
                $(this).val($(this).val().toUpperCase());
            });
            $("#last_name").on("input", function() {
                $(this).val($(this).val().toUpperCase());
            });
            $("#name").on("input", function() {
                $("#botao").prop('disabled', $(this).val().length < 3);
            });
        </script>
    </x-app-layout>
@else
    @include('errors.redirecionar')
@endif
