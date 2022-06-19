<nav id="navbar_main" class="mobile-offcanvas nav navbar navbar-expand-xl hover-nav horizontal-nav mx-md-auto">
   <div class="container-fluid">
      <div class="offcanvas-header">
         <div class="navbar-brand">
            <svg width="42px" height="42px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 504 504"
                style="enable-background:new 0 0 504 504;" xml:space="preserve">
                <circle style="fill:#3a57e8;" cx="252" cy="252" r="252" />
                <polygon style="fill:#FFFFFF;" points="283.6,94.8 263.2,94.8 263.2,75.2 240.8,75.2 240.8,94.8 220.4,94.8 220.4,117.2
     240.8,117.2 240.8,151.2 263.2,151.2 263.2,117.2 283.6,117.2 " />
                <polygon style="fill:#6c757d;" points="361.6,408.8 142.4,408.8 142.4,264.4 252,165.2 361.6,264.4 " />
                <path style="fill:#FFFFFF;"
                    d="M252,299.2c-21.6,0-39.2,15.2-39.2,33.6v76h78.4v-76C291.2,314,273.6,299.2,252,299.2z" />
                <path style="fill:#FFFFFF;" d="M252,220.4c6.8-8.4,16-10,22.8-7.6c16.4,6,20,29.2,6,44c-28.8,30-28.8,30-28.8,30s0,0-28.8-30
     c-14-14.4-10-37.6,6-44C236,210.4,245.2,212.4,252,220.4z" />
                <polygon style="fill:#324A5E;"
                    points="384.4,287.2 252,166.8 119.6,287.2 104.8,270.8 252,136.8 399.2,270.8 " />
            </svg>
            <h4 class="logo-title">{{env('APP_NAME')}}</h4>
         </div>
         <button class="btn-close float-end"></button>
      </div>
      <ul class="navbar-nav">
         <li class="nav-item"><a class="nav-link {{ activeRoute(route('account.index')) }}" href="{{route('account.index')}}"> Contas </a></li>
         @if(Auth::user()->isAdmin() == true)
         <li class="nav-item"><a class="nav-link {{ activeRoute(route('license.index')) }}" href="{{route('license.index')}}"> Licenças </a></li>
         @endif
         @if (Auth::user()->menuroles == 'admin')
         <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
            role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Admin
        </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="{{ url('users') }}">Usuários</a></li>
                <li><a class="dropdown-item" href="{{ url('integrador') }}">Integradores</a></li>
                <li><a class="dropdown-item" href="{{ url('transactions') }}">Transações</a></li>
                <li><a class="dropdown-item" href="{{ route('blog.post') }}">Add Post</a></li>
                <li><a class="dropdown-item" href="{{ route('bread.index') }}">Bread</a></li>
                <li><a class="dropdown-item" href="{{ route('mail.index') }}">Mail</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="{{ url('log') }}">Logs</a></li>
                <li><a class="dropdown-item" href="{{ url('/clear-cache-all-057878545112') }}">Limpar Cache</a></li>
            </ul>
        </li>
        @endif
      </ul>
   </div> <!-- container-fluid.// -->
</nav>
