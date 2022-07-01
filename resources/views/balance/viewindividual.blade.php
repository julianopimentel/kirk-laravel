<!-- Modal Store Transaction-->
<div class="modal" id="ViewFinanceiro{{ $transaction->id }}" tabindex="-1"
    aria-labelledby="ViewFinanceiro{{ $transaction->id }}Title" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="storeTransactionTitle">Recibo #{{ $transaction->id }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="invoice">
                    <div class="invoice-print">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <address>
                                            <strong>Destino:</strong><br>
                                            {{ $account->name_company }}<br>
                                        </address>
                                    </div>
                                    @if ($transaction->userSender !== null)
                                        <div class="col-md-6 text-md-right">
                                            <address>
                                                <strong>Enviado por:</strong><br>
                                                {{ $transaction->userSender->name }}<br>
                                                @if ($transaction->userSender->email !== null)
                                                    {{ $transaction->userSender->email }}<br>
                                                @endif
                                                @if ($transaction->userSender->phone !== null)
                                                    {{ $transaction->userSender->phone }}<br>
                                                @endif
                                            </address>
                                        </div>
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <address>
                                            <strong>Método de pagamento:</strong><br>
                                            Tipo: @if ($transaction->tipo) {{ $transaction->status->name }} @endif<br>
                                        

                                            @if ($transaction->userSender !== null)
                                                Forma de pagamento: {{ $transaction->statuspag->name }}
                                            @endif
                                        </address>
                                    </div>
                                    <div class="col-md-6 text-md-right">
                                        <address>
                                            <strong>Date de lançamento:</strong><br>
                                            {{ $transaction->date }}<br>
                                            <br>
                                        </address>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @php
                            $products = json_decode($transaction->itens);
                        @endphp
                        @if (!$products == null)
                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <div class="section-title"><strong>Resumo</strong></div>
                                    <small>Todos os itens aqui não podem ser excluídos..</small>
                                    <div class="table table-responsive table-invoice">
                                        <table class="table table-striped table-sm">
                                            <tr>
                                                <th>Item</th>
                                                <th class="text-center">Valor</th>
                                                <th class="text-center">Quatidade</th>
                                                <th class="text-right">Taxa</th>
                                                <th class="text-right">Total</th>
                                            </tr>
                                            <tr>
                                                <td>
                                                    @forelse ($products->item as $user)
                                                        {{ $user }} <br>
                                                    @empty
                                                    @endforelse
                                                </td>
                                                <td class="text-center">
                                                    {{ $appSystem->currency }}
                                                    @forelse ($products->quantity as $user)
                                                        {{ $user }} <br>
                                                    @empty
                                                    @endforelse
                                                </td>
                                                <td class="text-center">
                                                    @forelse ($products->price as $user)
                                                        {{ $user }} <br>
                                                    @empty
                                                    @endforelse
                                                </td>
                                                <td class="text-right">
                                                    {{ $appSystem->currency }}
                                                    @forelse ($products->tax as $user)
                                                        {{ $user }} <br>
                                                    @empty
                                                    @endforelse
                                                </td>
                                                <td class="text-right">
                                                    {{ $appSystem->currency }}
                                                    @forelse ($products->total as $user)
                                                        {{ $user }} <br>
                                                    @empty
                                                    @endforelse
                                                </td>
                                            </tr>
                                        </table>
                                    @else
                                        <div class="row mt-4">
                                            <div class="col-md-12">
                                                <div class="table-responsive">
                        @endif
                    </div>
                    <div class="row mt-6">
                        <div class="col-lg-6">
                            @if ($transaction->observacao !== null)
                                <div class="section-title"><strong>Observação do pagamento</strong></div>
                                <p class="section-lead">{{ $transaction->observacao }}</p>
                            @endif
                        </div>
                        <div class="col-lg-6 text-right">
                            <hr class="mt-2 mb-2">
                            <div class="invoice-detail-item">
                                <div class="row">
                                    <div class="col-md-6 ml-auto float-right">
                                        <div class="table-responsive">
                                            <table class="table table-sm">
                                                <tbody>
                                                    <tr>
                                                        <th>Subtotal:</th>
                                                        <td>{{ $appSystem->currency }} {{ $transaction->sub_total }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Taxa:</th>
                                                        <td>{{ $appSystem->currency }} {{ $transaction->total_tax }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Desconto:</th>
                                                        <td>{{ $appSystem->currency }} {{ $transaction->discount }}
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="invoice-detail-name">Total</div>
                                <div class="invoice-detail-value text-dark">
                                    {{ $appSystem->currency }} {{ $transaction->amount }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
        <button class="btn btn-dark no-print"
            onclick="document.title='relatorio_individual_{{ $transaction->id }}_{{ date('Y-m-d') }}';window.print()"><svg
                xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-printer-fill" viewBox="0 0 16 16">
                <path
                    d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z" />
                <path
                    d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z" />
            </svg></button>
    </div>
                            </div>
                    </div>
                    </div>

                    