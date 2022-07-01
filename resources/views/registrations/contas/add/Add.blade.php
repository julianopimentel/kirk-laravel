<!-- Modal Store Transaction-->
<div class="modal fade" id="storyCategory" tabindex="-1" role="dialog" aria-labelledby="storeTransactionTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Adicionar conta</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('registrations.storeContas') }}" method="post">
                    {!! csrf_field() !!}
                    @csrf
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <label class="form-label">Apelido do Conta *</label>
                            <input class="form-control" type="text" name="card_name" required autofocus>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label classe="form-label">Número do Cartão</label>
                                <input class="form-control" type="text" name="card_number">
                            </div>
                            <div class="form-group col-sm-3">
                                <label classe="form-label">Data de Expiração</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="MM/YY">
                                </div>
                            </div>
                            <div class="form-group col-sm-3">
                                <label classe="form-label">Tipo de cartão</label>
                                <div class="input-group">
                                    <select class="form-select  form-control mb-3" name="card_type">
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
                                <input class="form-control" type="text" name="banco">
                            </div>
                            <div class="form-group col-sm-2">
                                <label classe="form-label">Agencia</label>
                                <input class="form-control" type="text" name="agencia">
                            </div>
                            <div class="form-group col-sm-6">
                                <label classe="form-label">Número da Conta<label>
                                        <input class="form-control" type="text" name="conta">
                            </div>
                        </div>
                        <div class="form-group col-sm-12">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked"
                                    name="habilitar_financeiro" checked="true">
                                <label class="form-check-label" for="flexSwitchCheckChecked">Habilitar no
                                    Financeiro</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked"
                                    name="habilitar_qrcode" checked="true">
                                <label class="form-check-label" for="flexSwitchCheckChecked">Receber Oferta via
                                    QRCode</label>
                            </div>
                        </div>
                        <div class="form-group col-sm-12">
                            <label classe="form-label">Código QR para receber ofertas (Cópia e cola)</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="qr_code">
                            </div>
                        </div>
                        <div class="form-group col-sm-4">
                            <label classe="form-label">Valor em Conta *</label>
                            <input class="form-control" type="number" name="amount" required autofocus>
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
