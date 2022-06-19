@if ($appPermissao->settings_general == true)
    <x-app-layout :assets="$assets ?? []">
        <div>
            <div class="row">
                <div class="col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Configurações Gerais</h4>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="card-body">
                                <div class="row">
                                    <form action="{{ route('settings.updateSystem') }}" method="POST">
                                        @csrf
                                        <!--
                                                                        <div class="form-group">
                                                                            <label class="control-label">Favicon (25*25)</label><br />
                                                                            <p><img src="http://demo.deskapps.net/assets/img/a99e81e77b7b1bfb330d46479c4dd282.jpg"
                                                                                    class="favicon"></p>
                                                                            <input type="file" name="favicon" accept=".png, .jpg, .jpeg, .gif, .svg">
                                                                            <p><small class="text-success">Allowed Types: gif, jpg, png, jpeg</small></p>
                                                                            <input type="hidden" name="favicon"
                                                                                value="assets/img/a99e81e77b7b1bfb330d46479c4dd282.jpg">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="control-label">Logo</label><br />
                                                                            <p><img src="http://demo.deskapps.net/assets/img/2e79d6b2095794bd62b0155dae20ac08.jpg"
                                                                                    class="logo" width="150"></p>
                                                                            <input type="file" name="logo" accept=".png, .jpg, .jpeg, .gif, .svg">
                                                                            <p><small class="text-success">Allowed Types: gif, jpg, png, jpeg</small></p>
                                                                            <input type="hidden" name="logo"
                                                                                value="assets/img/2e79d6b2095794bd62b0155dae20ac08.jpg">
                                                                        </div>
                                                                        
                                                        <div class="form-group">
                                                            <label class="control-label">Nome da aplicação</label>
                                                            <input type="text" class="form-control" name="name" placeholder="Application name"
                                                                value="{{ $settings->name }}" required>
                                                        </div>
                                                        -->
                                        <h5 class="card-title">Configurações do Sistema</h5>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label"><strong>Idioma</strong></label>
                                                    <select name="language" class="form-control">
                                                        <option value="pt">Portuguese</option>
                                                        <!--<option value="en" disabled>English</option> -->
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label"><strong>Moeda</strong></label>
                                                    <input type="text" class="form-control" name="currency"
                                                        placeholder="currency" value="{{ $settings->currency }}"
                                                        maxlength="5" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label"><strong>Timezone</strong></label>
                                                    <select name="timezone" class="form-control" required>
                                                        <option value="{{ $settings->timezone }}">
                                                            {{ $settings->timezone }}</option>
                                                        <option value="America/Manaus">America/Manaus</option>
                                                        <option value="America/Maceio">America/Maceio</option>
                                                        <option value="America/Sao_Paulo">America/Sao_Paulo</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                            <div class="form-group">
                                                <label class="control-label"><strong>Meus dados - Pessoas
                                                    </strong></label>
                                                    <i data-bs-toggle="tooltip"
                                                        data-bs-placement="top"
                                                        title="Campos que serão obrigatórios das Pessoas ao cadastrar e atualizar"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                                                            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                                                          </svg></i>
                                                <div class="inner">
                                                    <div class="form-check form-check-inline mr-1">
                                                        <input class="form-check-input" name="obg_last_name"
                                                            type="checkbox"
                                                            {{ $settings->obg_last_name == true ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="check1">Sobrenome
                                                            obrigatório</label>
                                                    </div>
                                                </div>
                                                <div class="inner">
                                                    <div class="form-check form-check-inline mr-1">
                                                        <input class="form-check-input" name="obg_email" type="checkbox"
                                                            {{ $settings->obg_email == true ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="check1">Email
                                                            obrigatório</label>
                                                    </div>
                                                </div>
                                                <div class="inner">
                                                    <div class="form-check form-check-inline mr-1">
                                                        <input class="form-check-input" name="obg_mobile"
                                                            type="checkbox"
                                                            {{ $settings->obg_mobile == true ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="check1">Celular
                                                            obrigatório</label>
                                                    </div>
                                                </div>
                                                <div class="inner">
                                                    <div class="form-check form-check-inline mr-1">
                                                        <input class="form-check-input" name="obg_birth" type="checkbox"
                                                            {{ $settings->obg_birth == true ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="check1">Aniversário
                                                            obrigatório</label>
                                                    </div>
                                                </div>
                                                <div class="inner">
                                                    <div class="form-check form-check-inline mr-1">
                                                        <input class="form-check-input" name="obg_sex"
                                                            type="checkbox"
                                                            {{ $settings->obg_sex == true ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="check1">Sexo
                                                            obrigatório</label>
                                                    </div>
                                                </div>
                                                <div class="inner">
                                                    <div class="form-check form-check-inline mr-1">
                                                        <input class="form-check-input" name="obg_note"
                                                            type="checkbox"
                                                            {{ $settings->obg_note == true ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="check1">Observação
                                                            obrigatório</label>
                                                    </div>
                                                </div>

                                                <div class="inner">
                                                    <div class="form-check form-check-inline mr-1">
                                                        <input class="form-check-input" name="obg_city"
                                                            type="checkbox"
                                                            {{ $settings->obg_city == true ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="check1">Cidade
                                                            obrigatório</label>
                                                    </div>
                                                </div>
                                                <div class="inner">
                                                    <div class="form-check form-check-inline mr-1">
                                                        <input class="form-check-input" name="obg_state"
                                                            type="checkbox"
                                                            {{ $settings->obg_state == true ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="check1">Estado
                                                            obrigatório</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label"><strong>Visitante </strong></label>
                                                <i data-bs-toggle="tooltip"
                                                        data-bs-placement="top"
                                                        title="Campos que serão exibidos ao realizar o cadastro de um novo visitante"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                                                            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                                                          </svg></i>
                                                <div class="inner">
                                                    <div class="form-check form-check-inline mr-1">
                                                        <input class="form-check-input" name="visit_last_name"
                                                            type="checkbox"
                                                            {{ $settings->visit_last_name == true ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="check1">Mostrar
                                                            Sobrenome</label>
                                                    </div>
                                                </div>
                                                <div class="inner">
                                                    <div class="form-check form-check-inline mr-1">
                                                        <input class="form-check-input" name="visit_email"
                                                            type="checkbox"
                                                            {{ $settings->visit_email == true ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="check1">Mostrar
                                                            Email</label>
                                                    </div>
                                                </div>
                                                <div class="inner">
                                                    <div class="form-check form-check-inline mr-1">
                                                        <input class="form-check-input" name="visit_mobile"
                                                            type="checkbox"
                                                            {{ $settings->visit_mobile == true ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="check1">Mostrar
                                                            Celular</label>
                                                    </div>
                                                </div>
                                                <div class="inner">
                                                    <div class="form-check form-check-inline mr-1">
                                                        <input class="form-check-input" name="visit_birth"
                                                            type="checkbox"
                                                            {{ $settings->visit_birth == true ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="check1">Mostrar
                                                            Aniversário</label>
                                                    </div>
                                                </div>
                                                <div class="inner">
                                                    <div class="form-check form-check-inline mr-1">
                                                        <input class="form-check-input" name="visit_sex"
                                                            type="checkbox"
                                                            {{ $settings->visit_sex == true ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="check1">Sexo
                                                            obrigatório</label>
                                                    </div>
                                                </div>
                                                <br>
                                                <label class="control-label"><strong>Localização</strong></label>
                                                <i data-bs-toggle="tooltip"
                                                        data-bs-placement="top"
                                                        title="Caso ative a opção de localização, será solicitado dos usuários a permissão de localização para a colete da latitude e longitude, Usado para implantação de igrejas, mas é necessário
                                                        informar a latitude e longitude para cada pessoa. 
                                                        Os campos de endereço nas pessoas ficam ocultos até a desativação dessa opção"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                                                            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                                                          </svg></i>

                                                <div class="inner">
                                                    <div class="form-check form-check-inline mr-1">
                                                        <input class="form-check-input" name="geolocation"
                                                            type="checkbox"
                                                            {{ $settings->geolocation == true ? 'checked' : '' }}>
                                                        <label 
                                                            class="form-check-label" for="check1">Utilizar
                                                            geolocalização <span
                                                                class="badge rounded-pill bg-info">Beta</span></label>
                                                    </div>
                                                </div><small></small>
                                            </div>

                                            <!-- /.row-->
                                            <button class="btn btn-success" type="submit" title="Salvar">Salvar</button>
                                            <a class="btn btn-danger" href="{{ route('settings') }}"
                                                title="Voltar">Voltar</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
@else
    @include('errors.redirecionar')
@endif
