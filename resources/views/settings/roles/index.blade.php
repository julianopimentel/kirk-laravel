@if ($appPermissao->settings_roles == true)
    <x-app-layout :assets="$assets ?? []">
        <div>
            <div class="row">
                <div class="col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Permissões</h4>

                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="card-body">
                                    <a type="submit" href="{{ route('roles.create') }}"
                                        class="btn btn-primary">Adicionar</a>
                            </div>
                            <br>
                            @if (session('message'))
                                <div class="alert alert-warning" role="alert">
                                    {{ session('message') }}
                                </div>
                            @endif
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Criado em</th>
                                        <th>Atualizado em</th>
                                        <th colspan="3">
                                            <Center>{{ __('account.action') }}</Center>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $role)
                                        <tr>
                                            <td>
                                                {{ $role->name }}
                                            </td>
                                            <td>
                                                {{ $role->created_at }}
                                            </td>
                                            <td>
                                                {{ $role->updated_at }}
                                            </td>
                                            <!-- <td width="1%">
                                                <a href="{{ route('roles.show', $role->id) }}"
                                                    class="btn btn-primary-outline"><i
                                                        class="c-icon c-icon-sm cil-notes text-primary"></i></a>
                                            </td>
                                            -->
                                            <td width="1%">
                                                <a href="{{ route('roles.edit', $role->id) }}"
                                                   ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                                        <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                                                      </svg></a>
                                            </td>
                                            <td width="1%">
                                                @if ($role->id > 4)
                                                    <form action="{{ route('roles.destroy', $role->id) }}"
                                                        method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="btn btn-primary-outline show_confirm"
                                                            data-toggle="tooltip" title='Delete'><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                              </svg></button>
                                                    </form>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
