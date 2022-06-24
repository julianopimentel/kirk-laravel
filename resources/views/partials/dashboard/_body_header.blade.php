<nav class="nav navbar navbar-expand-lg navbar-light iq-navbar">
    <div class="container-fluid navbar-inner">
        <a href="{{ route('home.index') }}" class="navbar-brand">
            <svg width="42px" height="42px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 504 504"
                style="enable-background:new 0 0 504 504;" xml:space="preserve">
                <circle style="fill:#3a57e8;" cx="252" cy="252" r="252" />
                <polygon style="fill:#FFFFFF;"
                    points="283.6,94.8 263.2,94.8 263.2,75.2 240.8,75.2 240.8,94.8 220.4,94.8 220.4,117.2
240.8,117.2 240.8,151.2 263.2,151.2 263.2,117.2 283.6,117.2 " />
                <polygon style="fill:#6c757d;" points="361.6,408.8 142.4,408.8 142.4,264.4 252,165.2 361.6,264.4 " />
                <path style="fill:#FFFFFF;"
                    d="M252,299.2c-21.6,0-39.2,15.2-39.2,33.6v76h78.4v-76C291.2,314,273.6,299.2,252,299.2z" />
                <path style="fill:#FFFFFF;"
                    d="M252,220.4c6.8-8.4,16-10,22.8-7.6c16.4,6,20,29.2,6,44c-28.8,30-28.8,30-28.8,30s0,0-28.8-30
