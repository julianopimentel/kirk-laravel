@if ($appPermissao->home_grupo == true)
<x-app-layout :assets="$assets ?? []">
    <div>
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Meus grupos</h4>
                        </div>
                    </div>
                    <p>
                @if (!$groups->isEmpty())
                    <table class="table table-responsive-sm table-striped">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Tipo</th>
                                <th>Integrantes</th>
                                <th>Mensagem</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                       
 
                        <tbody>
                            @forelse($groups as $group)
                                <tr>
                                    <td><strong>{{ $group->grupo->name_group }}</strong></td>
                                    <td>{{ $group->grupo->type }}</td>
                                    <td width="1%">{{ $group->grupo->count }}</td>
                                    <td>{{ $group->grupo->note }}</td>
                                    <td>
                                        <span class="{{ $group->grupo->status->class }}">
                                            {{ $group->grupo->status->name }}
                                        </span>
                                    </td>
                                    
                            @empty
                            @endforelse
                        </tbody>
                    </table>
            </div>
        @else
            <div class="container-fluid">
                <div class="fade-in">
                    Não possuiu vinculo com grupos, fale com o administrador da conta
                </div>
            </div>
    @endif
    </div>
    </div>
</x-app-layout>
@else
@include('errors.redirecionar')
@endif
