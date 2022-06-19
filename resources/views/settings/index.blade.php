@if (($appPermissao->settings_general or $appPermissao->settings_email or $appPermissao->settings_meta or $appPermissao->settings_social or $appPermissao->settings_roles or $appPermissao->add_people) == true)
    <x-app-layout :assets="$assets ?? []">
        <div>
            <div class="row">
                <div class="col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Configurações</h4>
                                Organize e ajuste todas as configurações desta conta

                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="card-body">
                                <div class="row">
                                    @if ($appPermissao->settings_general == true)
                                        <div class="col-lg-6">
                                            <div class="card-body">
                                                <h5 class="card-title">Geral</h5>
                                                <p class="card-text">Informações gerais, campos obrigatórios e
                                                    configurações da conta
                                                </p>
                                                <a href="{{ route('indexSystem') }}" class="card-cta">Alterar
                                                    configuração <i class="fas fa-chevron-right"></i></a>
                                            </div>
                                        </div>
                                    @endif
                                    @if ($appPermissao->settings_social == true)
                                        <div class="col-lg-6">
                                            <div class="card-body">
                                                <h5 class="card-title">SEO</h5>
                                                <p class="card-text">Configurações de Rede Sociais para fácil
                                                    acesso de seus membros
                                                </p>
                                                <a href="{{ route('indexSocial') }}" class="card-cta">Alterar
                                                    configuração <i class="fas fa-chevron-right"></i></a>
                                            </div>
                                        </div>
                                    @endif
                                    @if ($appPermissao->settings_email == true)
                                        <div class="col-lg-6">
                                            <div class="card-body">
                                                <h5 class="card-title">Email <span
                                                        class="badge rounded-pill bg-info">Beta</span></h5>
                                                <p class="card-text">
                                                    Configuração do SMTP personalizado para o disparo dos e-mails</p>
                                                <a href="{{ route('indexEmail') }}" class="card-cta">Alterar
                                                    configuração <i class="fas fa-chevron-right"></i></a>
                                            </div>
                                        </div>
                                    @endif
                                    @if ($appPermissao->settings_roles == true)
                                        <div class="col-lg-6">
                                            <div class="card-body">
                                                <h5 class="card-title">Permissões</h5>
                                                <p class="card-text">
                                                    Configurações de permissões para grupos e ativações de recursos.
                                                </p>
                                                <a href="{{ url('settings/roles') }}" class="card-cta">Alterar
                                                    configuração <i class="fas fa-chevron-right"></i></a>
                                            </div>
                                        </div>
                                    @endif
                                    @if ($appPermissao->settings_meta == true)
                                        <div class="col-lg-6">
                                            <div class="card-body">
                                                <h5 class="card-title">Metas</h5>
                                                <p class="card-text">Configurar metas para o uso do Dashboard</p>
                                                <a href="{{ route('indexMeta') }}" class="card-cta">Alterar
                                                    configuração <i class="fas fa-chevron-right"></i></a>
                                            </div>
                                        </div>
                                    @endif
                                    @if ($appPermissao->add_people == true)
                                        <div class="col-lg-6">
                                            <div class="card-body">
                                                <h5 class="card-title">Backup</h5>
                                                <p class="card-text">Importar ou exportar dados da Pessoa.</p>
                                                <a href={{ url('settings/backup') }} class="card-cta">Acessar<i
                                                        class="fas fa-chevron-right"></i></a>
                                            </div>
                                        </div>
                                    @endif
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