c-14-14.4-10-37.6,6-44C236,210.4,245.2,212.4,252,220.4z" />
                <polygon style="fill:#324A5E;"
                    points="384.4,287.2 252,166.8 119.6,287.2 104.8,270.8 252,136.8 399.2,270.8 " />
            </svg>
            <h4 class="logo-title">{{ env('APP_NAME') }}</h4>
        </a>
        <div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
            <i class="icon">
                <svg width="20px" height="20px" viewBox="0 0 24 24">
                    <path fill="currentColor"
                        d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z" />
                </svg>
            </i>
        </div>
        <div class="input-group search-input">
            <span class="input-group-text" id="search-input">
                <svg width="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="11.7669" cy="11.7666" r="8.98856" stroke="currentColor" stroke-width="1.5"
                        stroke-linecap="round" stroke-linejoin="round"></circle>
                    <path d="M18.0186 18.4851L21.5426 22" stroke="currentColor" stroke-width="1.5"
                        stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </span>
            <input type="search" class="form-control" placeholder="Search...">
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            <span class="navbar-toggler-icon">
                <span class="navbar-toggler-bar bar1 mt-2"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
            </span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto  navbar-list mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a href="/greeting/pt" class="search-toggle nav-link" id="dropdownMenuButton2"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{ asset('images/Flag/flag.jpg') }}" class="img-fluid rounded-circle" alt="user"
                            style="height: 30px; min-width: 30px; width: 30px;">
                        <span class="bg-primary"></span>
                    </a>
                    <div class="sub-drop dropdown-menu dropdown-menu-end p-0" aria-labelledby="dropdownMenuButton2">
                        <div class="card shadow-none m-0 border-0">
                            <div class=" p-0 ">
                                <ul class="list-group list-group-flush">
                                    <li class="iq-sub-card list-group-item">
                                        <a class="p-0" href="/greeting/{en}"><img
                                                src="{{ asset('images/Flag/flag-01.png') }}" alt="img-flaf"
                                                class="img-fluid me-2"
                                                style="width: 15px;height: 15px;min-width: 15px;" />Spanish
                                        </a>
                                    </li>
                                    <li class="iq-sub-card list-group-item">

                                        <a class="p-0" href="/greeting/es"><img
                                                src="{{ asset('images/Flag/flag-03.png') }}" alt="img-flaf"
                                                class="img-fluid me-2"
                                                style="width: 15px;height: 15px;min-width: 15px;" />Spanish
                                        </a>
                                    </li>
                                    <!-- inativo a lang <li class="iq-sub-card list-group-item">
                                       <a class="p-0" href="/greeting/sp"><img
                                                src="{{ asset('images/Flag/flag-04.png') }}" alt="img-flaf"
                                                class="img-fluid me-2"
                                                style="width: 15px;height: 15px;min-width: 15px;" />Italian</a></li>
                                    <li class="iq-sub-card list-group-item"><a class="p-0" href="#"><img
                                                src="{{ asset('images/Flag/flag-02.png') }}" alt="img-flaf"
                                                class="img-fluid me-2"
                                                style="width: 15px;height: 15px;min-width: 15px;" />French</a></li>
                                    <li class="iq-sub-card list-group-item"><a class="p-0" href="/greeting/fr"><img
                                                src="{{ asset('images/Flag/flag-05.png') }}" alt="img-flaf"
                                                class="img-fluid me-2"
                                                style="width: 15px;height: 15px;min-width: 15px;" />German</a></li>
                                    <li class="iq-sub-card list-group-item"><a class="p-0" href="/greeting/ge"><img
                                                src="{{ asset('images/Flag/flag-06.png') }}" alt="img-flaf"
                                                class="img-fluid me-2"
                                                style="width: 15px;height: 15px;min-width: 15px;" />Japanese</a></li>
                                    -->

                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
                @include('layouts.components.notification')

                <li class="nav-item dropdown">
                    <a class="nav-link py-0 d-flex align-items-center" href="#" id="navbarDropdown"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">

                        @if (empty(auth()->user()->profile_image))
                            <img src="{{ asset('images/avatars/01.png') }}" alt="User-Profile"
                                class="theme-color-default-img img-fluid avatar avatar-50 avatar-rounded">
                        @else
                            <img src="{{ stream_get_contents(Auth()->user()->image) }}" alt="User-Profile"
                                class="theme-color-default-img img-fluid avatar avatar-50 avatar-rounded">
                        @endif

                        <div class="caption ms-3 d-none d-md-block ">
                            <h6 class="mb-0 caption-title">
                                @if (session('key') and Auth::user()->people == !null)
                                    {{ ucwords(strtolower(auth()->user()->people->name)) }}
                                @else
                                    {{ ucwords(strtolower(auth()->user()->full_name ?? 'Ajustar nome')) }}
                                @endif
                            </h6>
                            <p class="mb-0 caption-sub-title text-capitalize">
                                {{ str_replace('_', ' ', $appPermissao->name) ?? 'User' }}
                            </p>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('profile.index') }}">
                                <svg width="16" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M17.294 7.29105C17.294 10.2281 14.9391 12.5831 12 12.5831C9.0619 12.5831 6.70601 10.2281 6.70601 7.29105C6.70601 4.35402 9.0619 2 12 2C14.9391 2 17.294 4.35402 17.294 7.29105ZM12 22C7.66237 22 4 21.295 4 18.575C4 15.8539 7.68538 15.1739 12 15.1739C16.3386 15.1739 20 15.8789 20 18.599C20 21.32 16.3146 22 12 22Z"
                                        fill="currentColor"></path>
                                </svg>
                                {{ __('layout.profile') }}</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('password.index') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-key-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2zM2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                                </svg>

                                {{ __('layout.change_password') }}</a>
                        </li>
                        <li><a class="dropdown-item" href="{{ route('auth.userprivacysetting') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-shield-fill-check" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M8 0c-.69 0-1.843.265-2.928.56-1.11.3-2.229.655-2.887.87a1.54 1.54 0 0 0-1.044 1.262c-.596 4.477.787 7.795 2.465 9.99a11.777 11.777 0 0 0 2.517 2.453c.386.273.744.482 1.048.625.28.132.581.24.829.24s.548-.108.829-.24a7.159 7.159 0 0 0 1.048-.625 11.775 11.775 0 0 0 2.517-2.453c1.678-2.195 3.061-5.513 2.465-9.99a1.541 1.541 0 0 0-1.044-1.263 62.467 62.467 0 0 0-2.887-.87C9.843.266 8.69 0 8 0zm2.146 5.146a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 7.793l2.646-2.647z" />
                                </svg>
                                Privacy
                                Setting</a>
                        </li>
                        @if (Auth::user()->isAdmin() == true)
                            <li>
                                <a class="dropdown-item" href="{{ route('license.index') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-credit-card-2-back-fill"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v5H0V4zm11.5 1a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h2a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-2zM0 11v1a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-1H0z" />
                                    </svg>
                                    {{ __('layout.payments') }}</a>
                            </li>
                        @endif
                        @if (Auth::user()->menuroles == 'admin')
                            <li>
                                <a class="dropdown-item" href="{{ route('logs.index') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-bug" viewBox="0 0 16 16">
                                        <path
                                            d="M4.355.522a.5.5 0 0 1 .623.333l.291.956A4.979 4.979 0 0 1 8 1c1.007 0 1.946.298 2.731.811l.29-.956a.5.5 0 1 1 .957.29l-.41 1.352A4.985 4.985 0 0 1 13 6h.5a.5.5 0 0 0 .5-.5V5a.5.5 0 0 1 1 0v.5A1.5 1.5 0 0 1 13.5 7H13v1h1.5a.5.5 0 0 1 0 1H13v1h.5a1.5 1.5 0 0 1 1.5 1.5v.5a.5.5 0 1 1-1 0v-.5a.5.5 0 0 0-.5-.5H13a5 5 0 0 1-10 0h-.5a.5.5 0 0 0-.5.5v.5a.5.5 0 1 1-1 0v-.5A1.5 1.5 0 0 1 2.5 10H3V9H1.5a.5.5 0 0 1 0-1H3V7h-.5A1.5 1.5 0 0 1 1 5.5V5a.5.5 0 0 1 1 0v.5a.5.5 0 0 0 .5.5H3c0-1.364.547-2.601 1.432-3.503l-.41-1.352a.5.5 0 0 1 .333-.623zM4 7v4a4 4 0 0 0 3.5 3.97V7H4zm4.5 0v7.97A4 4 0 0 0 12 11V7H8.5zM12 6a3.989 3.989 0 0 0-1.334-2.982A3.983 3.983 0 0 0 8 2a3.983 3.983 0 0 0-2.667 1.018A3.989 3.989 0 0 0 4 6h8z" />
                                    </svg>
                                    {{ __('layout.aud') }}</a>
                            </li>
                        @endif
                        @if (($appPermissao->settings_general or $appPermissao->settings_email or $appPermissao->settings_meta or $appPermissao->settings_social or $appPermissao->settings_roles) == true)
                            <a class="dropdown-item" href="{{ route('settings') }}">
                                <svg width="16" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M20.4023 13.58C20.76 13.77 21.036 14.07 21.2301 14.37C21.6083 14.99 21.5776 15.75 21.2097 16.42L20.4943 17.62C20.1162 18.26 19.411 18.66 18.6855 18.66C18.3278 18.66 17.9292 18.56 17.6022 18.36C17.3365 18.19 17.0299 18.13 16.7029 18.13C15.6911 18.13 14.8429 18.96 14.8122 19.95C14.8122 21.1 13.872 22 12.6968 22H11.3069C10.1215 22 9.18125 21.1 9.18125 19.95C9.16081 18.96 8.31259 18.13 7.30085 18.13C6.96361 18.13 6.65702 18.19 6.40153 18.36C6.0745 18.56 5.66572 18.66 5.31825 18.66C4.58245 18.66 3.87729 18.26 3.49917 17.62L2.79402 16.42C2.4159 15.77 2.39546 14.99 2.77358 14.37C2.93709 14.07 3.24368 13.77 3.59115 13.58C3.87729 13.44 4.06125 13.21 4.23498 12.94C4.74596 12.08 4.43937 10.95 3.57071 10.44C2.55897 9.87 2.23194 8.6 2.81446 7.61L3.49917 6.43C4.09191 5.44 5.35913 5.09 6.38109 5.67C7.27019 6.15 8.425 5.83 8.9462 4.98C9.10972 4.7 9.20169 4.4 9.18125 4.1C9.16081 3.71 9.27323 3.34 9.4674 3.04C9.84553 2.42 10.5302 2.02 11.2763 2H12.7172C13.4735 2 14.1582 2.42 14.5363 3.04C14.7203 3.34 14.8429 3.71 14.8122 4.1C14.7918 4.4 14.8838 4.7 15.0473 4.98C15.5685 5.83 16.7233 6.15 17.6226 5.67C18.6344 5.09 19.9118 5.44 20.4943 6.43L21.179 7.61C21.7718 8.6 21.4447 9.87 20.4228 10.44C19.5541 10.95 19.2475 12.08 19.7687 12.94C19.9322 13.21 20.1162 13.44 20.4023 13.58ZM9.10972 12.01C9.10972 13.58 10.4076 14.83 12.0121 14.83C13.6165 14.83 14.8838 13.58 14.8838 12.01C14.8838 10.44 13.6165 9.18 12.0121 9.18C10.4076 9.18 9.10972 10.44 9.10972 12.01Z"
                                        fill="currentColor"></path>
                                </svg>
                                {{ __('layout.configuration') }}</a>
                        @endif
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        @if (Auth::user()->getListContas()->count() >
                            1 or
                            Auth::user()->isAdmin() == true)
                            <a class="dropdown-item" href="{{ route('account.index') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-stack" viewBox="0 0 16 16">
                                    <path
                                        d="m14.12 10.163 1.715.858c.22.11.22.424 0 .534L8.267 15.34a.598.598 0 0 1-.534 0L.165 11.555a.299.299 0 0 1 0-.534l1.716-.858 5.317 2.659c.505.252 1.1.252 1.604 0l5.317-2.66zM7.733.063a.598.598 0 0 1 .534 0l7.568 3.784a.3.3 0 0 1 0 .535L8.267 8.165a.598.598 0 0 1-.534 0L.165 4.382a.299.299 0 0 1 0-.535L7.733.063z" />
                                    <path
                                        d="m14.12 6.576 1.715.858c.22.11.22.424 0 .534l-7.568 3.784a.598.598 0 0 1-.534 0L.165 7.968a.299.299 0 0 1 0-.534l1.716-.858 5.317 2.659c.505.252 1.1.252 1.604 0l5.317-2.659z" />
                                </svg>
                                {{ __('layout.select_account') }}</a>
                        @endif
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="javascript:void(0)" class="dropdown-item"
                                    onclick="event.preventDefault();
              this.closest('form').submit();"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-door-closed-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M12 1a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V2a1 1 0 0 1 1-1h8zm-2 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                                    </svg>
                                    {{ __('Log out') }}
                                </a>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
