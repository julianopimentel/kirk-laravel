@if ($appPermissao->settings_roles == true)
<x-app-layout :assets="$assets ?? []">
  <div>
      <div class="row">
          <div class="col-sm-12 col-lg-12">
              <div class="card">
                  <div class="card-header d-flex justify-content-between">
                      <div class="header-title">
                          <h4 class="card-title">Criar nova permissões</h4>
                          <p class="card-text">
                        Após criar, lembre-se de configurar quais permissões deseja liberar ao novo grupo
                          </p>
                      </div>
                  </div>
                  <div class="card-body">
         
                @if(Session::has('message'))
                    <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                @endif
                <form method="POST" action="{{ route('roles.store') }}">
                    @csrf
                    <table class="table datatable">
                        <tbody>
                            <tr>
                                <th>
                                    Nome
                                </th>
                                <td>
                                    <input class="form-control" name="name" type="text"/>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <button class="btn btn-success" type="submit" title="Salvar">Salvar</button>
              <a class="btn btn-danger" href="{{ route('roles.index') }}" title="Voltar">Voltar</a>
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