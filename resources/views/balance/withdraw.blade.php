<!-- Modal Retirar Transaction-->
<div class="modal fade" id="storeTransaction" tabindex="-1" role="dialog" aria-labelledby="storeTransactionTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="storeTransactionTitle">Retirada Finaceira</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('withdraw.store') }}" method="post">
                    {!! csrf_field() !!}
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="form-label">Pessoa</label>
                                <!--<select class="itemName form-control" id="itemName" name="itemName"></select> -->
                                <select class="form-select" id="itemName" name="itemName" disabled>
                                    <option value="">Para a instituição</option>
                                    @foreach ($people as $people)
                                        <option value="{{ $people->id }}">{{ $people->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-sm-4">
                            <label class="form-label">Tipo *</label>
                            <select class="form-select" id="tipo" name="tipo" required>
                                @foreach ($statusfinan as $statusfinan)
                                    <option value="{{ $statusfinan->id }}">{{ $statusfinan->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-3">
                            <label class="form-label">Data de lançamento *</label>
                            <input class="form-control" id="date_lancamento" type="date" name="date_lancamento"
                                placeholder="date" value="{{ date('Y-m-d') }}" required><span
                                class="help-block">Please enter a valid date</span>
                        </div>
                    </div>
                    <!-- /.row-->
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label class="form-label">Valor</label> em {{ $appSystem->currency }} *
                            <input type="number" name="valor" class="form-control" placeholder="Valor do depósito"
                                data-thousands="." data-decimal="," data-prefix="R$ " maxlength="18" required>
                        </div>
                        <div class="form-group col-sm-4">
                            <label class="form-label">Forma de Pagamento *</label>
                            <select class="form-select" id="pag" name="pag">
                                @foreach ($statuspag as $statuspags)
                                    <option value="{{ $statuspags->id }}">{{ $statuspags->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <label class="form-label">Observação</label>
                            <textarea class="form-control" name="observacao" rows="3" placeholder="Content.."
                                maxlength="255"></textarea>

                        </div>
                    </div>
                    <button class="btn btn-danger" type="submit" title="Retirar"><i
                            class="c-icon c-icon-sm cil-minus"></i> Retirar</button>
            </div>

            </form>
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
