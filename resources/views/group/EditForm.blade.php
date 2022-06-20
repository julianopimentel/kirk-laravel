@if ($appPermissao->edit_group == true)
<x-app-layout :assets="$assets ?? []">
    <div>
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Dados do Grupo</h4>

                        </div>
                    </div>
                    <div class="col-sm-12">
                            <div class="card-body">
                                <form method="POST" action="{{ route('group.update', $group->id) }}">
                                    @csrf
                                    @method('PUT')
                                    {!! csrf_field() !!}
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Nome</label>
                                                <input class="form-control" id='name_group' name='name_group'
                                                    value="{{ $group->name_group }}" type="text"
                                                    placeholder="Nome do grupo">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.row-->
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label">Tipo</label>
                                                <input class="form-control" id='tipo' name="tipo"
                                                    value="{{ $group->type }}" type="text" placeholder="Tipo de grupo">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label">Ativo</label>
                                                <select class="form-select" id='status_id' name="status_id">
                                                    @foreach ($statuses as $status)
                                                        @if ($status->id == $group->status_id)
                                                            <option value="{{ $status->id }}" selected="true">
                                                                {{ $status->name }}</option>
                                                        @else
                                                            <option value="{{ $status->id }}">{{ $status->name }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.row-->
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <label class="form-label">Responsável</label>
                                            <div class="form-group">
                                                <select class="itemName form-select" id="itemName"
                                                    name="itemName"></select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <label class="form-label">Observação</label>
                                            <textarea class="form-control" id='note' name="note" rows="3"
                                                placeholder="Content..">{{ $group->note }}</textarea>
                                        </div>
                                    </div>
                                    <br>
                                    <button class="btn btn-success" type="submit" title="Salvar">Salvar</button>
                                    <a class="btn btn-primary" href="{{ route('group.index') }}" title="Voltar">
                                    Voltar</a>
                                </form>
                            </div>
                        </div>
                        <!-- /.row-->
                    </div>
                    <!-- /.col-->
                </div>
                <!-- /.row-->
            </div>
        </div>
        <script type="text/javascript">
            $('.itemName').select2({
                placeholder: 'Select an item',

                ajax: {
                    url: '/select2-autocomplete-people',
                    dataType: 'json',
                    delay: 250,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: item.name,
                                    id: item.id
                                }
                            })
                        };
                    },
                    cache: true
                }
            });
        </script>
        <script>
            $("#name_group").on("input", function() {
                $(this).val($(this).val().toUpperCase());
            });
        </script>
    </div>
</x-app-layout>
@else
    @include('errors.redirecionar')
@endif
