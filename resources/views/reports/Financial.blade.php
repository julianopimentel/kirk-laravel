@if ($appPermissao->report_view and $appPermissao->view_financial == true)
<x-app-layout :assets="$assets ?? []">

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                            <div class="card-header">
                                <div class="form-groups row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <h5>Historico Financeiro</h5>
                                    </div>
                                </div>
                            </div>
                            <form action="{{ route('financialrep.search') }}" method="POST" class="form form-inline">
                                {!! csrf_field() !!}
                                <div class="card-body">
                                    <div class="form-group row">
                                        <div class="col-md-2">
                                            <strong>Data de movimentação</strong>
                                        </div>
                                        De:
                                        <div class="col-sm-5 col-md-3 col-lg-3 col-xl-3">
                                            <div class="inner">
                                                <input type="date" name="datefrom" class="form-control" required>
                                            </div>
                                        </div>
                                        Até:
                                        <div class="col-sm-5 col-md-3 col-lg-3 col-xl-3">
                                            <div class="inner">
                                                <input type="date" name="dateto" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-1">
                                            <strong>Tipo</strong>
                                        </div>
                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-2">
                                            Movimentação
                                            <div class="inner">
                                                <select name="type" class="form-select">
                                                    <option value="">Selecionar</option>
                                                    @foreach ($types as $key => $type)
                                                        <option value="{{ $key }}">{{ $type }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-2">
                                            Tipo
                                            <div class="inner">
                                                <select class="form-select" id="tipo" name="tipo">
                                                    <option value="">Selecionar</option>
                                                    @foreach ($statusfinan as $statusfinan)
                                                        <option value="{{ $statusfinan->id }}">
                                                            {{ $statusfinan->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-2">
                                            Pagamento
                                            <div class="inner">
                                                <select class="form-select" id="pag" name="pag">
                                                    <option value="">Selecionar</option>
                                                    @foreach ($statuspag as $statuspags)
                                                        <option value="{{ $statuspags->id }}">
                                                            {{ $statuspags->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-2 col-md-2 col-lg-2 col-xl-1">
                                            <div class="box-header">
                                                <button type="submit" class="btn btn-primary" title="Pesquisar">Pesquisar</button>
                                            </div>
                                        </div>
                                        <div class="col-sm-2 col-md-2 col-lg-2 col-xl-1">
                                            <div class="box-header">
                                                <a href="{{ url('/report/financial') }}"
                                                    class="btn btn-danger" title="Limpar">Limpar</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="box-body">
                                @if (!$historics->isEmpty())
                                    <table class="table table-responsive table-sm">
                                        <thead>
                                            <tr>
                                                <th>N</th>
                                                <th>Mov.</th>
                                                <th>Valor</th>
                                                <th>Tipo</th>
                                                <th>F de Pag.</th>
                                                <th>Pessoa</th>
                                                <th>Observação</th>
                                                <th>Data</th>
                                                <th>Ação</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($historics as $historic)
                                                <tr>
                                                    <td>{{ $historic->id }}</td>
                                                    <td>{{ $historic->type($historic->type) }}</td>
                                                    <td>R$ {{ number_format($historic->amount), 2, '.', ',' }}</td>
                                                    <td>
                                                        @if ($historic->tipo)
                                                            <span class="{{ $historic->status->class }}">
                                                                {{ $historic->status->name }}
                                                            </span>
                                                        @else
                                                            - - -
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($historic->pag)
                                                            <span class="{{ $historic->statuspag->class }}">
                                                                {{ $historic->statuspag->name }}
                                                            </span>
                                                        @else
                                                            - - -
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($historic->user_id_transaction)
                                                            @if ($historic->userSender !== null)
                                                                {{ $historic->userSender->name }}
                                                            @else
                                                                Pessoa removida
                                                            @endif
                                                        @else
                                                            - - -
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($historic->observacao)
                                                            {{ $historic->observacao }}
                                                        @else
                                                            - - -
                                                        @endif
                                                    </td>
                                                    <td>{{ $historic->date }}</td>
                                                    <td>
                                                        @if ($appPermissao->view_financial == true)
                                                            <a href="{{ route('transaction.show' , $historic->id) }}"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" fill="currentColor" class="bi bi-eye"
                                                                viewBox="0 0 16 16">
                                                                <path
                                                                    d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                                                <path
                                                                    d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                                            </svg>
                                                        </a>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @empty
                                            @endforelse
                                        </tbody>
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Total:</th>
                                                <th>R$ {{ number_format($total_preco), 2, '.', ',' }}</th>
                                                <th></th>
                                                <th>Total Entrada:</th>
                                                <th>R$ {{ number_format($total_entrada), 2, '.', ',' }}</th>
                                                <th>Total Saida:</th>
                                                <th>R$ {{ number_format($total_saida), 2, '.', ',' }}</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                    </table>
                                    @if (isset($dataForm))
                                        {!! $historics->appends($dataForm)->links() !!}
                                    @else
                                        {!! $historics->links() !!}
                                    @endif
                            </div>
                        @else
                            @endif
                        </div>
                    </div>
                    <!-- /.row-->
                </div>
            </div>
    </div>
</x-app-layout>
        @else
        @include('errors.redirecionar')
        @endif