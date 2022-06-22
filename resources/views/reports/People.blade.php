@if ($appPermissao->report_view and $appPermissao->view_people == true)
    <x-app-layout :assets="$assets ?? []">
        <div>
            <div class="row">
                <div class="col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Listagem de Pessoas</h4>
                            </div>
                            <form action="{{ route('peoplerep.search') }}" method="POST" class="form form-inline">
                                {!! csrf_field() !!}
                                <div class="card-body">
                                    <div class="form-group row">
                                        <div class="col-sm-6 col-md-2 col-lg-2 col-xl-2">
                                            <div class="inner">
                                                <input type="text" id='address' name="address" class="form-control"
                                                    placeholder="Address">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-2 col-lg-2 col-xl-2">
                                            <div class="inner">
                                                <select class="form-control" id="statuses" name="statuses">
                                                    <option value="">Status</option>
                                                    @foreach ($statuses as $statuses)
                                                        <option value="{{ $statuses->id }}">{{ $statuses->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5">
                                            <div class="inner">
                                                <div class="form-check form-check-inline mr-1">
                                                    <input class="form-check-input" name="is_responsible"
                                                        type="checkbox">
                                                    <label class="form-check-label" for="check1">Responsável</label>
                                                    &nbsp;
                                                    <input class="form-check-input" name="is_visitor" type="checkbox">
                                                    <label class="form-check-label" for="check2">Visitante</label>
                                                    &nbsp;
                                                    <input class="form-check-input" name="is_baptism" type="checkbox">
                                                    <label class="form-check-label" for="check4">Batismo</label>
                                                    &nbsp;
                                                    <input class="form-check-input" name="is_transferred"
                                                        type="checkbox">
                                                    <label class="form-check-label" for="check5">Transferido</label>
                                                    &nbsp;
                                                    <input class="form-check-input" name="is_conversion"
                                                        type="checkbox">
                                                    <label class="form-check-label" for="check6">Convertido</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-1">
                                            <div class="inner">
                                                <div class="form-check form-check-inline mr-1">
                                                    <input class="form-check-input" type="radio" value="m"
                                                        name="sex">
                                                    <label class="form-check-label" for="m">Masculino</label>
                                                </div>
                                                <div class="form-check form-check-inline mr-2">
                                                    <input class="form-check-input" type="radio" value="f"
                                                        name="sex">
                                                    <label class="form-check-label" for="f">Feminino</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    <strong>Data de cadastro</strong>
                                                </div>
                                                De:
                                                <div class="col-sm-5 col-md-3 col-lg-3 col-xl-3">
                                                    <div class="inner">
                                                        <input type="date" name="datefrom" class="form-control">
                                                    </div>
                                                </div>
                                                Até:
                                                <div class="col-sm-5 col-md-3 col-lg-3 col-xl-3">
                                                    <div class="inner">
                                                        <input type="date" name="dateto" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                                    <div class="box-header">
                                                        <button type="submit" class="btn btn-primary"
                                                            title="Pesquisar">Pesquisar</button>
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
                                    </div>
                                </div>
                            </form>
                        </div>
                        
                            @if (!$peoples->isEmpty())
                            <table class="table table-responsive table-sm">
                                <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Mobile</th>
                                            <th>Dt Nascimento</th>
                                            <th>Membresia</th>
                                            <th>Status</th>
                                            <th>Possuiu acesso?</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($peoples as $people)
                                            <tr>
                                                <td><strong>{{ $people->name }}</strong>
                                                    @if ($people->is_verify == false)
                                                        <span class="badge badge-danger">NEW</span>
                                                    @endif
                                                </td>
                                                <td>{{ $people->mobile }}</td>
                                                <td>{{ $people->birth_at }}</td>
                                                <td class="text-left"><strong>
                                                        <label> {{ $people->is_responsible == true ? 'R' : '' }}
                                                        </label>
                                                        <label> {{ $people->is_visitor == true ? 'V' : '' }} </label>
                                                        <label> {{ $people->is_baptism == true ? 'B' : '' }} </label>
                                                        <label> {{ $people->is_transferred == true ? 'T' : '' }}
                                                        </label>
                                                        <label> {{ $people->is_conversion == true ? 'C' : '' }}
                                                        </label>
                                                    </strong>
                                                </td>
                                                <td>
                                                    <span class="{{ $people->status->class }}">
                                                        {{ $people->status->name }}
                                                    </span>
                                                </td>
                                                <td>
                                                    @if ($people->user_id == null)
                                                        Não
                                                    @elseif($people->user_id != null)
                                                        Sim
                                                    @endif
                                                </td>
                                            </tr>
                                            </tr>
                                        @empty
                                        @endforelse
                                    </tbody>
                                </table>
                                @if (isset($dataForm))
                                    {!! $peoples->appends($dataForm)->links() !!}
                                @else
                                    {!! $peoples->links() !!}
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
</div>
<script>
    $("#name").on("input", function() {
        $(this).val($(this).val().toUpperCase());
    });
</script>
</x-app-layout>
@else
@include('errors.redirecionar')
@endif
