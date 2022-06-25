<li class="nav-item dropdown">
    <a href="#" class="nav-link" id="notification-drop" data-bs-toggle="dropdown">
        <svg width="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M19.7695 11.6453C19.039 10.7923 18.7071 10.0531 18.7071 8.79716V8.37013C18.7071 6.73354 18.3304 5.67907 17.5115 4.62459C16.2493 2.98699 14.1244 2 12.0442 2H11.9558C9.91935 2 7.86106 2.94167 6.577 4.5128C5.71333 5.58842 5.29293 6.68822 5.29293 8.37013V8.79716C5.29293 10.0531 4.98284 10.7923 4.23049 11.6453C3.67691 12.2738 3.5 13.0815 3.5 13.9557C3.5 14.8309 3.78723 15.6598 4.36367 16.3336C5.11602 17.1413 6.17846 17.6569 7.26375 17.7466C8.83505 17.9258 10.4063 17.9933 12.0005 17.9933C13.5937 17.9933 15.165 17.8805 16.7372 17.7466C17.8215 17.6569 18.884 17.1413 19.6363 16.3336C20.2118 15.6598 20.5 14.8309 20.5 13.9557C20.5 13.0815 20.3231 12.2738 19.7695 11.6453Z"
                fill="currentColor"></path>
            <path opacity="0.4"
                d="M14.0088 19.2283C13.5088 19.1215 10.4627 19.1215 9.96275 19.2283C9.53539 19.327 9.07324 19.5566 9.07324 20.0602C9.09809 20.5406 9.37935 20.9646 9.76895 21.2335L9.76795 21.2345C10.2718 21.6273 10.8632 21.877 11.4824 21.9667C11.8123 22.012 12.1482 22.01 12.4901 21.9667C13.1083 21.877 13.6997 21.6273 14.2036 21.2345L14.2026 21.2335C14.5922 20.9646 14.8734 20.5406 14.8983 20.0602C14.8983 19.5566 14.4361 19.327 14.0088 19.2283Z"
                fill="currentColor"></path>
        </svg>
        <span class="bg-danger dots"></span>
    </a>
    <div class="sub-drop dropdown-menu dropdown-menu-end p-0" aria-labelledby="notification-drop">
        <div class="card shadow-none m-0">
            <div class="card-header d-flex justify-content-between bg-primary py-3">
                <div class="header-title">
                    <h5 class="mb-0 text-white">Notificações</h5>
                </div>
            </div>
            <div class="float-right font-size-8 text-white text-center">
                <a href="{{ route('notificationread') }}">Marcar todos como lida</a>
            </div>
            <div class="card-body p-0">
                @foreach (auth()->user()->unreadNotifications as $notification)
                    @if ($notification->type == 'App\Notifications\ConfirmEvent')
                        <a href="#" class="iq-sub-card">
                            <div class="d-flex align-items-center">
                                <div class="avatar-40 rounded-pill bg-soft-secundary p-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-calendar-check" viewBox="0 0 16 16">
                                        <path d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                                        <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                                      </svg>
                                </div>
                                <div class="ms-3 w-100">
                                    <h6 class="mb-0 ">Presença confirmada no evento</h6>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <small
                                            class="float-right font-size-12">{{ datarecente($notification->created_at) }}</small>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endif
                    @if ($notification->type == 'App\Notifications\CancelEvent')
                        <a href="#" class="iq-sub-card">
                            <div class="d-flex align-items-center">
                                <div class="avatar-40 rounded-pill bg-soft-secundary p-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-calendar-x" viewBox="0 0 16 16">
                                        <path d="M6.146 7.146a.5.5 0 0 1 .708 0L8 8.293l1.146-1.147a.5.5 0 1 1 .708.708L8.707 9l1.147 1.146a.5.5 0 0 1-.708.708L8 9.707l-1.146 1.147a.5.5 0 0 1-.708-.708L7.293 9 6.146 7.854a.5.5 0 0 1 0-.708z"/>
                                        <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                                      </svg>
                                </div>
                                <div class="ms-3 w-100">
                                    <h6 class="mb-0 ">Presença cancelada no evento</h6>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <small
                                            class="float-right font-size-12">{{ datarecente($notification->created_at) }}</small>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endif
                    @if ($notification->type == 'App\Notifications\AlterarSenha')
                        <a href="#" class="iq-sub-card">
                            <div class="d-flex align-items-center">
                                <div class="avatar-40 rounded-pill bg-soft-secundary p-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-key" viewBox="0 0 16 16">
                                        <path d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8zm4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5z"/>
                                        <path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                                      </svg>
                                </div>
                                <div class="ms-3 w-100">
                                    <h6 class="mb-0 ">Sua senha foi alterada</h6>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <small
                                            class="float-right font-size-12">{{ datarecente($notification->created_at) }}</small>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endif
                    @if ($notification->type == 'App\Notifications\DadosPessoas')
                        <a href="#" class="iq-sub-card">
                            <div class="d-flex align-items-center">
                                <div class="avatar-40 rounded-pill bg-soft-secundary p-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-person-check" viewBox="0 0 16 16">
                                        <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                                        <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                                      </svg>
                                </div>
                                <div class="ms-3 w-100">
                                    <h6 class="mb-0 ">Seus dados pessoas foram atualizados.</h6>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <small
                                            class="float-right font-size-12">{{ datarecente($notification->created_at) }}</small>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endif
                @endforeach
                @if (auth()->user()->unreadNotifications()->count() == 0)
                <a href="#" class="iq-sub-card">
                    <div class="d-flex align-items-center">
                        <div class="avatar-40 rounded-pill bg-soft-secundary p-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                              </svg>
                        </div>
                        <div class="ms-3 w-100">
                            <h6 class="mb-0 ">Por enquanto sem novidade para você.</h6>
                            <div class="d-flex justify-content-between align-items-center">
                            </div>
                        </div>
                    </div>
                </a>
                @endif

                <div class="dropdown-footer text-center">
                    <a href="{{ route('indexNotification') }}">Ver todas <i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</li>
