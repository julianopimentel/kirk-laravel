@if ($appPermissao->settings_roles == true)
<x-app-layout :assets="$assets ?? []">
  <div>
      <div class="row">
          <div class="col-sm-12 col-lg-12">
              <div class="card">
                  <div class="card-header d-flex justify-content-between">
                      <div class="header-title">
                          <h4 class="card-title">Criar nova permissões</h4>

                      </div>
                  </div>
                  <div class="card-body">
                <table class="table table-striped table-bordered datatable">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Criado em</th>
                            <th>Atualizado em</th>
                        </tr>
                    </thead>
                    <tbody>
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
                        </tr>
                    </tbody>
                </table>
                <a class="btn btn-primary" href="{{ route('roles.index') }}">Return</a>
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