<!-- Modal Update Transaction-->
<div class="modal fade" id="updateCategory{{ $category->id }}" tabindex="-1" role="dialog"
    aria-labelledby="updateCategory{{ $category->id }}Title" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateCategory{{ $category->id }}Title">Editar conta</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('registrations.updateContas', $category->id) }}">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <label class="form-label">Apelido do Conta *</label>
                            <input class="form-control" type="text"
                                name="card_name" value="{{ $category->card_name }}" required autofocus>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label classe="form-label">Número do Cartão</label>
                                <input class="form-control" type="text" name="card_number" value="{{ $category->card_number }}">
                            </div>
                            <div class="form-group col-sm-3">
                                <label classe="form-label">Data de Expiração</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="MM/YY" name="expire_date" value="{{ $category->expire_date }}">
                                </div>
                            </div>
                            <div class="form-group col-sm-3">
                                <label classe="form-label">Tipo de cartão</label>
                                <div class="input-group">
                                    <select class="form-select  form-control mb-3" name="card_type" value="{{ $category->card_type }}">
                                        <option selected="">Select Card Type</option>
                                        <option value="Visa Card">Visa Card</option>
                                        <option value="Master Card">Master Card</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-4">
                                <label classe="form-label">Banco</label>
                                <input class="form-control" type="text" name="banco" value="{{ $category->banco }}">
                            </div>
                            <div class="form-group col-sm-2">
                                <label classe="form-label">Agencia</label>
                                <input class="form-control" type="text" name="agencia" value="{{ $category->agencia }}">
                            </div>
                            <div class="form-group col-sm-6">
                                <label classe="form-label">Número da Conta<label>
                                        <input class="form-control" type="text" name="conta" value="{{ $category->conta }}">
                            </div>
                        </div>
                        <div class="form-group col-sm-12">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="habilitar_financeiro"
                                {{ $category->habilitar_financeiro == true ? 'checked' : '' }}>
                                <label class="form-check-label" for="flexSwitchCheckChecked">Habilitar no
                                    Financeiro</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="habilitar_qrcode"
                                {{ $category->habilitar_qrcode == true ? 'checked' : '' }}>
                                <label class="form-check-label" for="flexSwitchCheckChecked">Receber Oferta via
                                    QRCode</label>
                            </div>
                        </div>
                        <div class="form-group col-sm-12">
                            <label classe="form-label">Código QR para receber ofertas (Cópia e cola)</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="qr_code" value="{{ $category->qr_code }}">
                            </div>
                        </div>
                        <div class="form-group col-sm-4">
                            <label classe="form-label">Valor em Conta *</label>
                            <input class="form-control" type="number" value="{{ $category->amount }}" disabled>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success" type="submit" title="Adicionar"><i
                                class="c-icon c-icon-sm cil-plus"></i> Adicionar</button>
                    </div>
            </div>

            </form>
        </div>
        <!-- /.row-->
    </div>
</div>



