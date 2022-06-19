@if ($appPermissao->home_financeiro_valores == true)
    <x-app-layout :assets="$assets ?? []">
        <div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title ">Meus dízimos e ofertas</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            @if (!$dizimos->isEmpty())
                                <div
                                    class="iq-timeline m-0 d-flex align-items-center justify-content-between position-relative">
                                    <ul class="list-inline p-0 m-0 w-100">
                                        @forelse($dizimos as $dizimo)
                                            <li>
                                                <div class="time @if ($dizimo->tipo == 9) bg-primary @endif ">
                                                    <span>{{ $dizimo->date }}</span>
                                                </div>
                                                <div class="content">
                                                    <div class="timeline-dots new-timeline-dots"></div>
                                                    <h6 class="mb-1">{{ $dizimo->status->name }}</h6>
                                                    <div class="d-inline-block w-100">
                                                        <p>R$ {{ $dizimo->amount }} <span
                                                                class="{{ $dizimo->statuspag->class }}">
                                                                {{ $dizimo->statuspag->name }}
                                                            </span></p>
                                                    </div>
                                                </div>
                                            </li>
                                        @empty
                                        @endforelse
                                    </ul>
                                </div>
                            @else
                                <div class="container-fluid">
                                    <div class="fade-in">
                                        Você ainda não possui dízimos/ofertas associados ao seu usuário!
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

    </x-app-layout>
@else
    @include('errors.redirecionar')
@endif
