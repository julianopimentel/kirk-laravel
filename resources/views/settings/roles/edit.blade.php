@if ($appPermissao->settings_roles == true)
    <x-app-layout :assets="$assets ?? []">
        <div>
            <div class="row">
                <div class="col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Editar permissões</h4>

                            </div>
                        </div>
                        <div class="card-body">
                            @if (Session::has('message'))
                                <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                            @endif
                            <form method="POST" action="{{ route('roles.update', $role->id) }}">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="id" value="{{ $role->id }}" />
                                <table class="table datatable">
                                    <tbody>
                                        <tr>
                                            <th>
                                                Name
                                            </th>
                                            <td>
                                                <input class="form-control" name="name" value="{{ $role->name }}"
                                                    type="text" />
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="col-lg-12">
                                    <div class="card-body"><strong>Permissões gerais</strong></div>
                                    <table class="table table-responsive-sm">
                                        <thead>
                                            <tr>
                                                <th>Módulo</th>
                                                <th>Criar</th>
                                                <th>Ler</th>
                                                <th>Editar</th>
                                                <th>Excluir</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Pessoa</td>
                                                <td>
                                                    <label class="mb-3 form-check form-switch">
                                                        <input class="form-check-input" name="add_people"
                                                            type="checkbox"
                                                            {{ $role->add_people == true ? 'checked' : '' }}>
                                                    </label>
                                                </td>
                                                <td>
                                                    <label class="mb-3 form-check form-switch">
                                                        <input class="form-check-input" name="view_people"
                                                            type="checkbox"
                                                            {{ $role->view_people == true ? 'checked' : '' }}>
                                                    </label>
                                                </td>
                                                <td>
                                                    <label class="mb-3 form-check form-switch">
                                                        <input class="form-check-input" name="edit_people"
                                                            type="checkbox"
                                                            {{ $role->edit_people == true ? 'checked' : '' }}>
                                                    </label>
                                                </td>
                                                <td>
                                                    <label class="mb-3 form-check form-switch">
                                                        <input class="form-check-input" name="delete_people"
                                                            type="checkbox"
                                                            {{ $role->delete_people == true ? 'checked' : '' }}>
                                                    </label>
                                                </td>
                                            </tr>
                                            <td>Pré-cadastro</td>
                                            <td>
                                            </td>

                                            <td> <label class="mb-3 form-check form-switch">
                                                    <input class="form-check-input" name="view_precadastro"
                                                        type="checkbox"
                                                        {{ $role->view_precadastro == true ? 'checked' : '' }}><span
                                                        class="c-switch-slider" data-checked="&#x2713"
                                                        data-unchecked="&#x2715"></span>
                                                </label>
                                            </td>
                                            <td> <label class="mb-3 form-check form-switch">
                                                    <input class="form-check-input" name="edit_precadastro"
                                                        type="checkbox"
                                                        {{ $role->edit_precadastro == true ? 'checked' : '' }}><span
                                                        class="c-switch-slider" data-checked="&#x2713"
                                                        data-unchecked="&#x2715"></span>
                                                </label>
                                            </td>
                                            <td>
                                                <tr>
                                                    <td>Grupo</td>
                                                    <td>
                                                        <label class="mb-3 form-check form-switch">
                                                            <input class="form-check-input" name="add_group"
                                                                type="checkbox"
                                                                {{ $role->add_group == true ? 'checked' : '' }}>
                                                        </label>
                                                    </td>

                                                    <td>
                                                        <label class="mb-3 form-check form-switch">
                                                            <input class="form-check-input" name="view_group"
                                                                type="checkbox"
                                                                {{ $role->view_group == true ? 'checked' : '' }}>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="mb-3 form-check form-switch">
                                                            <input class="form-check-input" name="edit_group"
                                                                type="checkbox"
                                                                {{ $role->edit_group == true ? 'checked' : '' }}>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="mb-3 form-check form-switch">
                                                            <input class="form-check-input" name="delete_group"
                                                                type="checkbox"
                                                                {{ $role->delete_group == true ? 'checked' : '' }}>
                                                        </label>
                                                    </td>
                                                </tr>
                                            <td>Pessoas nos grupos</td>
                                            <td>
                                                <label class="mb-3 form-check form-switch">
                                                    <input class="form-check-input" name="add_group_people"
                                                        type="checkbox"
                                                        {{ $role->add_group_people == true ? 'checked' : '' }}><span
                                                        class="c-switch-slider" data-checked="&#x2713"
                                                        data-unchecked="&#x2715"></span>
                                                </label>
                                            </td>
                                            <td>
                                            </td>
                                            <td>
                                            </td>
                                            <td>
                                                <label class="mb-3 form-check form-switch">
                                                    <input class="form-check-input" name="delete_group_people"
                                                        type="checkbox"
                                                        {{ $role->delete_group_people == true ? 'checked' : '' }}><span
                                                        class="c-switch-slider" data-checked="&#x2713"
                                                        data-unchecked="&#x2715"></span>
                                                </label>
                                            </td>
                                            </tr>
                                            <tr>
                                                <td>Mural de Recados</td>
                                                <td>
                                                    <label class="mb-3 form-check form-switch">
                                                        <input class="form-check-input" name="add_message"
                                                            type="checkbox"
                                                            {{ $role->add_message == true ? 'checked' : '' }}>
                                                    </label>
                                                </td>

                                                <td>
                                                    <label class="mb-3 form-check form-switch">
                                                        <input class="form-check-input" name="view_message"
                                                            type="checkbox"
                                                            {{ $role->view_message == true ? 'checked' : '' }}>
                                                    </label>
                                                </td>
                                                <td>
                                                    <label class="mb-3 form-check form-switch">
                                                        <input class="form-check-input" name="edit_message"
                                                            type="checkbox"
                                                            {{ $role->edit_message == true ? 'checked' : '' }}>
                                                    </label>
                                                </td>
                                                <td>
                                                    <label class="mb-3 form-check form-switch">
                                                        <input class="form-check-input" name="delete_message"
                                                            type="checkbox"
                                                            {{ $role->delete_message == true ? 'checked' : '' }}>
                                                    </label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Pedido de oração</td>
                                                <td>
                                                    <label class="mb-3 form-check form-switch">
                                                        <input class="form-check-input" name="add_prayer"
                                                            type="checkbox"
                                                            {{ $role->add_prayer == true ? 'checked' : '' }}>
                                                    </label>
                                                </td>

                                                <td>
                                                    <label class="mb-3 form-check form-switch">
                                                        <input class="form-check-input" name="view_prayer"
                                                            type="checkbox"
                                                            {{ $role->view_prayer == true ? 'checked' : '' }}>
                                                    </label>
                                                </td>
                                                <td>
                                                    <label class="mb-3 form-check form-switch">
                                                        <input class="form-check-input" name="edit_prayer"
                                                            type="checkbox"
                                                            {{ $role->edit_prayer == true ? 'checked' : '' }}>
                                                    </label>
                                                </td>
                                                <td>
                                                    <label class="mb-3 form-check form-switch">
                                                        <input class="form-check-input" name="delete_prayer"
                                                            type="checkbox"
                                                            {{ $role->delete_prayer == true ? 'checked' : '' }}>
                                                    </label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Calendário</td>
                                                <td>
                                                    <label class="mb-3 form-check form-switch">
                                                        <input class="form-check-input" name="add_calendar"
                                                            type="checkbox"
                                                            {{ $role->add_calendar == true ? 'checked' : '' }}>
                                                    </label>
                                                </td>

                                                <td>
                                                    <label class="mb-3 form-check form-switch">
                                                        <input class="form-check-input" name="view_calendar"
                                                            type="checkbox"
                                                            {{ $role->view_calendar == true ? 'checked' : '' }}>
                                                    </label>
                                                </td>
                                                <td>
                                                    <label class="mb-3 form-check form-switch">
                                                        <input class="form-check-input" name="edit_calendar"
                                                            type="checkbox"
                                                            {{ $role->edit_calendar == true ? 'checked' : '' }}>
                                                    </label>
                                                </td>
                                                <td>
                                                    <label class="mb-3 form-check form-switch">
                                                        <input class="form-check-input" name="delete_calendar"
                                                            type="checkbox"
                                                            {{ $role->delete_calendar == true ? 'checked' : '' }}>
                                                    </label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Media</td>
                                                <td>
                                                    <label class="mb-3 form-check form-switch">
                                                        <input class="form-check-input" name="add_media"
                                                            type="checkbox"
                                                            {{ $role->add_media == true ? 'checked' : '' }}>
                                                    </label>
                                                </td>

                                                <td>
                                                    <label class="mb-3 form-check form-switch">
                                                        <input class="form-check-input" name="view_media"
                                                            type="checkbox"
                                                            {{ $role->view_media == true ? 'checked' : '' }}>
                                                    </label>
                                                </td>
                                                <td>
                                                    <label class="mb-3 form-check form-switch">
                                                        <input class="form-check-input" name="edit_media"
                                                            type="checkbox"
                                                            {{ $role->edit_media == true ? 'checked' : '' }}>
                                                    </label>
                                                </td>
                                                <td>
                                                    <label class="mb-3 form-check form-switch">
                                                        <input class="form-check-input" name="delete_media"
                                                            type="checkbox"
                                                            {{ $role->delete_media == true ? 'checked' : '' }}>
                                                    </label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Palavra</td>
                                                <td>
                                                    <label class="mb-3 form-check form-switch">
                                                        <input class="form-check-input" name="add_sermons"
                                                            type="checkbox"
                                                            {{ $role->add_sermons == true ? 'checked' : '' }}>
                                                    </label>
                                                </td>

                                                <td>
                                                    <label class="mb-3 form-check form-switch">
                                                        <input class="form-check-input" name="view_sermons"
                                                            type="checkbox"
                                                            {{ $role->view_sermons == true ? 'checked' : '' }}>
                                                    </label>
                                                </td>
                                                <td>
                                                    <label class="mb-3 form-check form-switch">
                                                        <input class="form-check-input" name="edit_sermons"
                                                            type="checkbox"
                                                            {{ $role->edit_sermons == true ? 'checked' : '' }}>
                                                    </label>
                                                </td>
                                                <td>
                                                    <label class="mb-3 form-check form-switch">
                                                        <input class="form-check-input" name="delete_sermons"
                                                            type="checkbox"
                                                            {{ $role->delete_sermons == true ? 'checked' : '' }}>
                                                    </label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Financeiro</td>
                                                <td>
                                                    <label class="mb-3 form-check form-switch">
                                                        <input class="form-check-input" name="add_entrada_financial"
                                                            type="checkbox"
                                                            {{ $role->add_entrada_financial == true ? 'checked' : '' }}>
                                                        Entrada
                                                    </label>

                                                    <label class="mb-3 form-check form-switch">
                                                        <input class="form-check-input" name="add_retirada_financial"
                                                            type="checkbox"
                                                            {{ $role->add_retirada_financial == true ? 'checked' : '' }}>
                                                        Retira
                                                    </label>
                                                </td>
                                                <td>
                                                    <label class="mb-3 form-check form-switch">
                                                        <input class="form-check-input" name="view_financial"
                                                            type="checkbox"
                                                            {{ $role->view_financial == true ? 'checked' : '' }}>
                                                    </label>
                                                </td>

                                                <td>
                                                    <!--
                                                        <label
                                                            class="mb-3 form-check form-switch">
                                                            <input class="form-check-input" name="edit_financial" type="checkbox"
                                                                {{ $role->edit_financial == true ? 'checked' : '' }}><span
                                                                class="c-switch-slider" data-checked="&#x2713"
                                                                data-unchecked="&#x2715"></span>
                                                        </label>
                                                        -->
                                                </td>

                                                <td>
                                                    <!--
                                                        <label
                                                            class="mb-3 form-check form-switch">
                                                            <input class="form-check-input" name="delete_financial"
                                                                type="checkbox"
                                                                {{ $role->delete_financial == true ? 'checked' : '' }}><span
                                                                class="c-switch-slider" data-checked="&#x2713"
                                                                data-unchecked="&#x2715"></span>
                                                        </label>
                                                        -->
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="card-header"><strong> Permissões do Dashboard </strong>
                                    </div>
                                    <table class="table table-responsive-sm table-striped">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Atalhos rápido</th>
                                                <th>Financeiro <i data-bs-toggle="tooltip"
                                                        data-bs-placement="top"
                                                        title="Periodo Financeiro Atual x anterior x meta"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                                                            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                                                          </svg></i>
                                                </th>
                                                <th>Membresia
                                                    <i data-bs-toggle="tooltip"
                                                        data-bs-placement="top"
                                                        title="Detalhes das Pessoas x Meta "><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                                                            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                                                          </svg></i>
                                                </th>
                                                <th>Tipo de Movimentação
                                                    <i data-bs-toggle="tooltip"
                                                        data-bs-placement="top"
                                                        title="Financeiro do mês atual x anterior"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                                                            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                                                          </svg></i>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Mostrar</td>
                                                <td>
                                                    <label class="mb-3 form-check form-switch">
                                                        <input class="form-check-input" name="view_dash"
                                                            type="checkbox"
                                                            {{ $role->view_dash == true ? 'checked' : '' }}>
                                                    </label>
                                                </td>
                                                <td>
                                                    <label class="mb-3 form-check form-switch">
                                                        <input class="form-check-input" name="view_periodo"
                                                            type="checkbox"
                                                            {{ $role->view_periodo == true ? 'checked' : '' }}>
                                                    </label>
                                                </td>
                                                <td>
                                                    <label class="mb-3 form-check form-switch">
                                                        <input class="form-check-input" name="view_detail"
                                                            type="checkbox"
                                                            {{ $role->view_detail == true ? 'checked' : '' }}>
                                                    </label>
                                                </td>
                                                <td>
                                                    <label class="mb-3 form-check form-switch">
                                                        <input class="form-check-input" name="view_resumo_financeiro"
                                                            type="checkbox"
                                                            {{ $role->view_resumo_financeiro == true ? 'checked' : '' }}>
                                                    </label>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="card-header"><strong>Permissões da Home</strong></div>
                                    <table class="table table-responsive-sm table-striped">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Recados</th>
                                                <th>Financeiro Mensal</th>
                                                <th>Redes Sociais</th>
                                                <th>Localização</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Mostrar</td>
                                                <td>
                                                    <label class="mb-3 form-check form-switch">
                                                        <input class="form-check-input" name="home_message"
                                                            type="checkbox"
                                                            {{ $role->home_message == true ? 'checked' : '' }}>
                                                    </label>
                                                </td>
                                                <td>
                                                    <label class="mb-3 form-check form-switch">
                                                        <input class="form-check-input" name="home_financeiro"
                                                            type="checkbox"
                                                            {{ $role->home_financeiro == true ? 'checked' : '' }}>
                                                    </label>
                                                </td>
                                                <td>
                                                    <label class="mb-3 form-check form-switch">
                                                        <input class="form-check-input" name="home_social"
                                                            type="checkbox"
                                                            {{ $role->home_social == true ? 'checked' : '' }}>
                                                    </label>
                                                </td>
                                                <td>
                                                    <label class="mb-3 form-check form-switch">
                                                        <input class="form-check-input" name="home_location"
                                                            type="checkbox"
                                                            {{ $role->home_location == true ? 'checked' : '' }}>
                                                    </label>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <div class="card-header"><strong>Permissões de Funções</strong></div>
                                    <table class="table table-responsive-sm table-striped">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Timeline</th>
                                                <th>Pedido de Orações</th>
                                                <th>Eventos</th>
                                                <th>Meus Grupos</th>
                                                <th>Meus Dizimos</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Mostrar</td>
                                                <td>
                                                    <label class="mb-3 form-check form-switch">
                                                        <input class="form-check-input" name="home_timeline"
                                                            type="checkbox"
                                                            {{ $role->home_timeline == true ? 'checked' : '' }}>
                                                    </label>
                                                </td>
                                                <td>
                                                    <label class="mb-3 form-check form-switch">
                                                        <input class="form-check-input" name="home_oracao"
                                                            type="checkbox"
                                                            {{ $role->home_oracao == true ? 'checked' : '' }}>
                                                    </label>
                                                </td>
                                                <td>
                                                    <label class="mb-3 form-check form-switch">
                                                        <input class="form-check-input" name="home_eventos"
                                                            type="checkbox"
                                                            {{ $role->home_eventos == true ? 'checked' : '' }}>
                                                    </label>
                                                </td>
                                                <td>
                                                    <label class="mb-3 form-check form-switch">
                                                        <input class="form-check-input" name="home_grupo"
                                                            type="checkbox"
                                                            {{ $role->home_grupo == true ? 'checked' : '' }}>
                                                    </label>
                                                </td>
                                                <td>
                                                    <label class="mb-3 form-check form-switch">
                                                        <input class="form-check-input" name="home_financeiro_valores"
                                                            type="checkbox"
                                                            {{ $role->home_financeiro_valores == true ? 'checked' : '' }}>
                                                    </label>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="card-header"><strong>Permissões das Configurações </strong>
                                    </div>
                                    <table class="table table-responsive-sm table-striped">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>General</th>
                                                <th>Email</th>
                                                <th>Meta</th>
                                                <th>SEO</th>
                                                <th>Roles</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Configurar</td>
                                                <td>
                                                    <label class="mb-3 form-check form-switch">
                                                        <input class="form-check-input" name="settings_general"
                                                            type="checkbox"
                                                            {{ $role->settings_general == true ? 'checked' : '' }}>
                                                    </label>
                                                </td>
                                                <td>
                                                    <label class="mb-3 form-check form-switch">
                                                        <input class="form-check-input" name="settings_email"
                                                            type="checkbox"
                                                            {{ $role->settings_email == true ? 'checked' : '' }}>
                                                    </label>
                                                </td>
                                                <td>
                                                    <label class="mb-3 form-check form-switch">
                                                        <input class="form-check-input" name="settings_meta"
                                                            type="checkbox"
                                                            {{ $role->settings_meta == true ? 'checked' : '' }}>
                                                    </label>
                                                </td>
                                                <td>
                                                    <label class="mb-3 form-check form-switch">
                                                        <input class="form-check-input" name="settings_social"
                                                            type="checkbox"
                                                            {{ $role->settings_social == true ? 'checked' : '' }}>
                                                    </label>
                                                </td>
                                                <td>
                                                    <label class="mb-3 form-check form-switch">
                                                        <input class="form-check-input" name="settings_roles"
                                                            type="checkbox"
                                                            {{ $role->settings_roles == true ? 'checked' : '' }}>
                                                    </label>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="card-header"><strong>Complemento</strong>
                                    </div>
                                    <table class="table table-responsive-sm table-striped">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Relatórios</th>
                                                <th>Cadastrar Visitante</th>
                                                <th>Meus Dados</th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Mostrar</td>
                                                <td>
                                                    <label class="mb-3 form-check form-switch">
                                                        <input class="form-check-input" name="report_view"
                                                            type="checkbox"
                                                            {{ $role->report_view == true ? 'checked' : '' }}>
                                                    </label>
                                                </td>
                                                <td>
                                                    <label class="mb-3 form-check form-switch">
                                                        <input class="form-check-input" name="home_cadastro_visitante"
                                                            type="checkbox"
                                                            {{ $role->home_cadastro_visitante == true ? 'checked' : '' }}>
                                                    </label>
                                                </td>
                                                <td>
                                                    <label class="mb-3 form-check form-switch">
                                                        <input class="form-check-input" name="home_dados"
                                                            type="checkbox"
                                                            {{ $role->home_dados == true ? 'checked' : '' }}>
                                                    </label>
                                                </td>
                                                <td>
                                                </td>
                                                <td>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>                                       
                                <button class="btn btn-success" type="submit" title="Salvar">Salvar</button>
                                <a class="btn btn-danger" type="submit" href="{{ route('roles.index') }}" title="Voltar">Voltar</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </x-app-layout>
@else
    @include('errors.redirecionar')
@endif
