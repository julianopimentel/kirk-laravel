@if ($appPermissao->settings_meta == true)
<x-app-layout :assets="$assets ?? []">
    <div>
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Configurações de Metas</h4>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="card-body">
                            <form action="{{ route('settings.updateMeta') }}" method="POST">
                                @csrf
                                <h5 class="card-title">Metricas anuais</h5>
                                <!--
                                        <div class="row">
                                            <div class="col-sm-1">
                                                <label for="name">Visitante</label>
                                                <input class="form-control" id="visitante_mes" name="visitante_mes"
                                                    type="number" value="{{ $settings->visitante_mes }}">
                                            </div>
                                            <div class="col-sm-1">
                                                <label for="name">Grupo</label>
                                                <input class="form-control" id="grupo_ativo_mes" name="grupo_ativo_mes"
                                                    type="number" value="{{ $settings->grupo_ativo_mes }}">
                                            </div>
                                            <div class="col-sm-1">
                                                <label for="name">Batismo</label>
                                                <input class="form-control" id="batismo_mes" name="batismo_mes" type="number"
                                                    value="{{ $settings->batismo_mes }}">
                                            </div>
                                            <div class="col-sm-1">
                                                <label for="name">Conversão</label>
                                                <input class="form-control" id="conversao_mes" name="conversao_mes"
                                                    type="number" value="{{ $settings->conversao_mes }}">
                                            </div>
                                            <div class="col-sm-1">
                                                <label for="name">Pessoa</label>
                                                <input class="form-control" id="pessoa_mes" name="pessoa_mes" type="number"
                                                    value="{{ $settings->pessoa_mes }}">
                                            </div>
                                            <div class="col-sm-2">
                                                <label for="name">Visualizações</label>
                                                <input class="form-control" id="visualizacao_mes" name="visualizacao_mes"
                                                    type="number" value="{{ $settings->visualizacao_mes }}">
                                            </div>
                                            <div class="col-sm-2">
                                                <label for="name">Publicações</label>
                                                <input class="form-control" id="publicacao_mes" name="publicacao_mes"
                                                    type="number" value="{{ $settings->publicacao_mes }}">
                                            </div>
                                            <div class="col-sm-2">
                                                <label for="name">Comentários</label>
                                                <input class="form-control" id="comentario_mes" name="comentario_mes"
                                                    type="number" value="{{ $settings->comentario_mes }}">
                                            </div>
                                        </div>
                                          -->
                                <div class="row">
                                    <div class="col-sm-2">
                                        <label for="name">Visitante</label>
                                        <input class="form-control" id="visitante_ano" name="visitante_ano" type="number"
                                            value="{{ $settings->visitante_ano }}">
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="name">Grupos</label>
                                        <input class="form-control" id="grupo_ativo_ano" name="grupo_ativo_ano"
                                            type="number" value="{{ $settings->grupo_ativo_ano }}">
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="name">Batismo</label>
                                        <input class="form-control" id="batismo_ano" name="batismo_ano" type="number"
                                            value="{{ $settings->batismo_ano }}">
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="name">Conversão</label>
                                        <input class="form-control" id="conversao_ano" name="conversao_ano" type="number"
                                            value="{{ $settings->conversao_ano }}">
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="name">Pessoa</label>
                                        <input class="form-control" id="pessoa_ano" name="pessoa_ano" type="number"
                                            value="{{ $settings->pessoa_ano }}">
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="name">Eventos</label>
                                        <input class="form-control" id="calendario_ano" name="calendario_ano"
                                            type="number" value="{{ $settings->calendario_ano }}">
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="name">Recados</label>
                                        <input class="form-control" id="recado_ano" name="recado_ano"
                                            type="number" value="{{ $settings->recado_ano }}">
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="name">Pré-cadastro</label>
                                        <input class="form-control" id="precadastro_ano" name="precadastro_ano"
                                            type="number" value="{{ $settings->precadastro_ano }}">
                                    </div>
                                    
                                    <!--
                                            <div class="col-sm-2">
                                                <label for="name">Visualizações</label>
                                                <input class="form-control" id="visualizacao_ano" name="visualizacao_ano"
                                                    type="number" value="{{ $settings->visualizacao_ano }}">
                                            </div>
                                            <div class="col-sm-2">
                                                <label for="name">Publicações</label>
                                                <input class="form-control" id="publicacao_ano" name="publicacao_ano"
                                                    type="number" value="{{ $settings->publicacao_ano }}">
                                            </div>
                                            <div class="col-sm-2">
                                                <label for="name">Comentários</label>
                                                <input class="form-control" id="comentario_ano" name="comentario_ano"
                                                    type="number" value="{{ $settings->comentario_ano }}">
                                            </div>/.row-->
                                </div>
                                <br><br>
                                <h5 class="card-title">Movimento fincaneiro</h5>
                                <div class="row">
                                    <!--
                                            <div class="col-sm-3">
                                                <label for="name">Dizimo Mês</label>
                                                <input class="form-control" id="fin_dizimo_mes" name="fin_dizimo_mes"
                                                    type="float" value=" {{ $settings->fin_dizimo_mes }}">
                                            </div>
                                            <div class="col-sm-3">
                                                <label for="name">Oferta Mês</label>
                                                <input class="form-control" id="fin_oferta_mes" name="fin_oferta_mes"
                                                    type="float" value="{{ $settings->fin_oferta_mes }}">
                                            </div>
                                            <div class="col-sm-3">
                                                <label for="name">Despesa Mês</label>
                                                <input class="form-control" id="fin_despesa_mes" name="fin_despesa_mes"
                                                    type="float" value="{{ $settings->fin_despesa_mes }}">
                                            </div>
                                            <div class="col-sm-3">
                                                <label for="name">Ações Mês</label>
                                                <input class="form-control" id="fin_acao_mes" name="fin_acao_mes" type="float"
                                                    value="{{ $settings->fin_acao_mes }}">
                                            </div>
                                        -->
                                    <div class="col-sm-3">
                                        <label for="name">Dizimo Ano*</label>
                                        <input class="form-control" id="dizimo_ano" name="dizimo_ano" type="float"
                                            value="{{ $settings->fin_dizimo_ano }}" required>
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="name">Oferta Ano*</label>
                                        <input class="form-control" id="oferta_ano" name="oferta_ano" type="float"
                                            value="{{ $settings->fin_oferta_ano }}" required>
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="name">Despesa Ano*</label>
                                        <input class="form-control" id="despesa_ano" name="despesa_ano" type="float"
                                            value="{{ $settings->fin_despesa_ano }}" required>
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="name">Ações Ano*</label>
                                        <input class="form-control" id="acoes_ano" name="acoes_ano" type="float"
                                            value="{{ $settings->fin_acao_ano }}" required>
                                    </div>
                                </div>
                                <!-- /.row-->
                                <!-- /.row-->
                                <br><br>
                                <button class="btn btn-success" type="submit" title="Salvar">Salvar</button>
                            <a class="btn btn-danger" href="{{ route('settings') }}" title="Voltar">Voltar</a>

                    <!-- /.row-->
                </div>
            </div>
        </x-app-layout>
        @else
            @include('errors.redirecionar')
        @endif
        