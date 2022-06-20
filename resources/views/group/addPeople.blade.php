<!-- Modal Depositar Transaction-->
<div class="modal fade" id="storeAdicionarPessoa" tabindex="-1" role="dialog" aria-labelledby="storeAdicionarPessoa"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="storeTransactionTitle">Busque e selecione a Pessoa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{ session(['group' => $group->id]) }}
                <form method="POST" action="{{ route('group.storepeoplegroup') }}">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-12">
                            <!--<select class="itemName form-control" id="itemName" name="itemName"></select> -->
                            <select class="form-select" id="itemName" name="itemName">
                                @foreach ($people as $people)
                                    <option value="{{ $people->id }}">{{ $people->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success" type="submit" title="Adicionar">Adicionar</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.row-->
    </div>
</div>
<!-- jquery para algumas funcionalidades -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<script type="text/javascript">
    $('.itemName').select2({
        placeholder: 'Selecionar uma pessoa',
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