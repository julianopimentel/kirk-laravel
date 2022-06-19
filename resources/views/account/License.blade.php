@if (Auth::user()->isAdmin() == true)
<x-app-layout layout="boxedfancy" :assets="$assets ?? []">

    <div class="row">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">{{ __('account.information') }}</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-sm-4 col-md-6 col-lg-6 col-xl-6">
                        @if (Auth::user()->license - $countinst >= 1 || Auth::user()->isAdmin() == true)
                        <a class="btn btn-primary" href="{{ route('account.create') }}" role="button">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                              </svg>
                        Criar nova conta</a> 
                        @endif
                    </div>
                    <div class="form-group col-sm-2 col-md-2 col-lg-2 col-xl-2">
                        <label for="ccmonth">{{ __('account.license') }}</label><br>
                        <label for="ccmonth">{{ $license->license }}</label>
                    </div>
                    <div class="form-group col-sm-2 col-md-2 col-lg-2 col-xl-2">
                        <label for="ccmonth">{{ __('account.used') }}</label><br>
                        <label for="ccmonth">{{ $countinst }}</label>
                    </div>
                    <div class="form-group col-sm-2 col-md-2 col-lg-2 col-xl-2">
                        <label for="ccmonth">{{ __('account.available') }}</label><br>
                        <label for="ccmonth">{{ $license->license - $countinst }}</label>
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>{{ __('account.doc') }}</th>
                            <th>{{ __('account.name') }}</th>
                            <th>{{ __('account.email') }}</th>
                            <th>{{ __('account.user_integrador') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                            <tr>
                                <td>{{ $license->doc }}</td>
                                <td>{{ $license->name_company }}</td>
                                <td>{{ $license->email }}</td>
                                <td>{{ $license->getUser->name }}</td>
                            </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">{{ __('account.hist_pag') }}</h4>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>{{ __('account.date') }}</th>
                            <th>{{ __('account.type') }}</th>
                            <th>{{ __('account.quantity') }}</th>
                            <th>{{ __('account.total') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pagamentos as $pagamento)
                            <tr>
                                <td>
                                    {{ datanormal($pagamento->created_at) }}</td>
                                <td>
                                 @if ( $pagamento->type == 1)
                                    Normal
                                @endif
                                </td>
                                <td>{{ $pagamento->quantity }} </td>
                                <td>R$ {{ formattedMoney($pagamento->total) }} </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $pagamentos->links() }}
            </div>
</x-app-layout>

    @else
        @include('errors.redirecionar')
@endif
