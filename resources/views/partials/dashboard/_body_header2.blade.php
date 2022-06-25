<nav class="nav navbar navbar-expand-lg navbar-light iq-navbar">
    <div class="container-fluid navbar-inner">
        <button data-trigger="navbar_main" class="d-lg-none btn btn-primary rounded-pill p-1 pt-0" type="button">
            <svg width="20px" height="20px" viewBox="0 0 24 24">
                <path fill="currentColor" d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z">
                </path>
            </svg>
        </button>
        <a href="{{ url('account') }}" class="navbar-brand col-md-2 col-lg-3">
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
        @include('partials.dashboard.horizontal-nav')
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                                        <a class="p-0" href="/greeting/en"><img
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

                <li class="nav-item dropdown">
                    <a class="nav-link py-0 d-flex align-items-center" href="#" id="navbarDropdown"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        @if (empty(auth()->user()->profile_image))
                            <img src="{{ asset('images/avatars/01.png') }}" alt="User-Profile"
                                class="img-fluid avatar avatar-50 avatar-rounded">
                        @else
                            <img src="{{ stream_get_contents(Auth()->user()->image) }}" alt="User-Profile"
                                class="img-fluid avatar avatar-50 avatar-rounded">
                        @endif

                        <div class="caption ms-3 ">
                            <h6 class="mb-0 caption-title">{{ auth()->user()->name ?? 'Austin Robertson' }}</h6>
                            <p class="mb-0 caption-sub-title"></p>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
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
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
