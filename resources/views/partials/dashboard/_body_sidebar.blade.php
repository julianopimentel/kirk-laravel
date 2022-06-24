<aside class="sidebar sidebar-default navs-rounded-all sidebar-dark" id="first-tour" data-toggle="main-sidebar" data-sidebar="responsive">
    <div class="sidebar-header d-flex align-items-center justify-content-start">
        <a href="{{ route('dashboard') }}" class="navbar-brand">
            <svg width="32px" height="32px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
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
            <h4 class="logo-title d-none d-sm-block">{{ env('APP_NAME') }}</h4>
        </a>
        <div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
            <i class="icon">
                <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.25 12.2744L19.25 12.2744" stroke="currentColor" stroke-width="1.5"
                        stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M10.2998 18.2988L4.2498 12.2748L10.2998 6.24976" stroke="currentColor" stroke-width="1.5"
                        stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </i>
        </div>
    </div>
    <div class="sidebar-body pt-0 data-scrollbar">
        <div class="sidebar-list" id="sidebar">
            @include('partials.dashboard.vertical-nav')
        </div>
    </div>
    <div class="sidebar-footer"></div>
</aside>
