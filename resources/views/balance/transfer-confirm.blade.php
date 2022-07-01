@if ($appPermissao->view_financial == true)
    <x-app-layout :assets="$assets ?? []">
    <div class="card">
        <div class="card-header">
            <h3 class="lead">Confirmar transferência saldo</h3>
            <hr>
            <h5><b>Origem: </b>{{ $balance->card_name }}</h5>                        
            <small class="lead my-3">Saldo em conta: <b class="text-success">R${{ number_format($balance->amount, 2, ',', '.')}}</b></small>
            <hr>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h3 class="lead">Confirmar destino da transferência</h3>
            <hr>
        </div>
        <div class="card-body">
            <div class="col-lg-12 col-xs-6">
               <form action="{{ route('transfer.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <select class="form-select" id="entrada" name="entrada" required>
                        @foreach ($contas_financeiras as $contas_financeiras)
                            <option value="{{ $contas_financeiras->id }}">{{ $contas_financeiras->card_name }}
                            </option>
                        @endforeach
                    </select>
                   </div>
                <input type="hidden" name="retirada" value="{{ $balance->id }}">
                   <div class="form-group">
                       <input name="value" type="number" class="form-control" placeholder="Valor:" required>
                   </div>
                   <div class="form-group">
                       <button type="submit" class="btn btn-success"><i class="fas fa-arrow-right"></i> Transferir</button>
                   </div>
               </form>
            </div>
        </div>
    </div>
    </x-app-layout>
@else
    @include('errors.redirecionar')
@endif
