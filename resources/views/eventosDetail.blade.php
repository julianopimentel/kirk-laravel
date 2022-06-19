@if ($appPermissao->home_eventos == true)
    <x-app-layout :assets="$assets ?? []">
        <div>
        <div class="container-fluid content-inner pb-0">
            <div class="row">
                <div class="col-lg-12">
                    <div
                        class="d-flex align-items-center justify-content-center justify-content-md-between mb-3 gap-4 flex-wrap">
                        <div class="group-info d-flex align-items-center gap-3">
                            <div
                                        class="avatar-70 rounded-circle bg-light text-center  d-flex align-items-center justify-content-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-calendar-date" viewBox="0 0 16 16">
                                            <path d="M6.445 11.688V6.354h-.633A12.6 12.6 0 0 0 4.5 7.16v.695c.375-.257.969-.62 1.258-.777h.012v4.61h.675zm1.188-1.305c.047.64.594 1.406 1.703 1.406 1.258 0 2-1.066 2-2.871 0-1.934-.781-2.668-1.953-2.668-.926 0-1.797.672-1.797 1.809 0 1.16.824 1.77 1.676 1.77.746 0 1.23-.376 1.383-.79h.027c-.004 1.316-.461 2.164-1.305 2.164-.664 0-1.008-.45-1.05-.82h-.684zm2.953-2.317c0 .696-.559 1.18-1.184 1.18-.601 0-1.144-.383-1.144-1.2 0-.823.582-1.21 1.168-1.21.633 0 1.16.398 1.16 1.23z"/>
                                            <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                                          </svg>
                                    </div>

                            <div>
                                
                            </div>
                            <div class="info">
                                <h4>{{ $eventos->title }}</h4>
                                <p class="mb-0 d-flex justify-content-center align-items-center">
                                    <svg width="20" class="me-1" viewBox="0 0 24 24" fill="currentColor"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M7.7688 8.71387H16.2312C18.5886 8.71387 20.5 10.5831 20.5 12.8885V17.8254C20.5 20.1308 18.5886 22 16.2312 22H7.7688C5.41136 22 3.5 20.1308 3.5 17.8254V12.8885C3.5 10.5831 5.41136 8.71387 7.7688 8.71387ZM11.9949 17.3295C12.4928 17.3295 12.8891 16.9419 12.8891 16.455V14.2489C12.8891 13.772 12.4928 13.3844 11.9949 13.3844C11.5072 13.3844 11.1109 13.772 11.1109 14.2489V16.455C11.1109 16.9419 11.5072 17.3295 11.9949 17.3295Z"
                                            fill="currentColor"></path>
                                        <path opacity="0.4"
                                            d="M17.523 7.39595V8.86667C17.1673 8.7673 16.7913 8.71761 16.4052 8.71761H15.7447V7.39595C15.7447 5.37868 14.0681 3.73903 12.0053 3.73903C9.94257 3.73903 8.26594 5.36874 8.25578 7.37608V8.71761H7.60545C7.20916 8.71761 6.83319 8.7673 6.47754 8.87661V7.39595C6.4877 4.41476 8.95692 2 11.985 2C15.0537 2 17.523 4.41476 17.523 7.39595Z"
                                            fill="currentColor"></path>
                                    </svg>
                                    @if ($eventos->status == true)
                                        Ativo
                                    @else
                                        Inativo
                                    @endif, ??? pessoas confirmadas
                                </p>
                            </div>
                        </div>
                        <div class="group-member d-flex align-items-center gap-3">
                            <div class="iq-media-group">
                                <!--membros
                                <a href="#" class="iq-media">
                                    <img class="img-fluid avatar-40 rounded-circle" src="../social-app/assets/images/avatar/02.png" alt="" loading="lazy" />
                                </a>
                                <a href="#" class="iq-media">
                                    <img class="img-fluid avatar-40 rounded-circle" src="../social-app/assets/images/avatar/03.png" alt="" loading="lazy" />
                                </a>
                                <a href="#" class="iq-media">
                                    <img class="img-fluid avatar-40 rounded-circle" src="../social-app/assets/images/avatar/04.png" alt="" loading="lazy" />
                                </a>
                                <a href="#" class="iq-media">
                                    <img class="img-fluid avatar-40 rounded-circle" src="../social-app/assets/images/avatar/05.png" alt="" loading="lazy" />
                                </a>
                                <a href="#" class="iq-media">
                                    <img class="img-fluid avatar-40 rounded-circle" src="../social-app/assets/images/avatar/06.png" alt="" loading="lazy" />
                                </a>
                                <a href="#" class="iq-media">
                                    <img class="img-fluid avatar-40 rounded-circle" src="../social-app/assets/images/avatar/07.png" alt="" loading="lazy" />
                                </a>
                                <a href="#" class="iq-media">
                                    <img class="img-fluid avatar-40 rounded-circle" src="../assets/images/user/11.jpg" alt="" loading="lazy" />
                                </a>
                            -->
                            </div>
                            @if ($eventos_confirm->isEmpty())
                                <form method="POST" action="{{ route('calendar.storeConfirm', $eventos->id) }}">
                                    @csrf
                                    <button class="btn btn-success" type="submit">Confirmar
                                        presença</button>
                                </form>
                            @else
                                <form method="POST" action="{{ route('calendar.storeRemove', $eventos->id) }}">
                                    @csrf
                                    <button class="btn btn-danger" type="submit">Retirar
                                        presença</button>
                                </form>
                            @endif

                            <button type="submit" class="btn btn-primary d-flex align-items-center gap-2">
                                <svg width="20" class="icon-20" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.4"
                                        d="M16.6667 2H7.33333C3.92889 2 2 3.92889 2 7.33333V16.6667C2 20.0622 3.92 22 7.33333 22H16.6667C20.0711 22 22 20.0622 22 16.6667V7.33333C22 3.92889 20.0711 2 16.6667 2Z"
                                        fill="currentColor"></path>
                                    <path
                                        d="M15.3205 12.7083H12.7495V15.257C12.7495 15.6673 12.4139 16 12 16C11.5861 16 11.2505 15.6673 11.2505 15.257V12.7083H8.67955C8.29342 12.6687 8 12.3461 8 11.9613C8 11.5765 8.29342 11.2539 8.67955 11.2143H11.2424V8.67365C11.2824 8.29088 11.6078 8 11.996 8C12.3842 8 12.7095 8.29088 12.7495 8.67365V11.2143H15.3205C15.7066 11.2539 16 11.5765 16 11.9613C16 12.3461 15.7066 12.6687 15.3205 12.7083Z"
                                        fill="currentColor"></path>
                                </svg>
                                Invite
                            </button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Evento</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <p>{{ $eventos->body }}</p>
                            <ul class="list-inline p-0 m-0">
                                <li class="mb-3 d-flex align-items-center gap-2">
                                    <svg class="icon-32 text-dark" width="32" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12.7 11.7488H3.75" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M12.7002 16.7498L20.6372 11.7488L12.7002 6.74776V16.7498Z"
                                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                            fill="currentColor"></path>
                                    </svg>
                                    <h6 class="mb-0">Data de Inicio: {{ datalimpa($eventos->start) }}</h6>
                                </li>
                                <li class="mb-3 d-flex align-items-center gap-2">
                                    <svg class="icon-32 text-dark" width="32" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12.7 11.7488H3.75" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M12.7002 16.7498L20.6372 11.7488L12.7002 6.74776V16.7498Z"
                                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                            fill="currentColor"></path>
                                    </svg>
                                    <h6 class="mb-0">Data de Fim: {{ datalimpa($eventos->end) }}</h6>
                                </li>
                                <li class="mb-3 d-flex align-items-center gap-2">
                                    <svg class="icon-32 text-dark" width="32" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12.7 11.7488H3.75" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M12.7002 16.7498L20.6372 11.7488L12.7002 6.74776V16.7498Z"
                                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                            fill="currentColor"></path>
                                    </svg>
                                    <h6 class="mb-0">Hora Inicio: {{ hora($eventos->hora_inicio) }}</h6>
                                </li>
                                <li class="mb-3 d-flex align-items-center gap-2">
                                    <svg class="icon-32 text-dark" width="32" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12.7 11.7488H3.75" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M12.7002 16.7498L20.6372 11.7488L12.7002 6.74776V16.7498Z"
                                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                            fill="currentColor"></path>
                                    </svg>
                                    <h6 class="mb-0">Hora Fim: {{ hora($eventos->hora_final) }}</h6>
                                </li>
                                <li class="mb-3 d-flex align-items-center gap-2">
                                    <svg class="icon-32 text-dark" width="32" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12.7 11.7488H3.75" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M12.7002 16.7498L20.6372 11.7488L12.7002 6.74776V16.7498Z"
                                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                            fill="currentColor"></path>
                                    </svg>
                                    <h6 class="mb-0">Requer Aprovação: @if ($eventos->requer_aprovacao == true)
                                            Sim
                                        @else
                                            Não
                                        @endif
                                    </h6>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Detalhes</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <ul class="list-inline p-0 m-0">
                                <li class="mb-3 d-flex align-items-center gap-3">
                                    <div
                                        class="avatar-40 rounded-circle bg-light text-center  d-flex align-items-center justify-content-center">
                                        <svg class="icon-22" width="22" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M8.53162 2.93677C10.7165 1.66727 13.402 1.68946 15.5664 2.99489C17.7095 4.32691 19.012 6.70418 18.9998 9.26144C18.95 11.8019 17.5533 14.19 15.8075 16.0361C14.7998 17.1064 13.6726 18.0528 12.4488 18.856C12.3228 18.9289 12.1848 18.9777 12.0415 19C11.9036 18.9941 11.7693 18.9534 11.6508 18.8814C9.78243 17.6746 8.14334 16.134 6.81233 14.334C5.69859 12.8314 5.06584 11.016 5 9.13442C4.99856 6.57225 6.34677 4.20627 8.53162 2.93677ZM9.79416 10.1948C10.1617 11.1008 11.0292 11.6918 11.9916 11.6918C12.6221 11.6964 13.2282 11.4438 13.6748 10.9905C14.1214 10.5371 14.3715 9.92064 14.3692 9.27838C14.3726 8.29804 13.7955 7.41231 12.9073 7.03477C12.0191 6.65723 10.995 6.86235 10.3133 7.55435C9.63159 8.24635 9.42664 9.28872 9.79416 10.1948Z"
                                                fill="currentColor"></path>
                                            <ellipse opacity="0.4" cx="12" cy="21" rx="5"
                                                ry="1" fill="currentColor"></ellipse>
                                        </svg>
                                    </div>
                                    
                                    <h6 class="mb-0">
                                        @foreach ($eventos_confirm as $eventos_confirm)
                                        Status: 
                                        @if ($eventos_confirm->aprovado == true)
                                        Aprovado
                                    @else
                                        Não aprovado
                                    @endif 
                                    <small>
                                    em {{ datarecente($eventos_confirm->created_at) }}</small>
                                    @endforeach
                                    </h6>
                                    
                                </li>
                                <li class="mb-3 d-flex align-items-center gap-3">
                                    <div
                                        class="avatar-40 rounded-circle bg-light text-center  d-flex align-items-center justify-content-center">
                                        <svg class="icon-22" width="22" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M8.53162 2.93677C10.7165 1.66727 13.402 1.68946 15.5664 2.99489C17.7095 4.32691 19.012 6.70418 18.9998 9.26144C18.95 11.8019 17.5533 14.19 15.8075 16.0361C14.7998 17.1064 13.6726 18.0528 12.4488 18.856C12.3228 18.9289 12.1848 18.9777 12.0415 19C11.9036 18.9941 11.7693 18.9534 11.6508 18.8814C9.78243 17.6746 8.14334 16.134 6.81233 14.334C5.69859 12.8314 5.06584 11.016 5 9.13442C4.99856 6.57225 6.34677 4.20627 8.53162 2.93677ZM9.79416 10.1948C10.1617 11.1008 11.0292 11.6918 11.9916 11.6918C12.6221 11.6964 13.2282 11.4438 13.6748 10.9905C14.1214 10.5371 14.3715 9.92064 14.3692 9.27838C14.3726 8.29804 13.7955 7.41231 12.9073 7.03477C12.0191 6.65723 10.995 6.86235 10.3133 7.55435C9.63159 8.24635 9.42664 9.28872 9.79416 10.1948Z"
                                                fill="currentColor"></path>
                                            <ellipse opacity="0.4" cx="12" cy="21" rx="5"
                                                ry="1" fill="currentColor"></ellipse>
                                        </svg>
                                    </div>
                                    <h6 class="mb-0">Endereço: 
                                    </h6>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

    </x-app-layout>
@else
    @include('errors.redirecionar')
@endif
