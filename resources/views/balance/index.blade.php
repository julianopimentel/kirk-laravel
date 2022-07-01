@if ($appPermissao->view_financial == true)
    <x-app-layout :assets="$assets ?? []">
        @if (!empty($_GET['month']) && !empty($_GET['year']))
            @php
                $month = $_GET['month'];
                $year = $_GET['year'];
            @endphp
        @else
            @php
                $month = date('m');
                $year = date('Y');
            @endphp
        @endif
        <div class="container-fluid">
            <div class="fade-in">
                <div class="card">
                    <div class="card-header text-center">
                        <h4 class="card-title">{{ translatedMonth($month) }} - {{ $year }}</h4>
                    </div>
                    <!-- Options -->
                    <div class="card-body">
                        <div class="d-flex justify-content-between flex-wrap d-print-none">
                            <div class="mb-3">
                                @if ($appPermissao->add_entrada_financial == true)
                                    <button class="btn btn-success" type="submit" data-bs-toggle="modal"
                                        data-bs-target="#storeTransactionEntrada"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                            <path
                                                d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                        </svg>
                                        Entrada</button>
                                    @include('balance.depositar')
                                @endif
                                @if ($appPermissao->add_retirada_financial == true)
                                    @if ($amount > 1)
                                        <button class="btn btn-danger" type="submit" data-bs-toggle="modal"
                                            data-bs-target="#storeTransaction"><svg xmlns="http://www.w3.org/2000/svg"
                                                width="16" height="16" fill="currentColor" class="bi bi-dash-lg"
                                                viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                    d="M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8Z" />
                                            </svg>
                                            Retirada</button>
                                        @include('balance.withdraw')
                                    @endif
                                @endif
                            </div>
                            <div class="btn-group mb-3" role="group" aria-label="Relatório">
                                <button class="btn btn-sm btn-secondary"
                                    onclick="document.title='relatorio_{{ $month }}_{{ $year }}';window.print()">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z" />
                                        <path
                                            d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z" />
                                    </svg>
                                    Imprimir
                                </button>
                            </div>
                        </div>

                        <!-- Dashboard Navigation -->
                        <div class="d-flex justify-content-between flex-wrap d-print-none">
                            <div class="form-group">
                                <select class="form-select" name="year"
                                    onchange="location.replace('{{ route('transaction.index') }}?month={{ str_pad($month, 2, 0, STR_PAD_LEFT) }}&year='+this.value)">
                                    <option value="none" selected disabled hidden>{{ date('Y') }}</option>
                                    @for ($y = 2020; $y <= 2030; $y++)
                                        <option value="{{ $y == $year ? old('y') : $y }}"
                                            {{ $y == $year ? 'selected' : '' }}>{{ $y }}
                                        </option>
                                    @endfor
                                </select>
                            </div>

                            <div>
                                <ul class="nav nav-tabs" role="tablist">
                                    @for ($m = 1; $m <= 12; $m++)
                                        <li class="nav-item">
                                            <a href="{{ route('transaction.index') }}?month={{ str_pad($m, 2, 0, STR_PAD_LEFT) }}&year={{ $year ?? '' }}"
                                                class="nav-link text-secundary {{ $m == $month ? 'active' : '' }}">{{ substr(translatedMonth($m), 0, 3) }}</a>
                                        </li>
                                    @endfor
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Content -->
                <div class="tab-content">
                    <div class="tab-pane fade show active">
                        <div class="row mt-2 d-print-none">
                            <div class="col-sm-4 my-2">
                                <div class="card">
                                    <div class="card-header text-center">
                                        <strong>Balanço mensal</strong>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text text-success">Receita:
                                            {{ $appSystem->currency }} {{ formattedMoney($month_one) }}</p>
                                        <p class="card-text text-danger">Despesa:
                                            {{ $appSystem->currency }} {{ formattedMoney($month_zero) }}</p>
                                    </div>
                                    <div class="card-footer">
                                        <strong
                                            class="{{ $month_one - $month_zero >= 0 ? 'text-success' : 'text-danger' }}">Total:
                                            {{ $appSystem->currency }}
                                            {{ formattedMoney($month_one - $month_zero) }}</strong>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4 my-2">
                                <div class="card">
                                    <div class="card-header text-center">
                                        <strong>Balanço anual</strong>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text text-success">Receita:
                                            {{ $appSystem->currency }} {{ formattedMoney($year_one) }}</p>
                                        <p class="card-text text-danger">Despesa:
                                            {{ $appSystem->currency }} {{ formattedMoney($year_zero) }}</p>
                                    </div>
                                    <div class="card-footer">
                                        <strong
                                            class="{{ $year_one - $year_zero >= 0 ? 'text-success' : 'text-danger' }}">Total:
                                            {{ $appSystem->currency }}
                                            {{ formattedMoney($year_one - $year_zero) }}</strong>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4 my-2">
                                <div class="card">
                                    <div class="card-header text-center">
                                        <strong>Balanço geral</strong>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text text-success">Receita:
                                            {{ $appSystem->currency }} {{ formattedMoney($all_one) }}</p>
                                        <p class="card-text text-danger">Despesa:
                                            {{ $appSystem->currency }} {{ formattedMoney($all_zero) }}</p>
                                    </div>
                                    <div class="card-footer">
                                        <strong
                                            class="{{ $all_one - $all_zero >= 0 ? 'text-success' : 'text-danger' }}">Total:
                                            {{ $appSystem->currency }}
                                            {{ formattedMoney($all_one - $all_zero) }}</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <!-- Content table-->
                            <div class="table-responsive">
                                <table class="table table-sm table-hover">
                                    <thead>
                                        <tr>
                                            <th width="1%" colspan="2"></th>
                                            <th scope="col">Data</th>
                                            <th style="width: 120px">Transação</th>
                                            <th scope="col">Categoria</th>
                                            <th>Forma de Pagamento</th>
                                            <th>Pessoa</th>
                                            <th scope="col" class="text-right">Valor</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($transactions as $transaction)
                                            <tr @if($transaction->type == "O") class="table-danger" @endif data-bs-toggle="modal" data-bs-target="#ViewFinanceiro{{ $transaction->id }}">
                                                <td>  
                                                @include('balance.viewindividual')
                                                    <td width="1%">
                                                        @if ($appPermissao->view_financial == true)
                                                            <a href="{{ route('transaction.show' , $transaction->id) }}">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-pdf-fill" viewBox="0 0 16 16">
                                                                <path d="M5.523 12.424c.14-.082.293-.162.459-.238a7.878 7.878 0 0 1-.45.606c-.28.337-.498.516-.635.572a.266.266 0 0 1-.035.012.282.282 0 0 1-.026-.044c-.056-.11-.054-.216.04-.36.106-.165.319-.354.647-.548zm2.455-1.647c-.119.025-.237.05-.356.078a21.148 21.148 0 0 0 .5-1.05 12.045 12.045 0 0 0 .51.858c-.217.032-.436.07-.654.114zm2.525.939a3.881 3.881 0 0 1-.435-.41c.228.005.434.022.612.054.317.057.466.147.518.209a.095.095 0 0 1 .026.064.436.436 0 0 1-.06.2.307.307 0 0 1-.094.124.107.107 0 0 1-.069.015c-.09-.003-.258-.066-.498-.256zM8.278 6.97c-.04.244-.108.524-.2.829a4.86 4.86 0 0 1-.089-.346c-.076-.353-.087-.63-.046-.822.038-.177.11-.248.196-.283a.517.517 0 0 1 .145-.04c.013.03.028.092.032.198.005.122-.007.277-.038.465z"/>
                                                                <path fill-rule="evenodd" d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm5.5 1.5v2a1 1 0 0 0 1 1h2l-3-3zM4.165 13.668c.09.18.23.343.438.419.207.075.412.04.58-.03.318-.13.635-.436.926-.786.333-.401.683-.927 1.021-1.51a11.651 11.651 0 0 1 1.997-.406c.3.383.61.713.91.95.28.22.603.403.934.417a.856.856 0 0 0 .51-.138c.155-.101.27-.247.354-.416.09-.181.145-.37.138-.563a.844.844 0 0 0-.2-.518c-.226-.27-.596-.4-.96-.465a5.76 5.76 0 0 0-1.335-.05 10.954 10.954 0 0 1-.98-1.686c.25-.66.437-1.284.52-1.794.036-.218.055-.426.048-.614a1.238 1.238 0 0 0-.127-.538.7.7 0 0 0-.477-.365c-.202-.043-.41 0-.601.077-.377.15-.576.47-.651.823-.073.34-.04.736.046 1.136.088.406.238.848.43 1.295a19.697 19.697 0 0 1-1.062 2.227 7.662 7.662 0 0 0-1.482.645c-.37.22-.699.48-.897.787-.21.326-.275.714-.08 1.103z"/>
                                                              </svg>
                                                            </a>
                                                        @endif
                                                    </td>
                                                </td>
                                                <td>{{ $transaction->date }}</td>
                                                <td>{{ $transaction->type($transaction->type) }}</td>
                                                <td>                                               
                                                    @if ($transaction->tipo)
                                                        <span class="{{ $transaction->status->class }}">
                                                            {{ $transaction->status->name }}
                                                        </span>
                                                    @else
                                                        - - -
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($transaction->pag)
                                                        <span class="{{ $transaction->statuspag->class }}">
                                                            {{ $transaction->statuspag->name }}
                                                        </span>
                                                    @else
                                                        - - -
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($transaction->user_id_transaction)
                                                        @if ($transaction->userSender !== null)
                                                            {{ $transaction->userSender->name }}
                                                        @else
                                                            Pessoa removida
                                                        @endif
                                                    @else
                                                        - - -
                                                    @endif
                                                </td>
                                                <td class="text-right">
                                                    <span
                                                        class="{{ $transaction->type == 'I' ? 'text-success' : 'text-danger' }}">{{ $appSystem->currency }}
                                                        {{ formattedMoney($transaction->amount) }}</span>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center">Nenhuma transação
                                                    encontrada...</td>
                                            </tr>
                                        @endforelse
                                        <tr
                                            class="table {{ $month_one - $month_zero >= 0 ? 'text-success' : 'text-danger' }}">
                                            <td colspan="4">
                                                <strong>Total do mês</strong>
                                            </td>
                                            <td colspan="4" class="text-right">
                                                <strong>{{ $appSystem->currency }}
                                                    {{ formattedMoney($month_one - $month_zero) }}</strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
        <script type="text/javascript">
            jQuery(document).ready(function() {
                jQuery('.money').mask("#0,00", {
                    reverse: true
                });
            });
        </script>
    </x-app-layout>
@else
    @include('errors.redirecionar')
@endif
