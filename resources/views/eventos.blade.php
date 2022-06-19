@if ($appPermissao->home_eventos == true)
    <x-app-layout :assets="$assets ?? []">
        <div>
            <div class="row">
                @if (!$eventos->isEmpty())
                    @foreach ($eventos as $eventos)
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="d-flex align-items-center justify-content-center">
                                    <div
                                        class="d-flex flex-column text-left align-items-center justify-content-between ">
                                        <div class="event-images">
                                            <a href="#">
                                                <img src="https://templates.iqonic.design/hope-ui/pro/html/social-app/assets/images/profile-event/19.png"
                                                    class="img-fluid" alt="Responsive image" loading="lazy">
                                            </a>
                                        </div>
                                        <div class="card-body">
                                            <div class="d-flex gap-3">
                                                <div class="date-of-event">
                                                    <span>{{ translatedMonth(mes($eventos->start)) }}</span>
                                                    <h5>{{ dia($eventos->start) }}</h5>
                                                </div>
                                                <div class="text-left">
                                                    <h5><a href="{{ route('indexEventosDetail', $eventos->id) }}">{{ $eventos->title }}</a>
                                                    </h5>
                                                    <p><strong>Periodo</strong> entre
                                                        {{ datalimpa($eventos->start) }} e
                                                        {{ datalimpa($eventos->end) }}
                                                        <strong>Horário:</strong> {{ hora($eventos->hora_inicio) }}
                                                        às {{ hora($eventos->hora_final) }}
                                                    </p>
                                                    <p class="card-text">Requer Aprovação: @if ($eventos->requer_aprovacao == true)
                                                            Sim
                                                        @else
                                                            Não
                                                        @endif
                                                    </p>

                                                    <!-- membros que aceitou
                                                    <div class="event-member">
                                                        <div class="iq-media-group">
                                                        <a href="#" class="iq-media">
                                                        <img class="img-fluid avatar-40 rounded-circle" src="../social-app/assets/images/avatar/01.png" alt="img1" loading="lazy">
                                                        </a>
                                                        <a href="#" class="iq-media">
                                                        <img class="img-fluid avatar-40 rounded-circle" src="../social-app/assets/images/avatar/02.png" alt="img2" loading="lazy">
                                                        </a>
                                                        <a href="#" class="iq-media">
                                                        <img class="img-fluid avatar-40 rounded-circle" src="../social-app/assets/images/avatar/03.png" alt="img3" loading="lazy">
                                                        </a>
                                                        <a href="#" class="iq-media">
                                                        <img class="img-fluid avatar-40 rounded-circle" src="../social-app/assets/images/avatar/04.png" alt="img4" loading="lazy">
                                                        </a>
                                                        <a href="#" class="iq-media">
                                                        <img class="img-fluid avatar-40 rounded-circle" src="../social-app/assets/images/avatar/05.png" alt="img5" loading="lazy">
                                                        </a>
                                                        </div>
                                                    </div>
                                                -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="container-fluid">
                        <div class="fade-in">
                            Nenhum evento publicado até o momento.
                        </div>
                    </div>
                @endif
            </div>
        </div>
        </div>
        </div>
        </div>
    </x-app-layout>
@else
    @include('errors.redirecionar')
@endif
