@if ($appPermissao->view_financial == true)
    <x-app-layout :assets="$assets ?? []">
        <div class="card">
            <div class="card-header">
                <h3 class="lead">Selecione a conta de destino</h3>
            </div>
            <div class="card-body">
                <div class="col-lg-12 col-xs-6">
                   <form action="{{ route('transfer.confirm') }}" method="POST">
                    @csrf
                       <div class="form-group">
                        <select class="form-select" id="contas_financeiras" name="contas_financeiras" required>
                            @foreach ($contas_financeiras as $contas_financeiras)
                                <option value="{{ $contas_financeiras->id }}">{{ $contas_financeiras->card_name }}
                                </option>
                            @endforeach
                        </select>
                       </div>
                       <div class="form-group">
                           <button type="submit" class="btn btn-primary"><i class="fas fa-arrow-right"></i> Próxima etapa</button>
                       </div>
                   </form>
                </div>
            </div>
        </div>
    </x-app-layout>
@else
    @include('errors.redirecionar')
@endif
