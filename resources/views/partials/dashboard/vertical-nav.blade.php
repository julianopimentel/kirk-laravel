<ul class="navbar-nav iq-main-menu" id="sidebar">

    <!-- Titulo do menu
    <li class="nav-item static-item">
        <a class="nav-link static-item disabled" href="#" tabindex="-1">
            <span class="default-icon">Home</span>
            <span class="mini-icon">-</span>
        </a>
    </li>
    -->
    <li class="nav-item">
        <a class="nav-link {{ activeRoute(route('home.index')) }}" aria-current="page"
            href="{{ route('home.index') }}">
            <i class="icon">
                <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                            <path d="M9.13478 20.7733V17.7156C9.13478 16.9351 9.77217 16.3023 10.5584 16.3023H13.4326C13.8102 16.3023 14.1723 16.4512 14.4393 16.7163C14.7063 16.9813 14.8563 17.3408 14.8563 17.7156V20.7733C14.8539 21.0978 14.9821 21.4099 15.2124 21.6402C15.4427 21.8705 15.7561 22 16.0829 22H18.0438C18.9596 22.0023 19.8388 21.6428 20.4872 21.0008C21.1356 20.3588 21.5 19.487 21.5 18.5778V9.86686C21.5 9.13246 21.1721 8.43584 20.6046 7.96467L13.934 2.67587C12.7737 1.74856 11.1111 1.7785 9.98539 2.74698L3.46701 7.96467C2.87274 8.42195 2.51755 9.12064 2.5 9.86686V18.5689C2.5 20.4639 4.04738 22 5.95617 22H7.87229C8.55123 22 9.103 21.4562 9.10792 20.7822L9.13478 20.7733Z" fill="currentColor"></path>                            </svg>                        
            </i>
            <span class="item-name">{{ __('layout.home') }}</span>
        </a>
    </li>
    @if ($appPermissao->home_timeline == true)
    <li class="nav-item">
        <a class="nav-link {{ activeRoute(route('timeline.index')) }}" aria-current="page"
            href="{{ route('timeline.index') }}">
            <i class="icon">
                <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.9488 14.54C8.49884 14.54 5.58789 15.1038 5.58789 17.2795C5.58789 19.4562 8.51765 20.0001 11.9488 20.0001C15.3988 20.0001 18.3098 19.4364 18.3098 17.2606C18.3098 15.084 15.38 14.54 11.9488 14.54Z" fill="currentColor"></path>
                    <path opacity="0.4" d="M11.949 12.467C14.2851 12.467 16.1583 10.5831 16.1583 8.23351C16.1583 5.88306 14.2851 4 11.949 4C9.61293 4 7.73975 5.88306 7.73975 8.23351C7.73975 10.5831 9.61293 12.467 11.949 12.467Z" fill="currentColor"></path>
                    <path opacity="0.4" d="M21.0881 9.21923C21.6925 6.84176 19.9205 4.70654 17.664 4.70654C17.4187 4.70654 17.1841 4.73356 16.9549 4.77949C16.9244 4.78669 16.8904 4.802 16.8725 4.82902C16.8519 4.86324 16.8671 4.90917 16.8895 4.93889C17.5673 5.89528 17.9568 7.0597 17.9568 8.30967C17.9568 9.50741 17.5996 10.6241 16.9728 11.5508C16.9083 11.6462 16.9656 11.775 17.0793 11.7948C17.2369 11.8227 17.3981 11.8371 17.5629 11.8416C19.2059 11.8849 20.6807 10.8213 21.0881 9.21923Z" fill="currentColor"></path>
                    <path d="M22.8094 14.817C22.5086 14.1722 21.7824 13.73 20.6783 13.513C20.1572 13.3851 18.747 13.205 17.4352 13.2293C17.4155 13.232 17.4048 13.2455 17.403 13.2545C17.4003 13.2671 17.4057 13.2887 17.4316 13.3022C18.0378 13.6039 20.3811 14.916 20.0865 17.6834C20.074 17.8032 20.1698 17.9068 20.2888 17.8888C20.8655 17.8059 22.3492 17.4853 22.8094 16.4866C23.0637 15.9589 23.0637 15.3456 22.8094 14.817Z" fill="currentColor"></path>
                    <path opacity="0.4" d="M7.04459 4.77973C6.81626 4.7329 6.58077 4.70679 6.33543 4.70679C4.07901 4.70679 2.30701 6.84201 2.9123 9.21947C3.31882 10.8216 4.79355 11.8851 6.43661 11.8419C6.60136 11.8374 6.76343 11.8221 6.92013 11.7951C7.03384 11.7753 7.09115 11.6465 7.02668 11.551C6.3999 10.6234 6.04263 9.50765 6.04263 8.30991C6.04263 7.05904 6.43303 5.89462 7.11085 4.93913C7.13234 4.90941 7.14845 4.86348 7.12696 4.82926C7.10906 4.80135 7.07593 4.78694 7.04459 4.77973Z" fill="currentColor"></path>
                    <path d="M3.32156 13.5127C2.21752 13.7297 1.49225 14.1719 1.19139 14.8167C0.936203 15.3453 0.936203 15.9586 1.19139 16.4872C1.65163 17.4851 3.13531 17.8066 3.71195 17.8885C3.83104 17.9065 3.92595 17.8038 3.91342 17.6832C3.61883 14.9167 5.9621 13.6046 6.56918 13.3029C6.59425 13.2885 6.59962 13.2677 6.59694 13.2542C6.59515 13.2452 6.5853 13.2317 6.5656 13.2299C5.25294 13.2047 3.84358 13.3848 3.32156 13.5127Z" fill="currentColor"></path>
                </svg>
                        </i>
            <span class="item-name">{{ __('layout.timeline') }}</span>
        </a>
    </li>
    @endif
    @if ($appPermissao->home_cadastro_visitante == true)
    <li class="nav-item">
        <a class="nav-link {{ activeRoute(route('peoplevisit.create')) }}" aria-current="page"
            href="{{ route('peoplevisit.create') }}">
            <i class="icon">
                <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M9.5 12.5537C12.2546 12.5537 14.4626 10.3171 14.4626 7.52684C14.4626 4.73663 12.2546 2.5 9.5 2.5C6.74543 2.5 4.53737 4.73663 4.53737 7.52684C4.53737 10.3171 6.74543 12.5537 9.5 12.5537ZM9.5 15.0152C5.45422 15.0152 2 15.6621 2 18.2464C2 20.8298 5.4332 21.5 9.5 21.5C13.5448 21.5 17 20.8531 17 18.2687C17 15.6844 13.5668 15.0152 9.5 15.0152ZM19.8979 9.58786H21.101C21.5962 9.58786 22 9.99731 22 10.4995C22 11.0016 21.5962 11.4111 21.101 11.4111H19.8979V12.5884C19.8979 13.0906 19.4952 13.5 18.999 13.5C18.5038 13.5 18.1 13.0906 18.1 12.5884V11.4111H16.899C16.4027 11.4111 16 11.0016 16 10.4995C16 9.99731 16.4027 9.58786 16.899 9.58786H18.1V8.41162C18.1 7.90945 18.5038 7.5 18.999 7.5C19.4952 7.5 19.8979 7.90945 19.8979 8.41162V9.58786Z"
                        fill="currentColor"></path>
                </svg>
            </i>
            <span class="item-name"> {{ __('layout.visit') }}</span>
        </a>
    </li>
    @endif
    @if ($appPermissao->home_financeiro_valores == true)
    <li class="nav-item">
        <a class="nav-link {{ activeRoute(route('indexDizimos')) }}" aria-current="page"
            href="{{ route('indexDizimos') }}">
            <i class="icon">
                <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                            <path fill-rule="evenodd" clip-rule="evenodd" d="M17.7689 8.3818H22C22 4.98459 19.9644 3 16.5156 3H7.48444C4.03556 3 2 4.98459 2 8.33847V15.6615C2 19.0154 4.03556 21 7.48444 21H16.5156C19.9644 21 22 19.0154 22 15.6615V15.3495H17.7689C15.8052 15.3495 14.2133 13.7975 14.2133 11.883C14.2133 9.96849 15.8052 8.41647 17.7689 8.41647V8.3818ZM17.7689 9.87241H21.2533C21.6657 9.87241 22 10.1983 22 10.6004V13.131C21.9952 13.5311 21.6637 13.8543 21.2533 13.8589H17.8489C16.8548 13.872 15.9855 13.2084 15.76 12.2643C15.6471 11.6783 15.8056 11.0736 16.1931 10.6122C16.5805 10.1509 17.1573 9.88007 17.7689 9.87241ZM17.92 12.533H18.2489C18.6711 12.533 19.0133 12.1993 19.0133 11.7877C19.0133 11.3761 18.6711 11.0424 18.2489 11.0424H17.92C17.7181 11.0401 17.5236 11.1166 17.38 11.255C17.2364 11.3934 17.1555 11.5821 17.1556 11.779C17.1555 12.1921 17.4964 12.5282 17.92 12.533ZM6.73778 8.3818H12.3822C12.8044 8.3818 13.1467 8.04812 13.1467 7.63649C13.1467 7.22487 12.8044 6.89119 12.3822 6.89119H6.73778C6.31903 6.89116 5.9782 7.2196 5.97333 7.62783C5.97331 8.04087 6.31415 8.37705 6.73778 8.3818Z" fill="currentColor"></path>                            </svg>                        
            </i>
            <span class="item-name">{{ __('layout.my_tithes') }}</span>
        </a>
    </li>
    @endif
    @if ($appPermissao->home_grupo == true)
    <li class="nav-item">
        <a class="nav-link {{ activeRoute(route('indexGrupos')) }}" aria-current="page"
            href="{{ route('indexGrupos') }}">
            <i class="icon">
                <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                            <path fill-rule="evenodd" clip-rule="evenodd" d="M15.85 2.50065C16.481 2.50065 17.111 2.58965 17.71 2.79065C21.401 3.99065 22.731 8.04065 21.62 11.5806C20.99 13.3896 19.96 15.0406 18.611 16.3896C16.68 18.2596 14.561 19.9196 12.28 21.3496L12.03 21.5006L11.77 21.3396C9.48102 19.9196 7.35002 18.2596 5.40102 16.3796C4.06102 15.0306 3.03002 13.3896 2.39002 11.5806C1.26002 8.04065 2.59002 3.99065 6.32102 2.76965C6.61102 2.66965 6.91002 2.59965 7.21002 2.56065H7.33002C7.61102 2.51965 7.89002 2.50065 8.17002 2.50065H8.28002C8.91002 2.51965 9.52002 2.62965 10.111 2.83065H10.17C10.21 2.84965 10.24 2.87065 10.26 2.88965C10.481 2.96065 10.69 3.04065 10.89 3.15065L11.27 3.32065C11.3618 3.36962 11.4649 3.44445 11.554 3.50912C11.6104 3.55009 11.6612 3.58699 11.7 3.61065C11.7163 3.62028 11.7329 3.62996 11.7496 3.63972C11.8354 3.68977 11.9247 3.74191 12 3.79965C13.111 2.95065 14.46 2.49065 15.85 2.50065ZM18.51 9.70065C18.92 9.68965 19.27 9.36065 19.3 8.93965V8.82065C19.33 7.41965 18.481 6.15065 17.19 5.66065C16.78 5.51965 16.33 5.74065 16.18 6.16065C16.04 6.58065 16.26 7.04065 16.68 7.18965C17.321 7.42965 17.75 8.06065 17.75 8.75965V8.79065C17.731 9.01965 17.8 9.24065 17.94 9.41065C18.08 9.58065 18.29 9.67965 18.51 9.70065Z" fill="currentColor"></path>                            </svg>                        
            </i>
            <span class="item-name">{{ __('layout.my_groups') }}</span>
        </a>
    </li>
    @endif
    @if ($appPermissao->home_oracao == true)
    <li class="nav-item">
        <a class="nav-link {{ activeRoute(route('indexOracao')) }}" aria-current="page"
            href="{{ route('indexOracao') }}">
            <i class="icon">
                <svg width="20px" height="20px" viewBox="0 -64 640 640" xmlns="http://www.w3.org/2000/svg"><path d="M204.8 230.4c-10.6-14.1-30.7-17-44.8-6.4-14.1 10.6-17 30.7-6.4 44.8l38.1 50.8c4.8 6.4 4.1 15.3-1.5 20.9l-12.8 12.8c-6.7 6.7-17.6 6.2-23.6-1.1L64 244.4V96c0-17.7-14.3-32-32-32S0 78.3 0 96v218.4c0 10.9 3.7 21.5 10.5 30l104.1 134.3c5 6.5 8.4 13.9 10.4 21.7 1.8 6.9 8.1 11.6 15.3 11.6H272c8.8 0 16-7.2 16-16V384c0-27.7-9-54.6-25.6-76.8l-57.6-76.8zM608 64c-17.7 0-32 14.3-32 32v148.4l-89.8 107.8c-6 7.2-17 7.7-23.6 1.1l-12.8-12.8c-5.6-5.6-6.3-14.5-1.5-20.9l38.1-50.8c10.6-14.1 7.7-34.2-6.4-44.8-14.1-10.6-34.2-7.7-44.8 6.4l-57.6 76.8C361 329.4 352 356.3 352 384v112c0 8.8 7.2 16 16 16h131.7c7.1 0 13.5-4.7 15.3-11.6 2-7.8 5.4-15.2 10.4-21.7l104.1-134.3c6.8-8.5 10.5-19.1 10.5-30V96c0-17.7-14.3-32-32-32z"fill="currentColor"></path></svg>      
                      </i>
            <span class="item-name">{{ __('layout.prayer') }}</span>
        </a>
    </li>
    @endif
    @if (($appPermissao->view_periodo or $appPermissao->view_dash or $appPermissao->view_detail or $appPermissao->view_resumo_financeiro) == true)
    <li class="nav-item">
        <a class="nav-link {{ activeRoute(route('dashboard')) }}" aria-current="page"
            href="{{ route('dashboard') }}">
            <i class="icon">
                <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12.3264 2.20966C12.4861 2.06632 12.6973 1.99119 12.9135 2.00082C17.4843 2.13765 21.3044 5.4558 21.9967 9.89063C22.0011 9.91711 22.0011 9.94411 21.9967 9.97059C22.0116 10.1804 21.9407 10.3874 21.7996 10.5458C21.6586 10.7043 21.459 10.801 21.2451 10.8147L13.5656 11.3211C13.3116 11.3436 13.0597 11.26 12.8718 11.0909C12.6839 10.9218 12.5774 10.6828 12.5785 10.4326L12.0623 2.88932V2.76493C12.0717 2.55278 12.1667 2.353 12.3264 2.20966ZM11.7997 13.2936L18.4558 12.8671L18.5011 12.8848C18.7869 12.8895 19.0591 13.0054 19.2579 13.207C19.4566 13.4087 19.5655 13.6795 19.5606 13.9599C19.2984 17.782 16.4962 20.9755 12.6828 21.7982C8.86938 22.621 4.96017 20.8754 3.08778 17.5139C2.53722 16.5457 2.1893 15.4794 2.06445 14.3775C2.01603 14.051 1.99483 13.7212 2.00106 13.3913C2.01368 9.32706 4.90728 5.81907 8.95607 4.9595C9.4462 4.86776 9.93762 5.11248 10.1515 5.55479C10.2047 5.63505 10.2473 5.72164 10.2782 5.81245C10.3541 6.98405 10.4329 8.14455 10.5113 9.30015C10.5732 10.2128 10.6349 11.1223 10.6948 12.0319C10.6917 12.2462 10.7254 12.4594 10.7944 12.6627C10.9569 13.0627 11.3614 13.3165 11.7997 13.2936Z" fill="currentColor"></path>                            </svg>                        
            </i>
            <span class="item-name"> {{ __('layout.dashboard') }}</span>
        </a>
    </li>
    @endif
    @if ($appPermissao->view_people == true)
    <li class="nav-item">
        <a class="nav-link {{ activeRoute(route('people.index')) }}" aria-current="page"
            href="{{ route('people.index') }}">
            <i class="icon">
                <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                            <path fill-rule="evenodd" clip-rule="evenodd" d="M17.294 7.29105C17.294 10.2281 14.9391 12.5831 12 12.5831C9.0619 12.5831 6.70601 10.2281 6.70601 7.29105C6.70601 4.35402 9.0619 2 12 2C14.9391 2 17.294 4.35402 17.294 7.29105ZM12 22C7.66237 22 4 21.295 4 18.575C4 15.8539 7.68538 15.1739 12 15.1739C16.3386 15.1739 20 15.8789 20 18.599C20 21.32 16.3146 22 12 22Z" fill="currentColor"></path>                            </svg>                        
            </i>
            <span class="item-name">{{ __('layout.people') }}</span>
        </a>
    </li>
    @endif
    @if ($appPermissao->view_group == true)
    <li class="nav-item">
        <a class="nav-link {{ activeRoute(route('group.index')) }}" aria-current="page"
            href="{{ route('group.index') }}">
            <i class="icon">
                <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                <path fill-rule="evenodd" clip-rule="evenodd" d="M14.2124 7.76241C14.2124 10.4062 12.0489 12.5248 9.34933 12.5248C6.6507 12.5248 4.48631 10.4062 4.48631 7.76241C4.48631 5.11865 6.6507 3 9.34933 3C12.0489 3 14.2124 5.11865 14.2124 7.76241ZM2 17.9174C2 15.47 5.38553 14.8577 9.34933 14.8577C13.3347 14.8577 16.6987 15.4911 16.6987 17.9404C16.6987 20.3877 13.3131 21 9.34933 21C5.364 21 2 20.3666 2 17.9174ZM16.1734 7.84875C16.1734 9.19506 15.7605 10.4513 15.0364 11.4948C14.9611 11.6021 15.0276 11.7468 15.1587 11.7698C15.3407 11.7995 15.5276 11.8177 15.7184 11.8216C17.6167 11.8704 19.3202 10.6736 19.7908 8.87118C20.4885 6.19676 18.4415 3.79543 15.8339 3.79543C15.5511 3.79543 15.2801 3.82418 15.0159 3.87688C14.9797 3.88454 14.9405 3.90179 14.921 3.93246C14.8955 3.97174 14.9141 4.02253 14.9396 4.05607C15.7233 5.13216 16.1734 6.44206 16.1734 7.84875ZM19.3173 13.7023C20.5932 13.9466 21.4317 14.444 21.7791 15.1694C22.0736 15.7635 22.0736 16.4534 21.7791 17.0475C21.2478 18.1705 19.5335 18.5318 18.8672 18.6247C18.7292 18.6439 18.6186 18.5289 18.6333 18.3928C18.9738 15.2805 16.2664 13.8048 15.5658 13.4656C15.5364 13.4493 15.5296 13.4263 15.5325 13.411C15.5345 13.4014 15.5472 13.3861 15.5697 13.3832C17.0854 13.3545 18.7155 13.5586 19.3173 13.7023Z" fill="currentColor"></path>                            </svg>                        
            </i>
            <span class="item-name">{{ __('layout.group') }}</span>
        </a>
    </li>
    @endif
    @if ($appPermissao->view_message == true)
    <li class="nav-item">
        <a class="nav-link {{ activeRoute(route('message.index')) }}" aria-current="page"
            href="{{ route('message.index') }}">
            <i class="icon">
                <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                            <path fill-rule="evenodd" clip-rule="evenodd" d="M2 12.015C2 6.74712 6.21 2 12.02 2C17.7 2 22 6.65699 22 11.985C22 18.1642 16.96 22 12 22C10.36 22 8.54 21.5593 7.08 20.698C6.57 20.3876 6.14 20.1572 5.59 20.3375L3.57 20.9384C3.06 21.0986 2.6 20.698 2.75 20.1572L3.42 17.9139C3.53 17.6034 3.51 17.2729 3.35 17.0125C2.49 15.4301 2 13.6975 2 12.015ZM10.7 12.015C10.7 12.7261 11.27 13.2969 11.98 13.307C12.69 13.307 13.26 12.7261 13.26 12.025C13.26 11.314 12.69 10.7431 11.98 10.7431C11.28 10.7331 10.7 11.314 10.7 12.015ZM15.31 12.025C15.31 12.7261 15.88 13.307 16.59 13.307C17.3 13.307 17.87 12.7261 17.87 12.025C17.87 11.314 17.3 10.7431 16.59 10.7431C15.88 10.7431 15.31 11.314 15.31 12.025ZM7.37 13.307C6.67 13.307 6.09 12.7261 6.09 12.025C6.09 11.314 6.66 10.7431 7.37 10.7431C8.08 10.7431 8.65 11.314 8.65 12.025C8.65 12.7261 8.08 13.2969 7.37 13.307Z" fill="currentColor"></path>                            </svg>                        
            </i>
            <span class="item-name">{{ __('layout.message') }}</span>
        </a>
    </li>
    @endif
    @if ($appPermissao->view_prayer == true)
    <li class="nav-item">
        <a class="nav-link {{ activeRoute(route('prayer.index')) }}" aria-current="page"
            href="{{ route('prayer.index') }}">
            <i class="icon">
                <svg width="20px" height="20px" viewBox="0 -64 640 640" xmlns="http://www.w3.org/2000/svg"><path d="M204.8 230.4c-10.6-14.1-30.7-17-44.8-6.4-14.1 10.6-17 30.7-6.4 44.8l38.1 50.8c4.8 6.4 4.1 15.3-1.5 20.9l-12.8 12.8c-6.7 6.7-17.6 6.2-23.6-1.1L64 244.4V96c0-17.7-14.3-32-32-32S0 78.3 0 96v218.4c0 10.9 3.7 21.5 10.5 30l104.1 134.3c5 6.5 8.4 13.9 10.4 21.7 1.8 6.9 8.1 11.6 15.3 11.6H272c8.8 0 16-7.2 16-16V384c0-27.7-9-54.6-25.6-76.8l-57.6-76.8zM608 64c-17.7 0-32 14.3-32 32v148.4l-89.8 107.8c-6 7.2-17 7.7-23.6 1.1l-12.8-12.8c-5.6-5.6-6.3-14.5-1.5-20.9l38.1-50.8c10.6-14.1 7.7-34.2-6.4-44.8-14.1-10.6-34.2-7.7-44.8 6.4l-57.6 76.8C361 329.4 352 356.3 352 384v112c0 8.8 7.2 16 16 16h131.7c7.1 0 13.5-4.7 15.3-11.6 2-7.8 5.4-15.2 10.4-21.7l104.1-134.3c6.8-8.5 10.5-19.1 10.5-30V96c0-17.7-14.3-32-32-32z"fill="currentColor"></path></svg>      
                      </i>
            <span class="item-name">{{ __('layout.prayers') }}</span>
        </a>
    </li>
    @endif
    @if ($appPermissao->view_calendar == true)
    <li class="nav-item">
        <a class="nav-link {{ activeRoute(route('calender.index')) }}" aria-current="page"
            href="{{ route('calender.index') }}">
            <i class="icon">
                            <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                            <path fill-rule="evenodd" clip-rule="evenodd" d="M16.4109 2.76862L16.4119 3.51824C19.1665 3.73413 20.9862 5.61119 20.9891 8.48975L21 16.9155C21.0039 20.054 19.0322 21.985 15.8718 21.99L8.15188 22C5.01119 22.004 3.01482 20.027 3.01087 16.8795L3.00001 8.55272C2.99606 5.65517 4.75153 3.78311 7.50617 3.53024L7.50518 2.78061C7.5042 2.34083 7.83001 2.01 8.26444 2.01C8.69886 2.009 9.02468 2.33883 9.02567 2.77861L9.02666 3.47826L14.8914 3.47027L14.8904 2.77062C14.8894 2.33084 15.2152 2.001 15.6497 2C16.0742 1.999 16.4099 2.32884 16.4109 2.76862ZM4.52148 8.86157L19.4696 8.84158V8.49175C19.4272 6.34283 18.349 5.21539 16.4138 5.04748L16.4148 5.81709C16.4148 6.24688 16.0801 6.5877 15.6556 6.5877C15.2212 6.5887 14.8943 6.24887 14.8943 5.81909L14.8934 5.0095L9.02863 5.01749L9.02962 5.82609C9.02962 6.25687 8.70479 6.5967 8.27036 6.5967C7.83594 6.5977 7.50913 6.25887 7.50913 5.82809L7.50815 5.05847C5.58286 5.25137 4.51753 6.38281 4.52049 8.55072L4.52148 8.86157ZM15.2399 13.4043V13.4153C15.2498 13.8751 15.625 14.2239 16.0801 14.2139C16.5244 14.2029 16.8789 13.8221 16.869 13.3623C16.8483 12.9225 16.4918 12.5637 16.0485 12.5647C15.5944 12.5747 15.2389 12.9445 15.2399 13.4043ZM16.0554 17.892C15.6013 17.882 15.235 17.5032 15.234 17.0435C15.2241 16.5837 15.5884 16.2029 16.0426 16.1919H16.0525C16.5165 16.1919 16.8927 16.5707 16.8927 17.0405C16.8937 17.5102 16.5185 17.891 16.0554 17.892ZM11.1721 13.4203C11.1919 13.8801 11.568 14.2389 12.0222 14.2189C12.4665 14.1979 12.821 13.8181 12.8012 13.3583C12.7903 12.9085 12.425 12.5587 11.9807 12.5597C11.5266 12.5797 11.1711 12.9605 11.1721 13.4203ZM12.0262 17.8471C11.572 17.8671 11.1968 17.5082 11.1761 17.0485C11.1761 16.5887 11.5305 16.2089 11.9847 16.1879C12.429 16.1869 12.7953 16.5367 12.8052 16.9855C12.8259 17.4463 12.4705 17.8261 12.0262 17.8471ZM7.10433 13.4553C7.12408 13.915 7.50025 14.2749 7.95442 14.2539C8.39872 14.2339 8.75317 13.8531 8.73243 13.3933C8.72256 12.9435 8.35725 12.5937 7.91196 12.5947C7.45779 12.6147 7.10334 12.9955 7.10433 13.4553ZM7.95837 17.8521C7.5042 17.8731 7.12901 17.5132 7.10828 17.0535C7.10729 16.5937 7.46273 16.2129 7.9169 16.1929C8.3612 16.1919 8.7275 16.5417 8.73737 16.9915C8.7581 17.4513 8.40365 17.8321 7.95837 17.8521Z" fill="currentColor"></path>                            </svg>                        
            </i>
            <span class="item-name">{{ __('layout.calender') }}</span>
        </a>
    </li>
    @endif
    @if ($appPermissao->view_media == true)
    <li class="nav-item">
        <a class="nav-link {{ activeRoute(route('media.folder.index')) }}" aria-current="page"
            href="{{ route('media.folder.index') }}">
            <i class="icon">
                            <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                            <path fill-rule="evenodd" clip-rule="evenodd" d="M7.63751 3.39549C5.06051 3.39549 3.39551 5.16249 3.39551 7.88849V16.1025C3.39551 16.8675 3.53751 17.5505 3.78051 18.1415C3.791 18.129 4.01986 17.8501 4.3184 17.4863C4.90188 16.7752 5.75156 15.7398 5.75751 15.7345C6.44951 14.9445 7.74851 13.7665 9.45351 14.4795C9.82712 14.6344 10.1592 14.8466 10.4649 15.042C10.4947 15.061 10.5242 15.0799 10.5535 15.0985C11.1265 15.4815 11.4635 15.6615 11.8135 15.6315C11.9585 15.6115 12.0945 15.5685 12.2235 15.4885C12.7101 15.1885 13.9718 13.4009 14.3496 12.8656C14.405 12.7871 14.4414 12.7355 14.4535 12.7195C15.5435 11.2995 17.2235 10.9195 18.6235 11.7595C18.8115 11.8715 20.1585 12.8125 20.6045 13.1905V7.88849C20.6045 5.16249 18.9395 3.39549 16.3535 3.39549H7.63751ZM16.3535 2.00049C19.7305 2.00049 21.9995 4.36249 21.9995 7.88849V16.1025C21.9995 16.1912 21.9902 16.2743 21.9809 16.3574C21.9744 16.4159 21.9678 16.4742 21.9645 16.5345C21.9624 16.5709 21.9613 16.6073 21.9603 16.6438C21.9589 16.6923 21.9575 16.7409 21.9535 16.7895C21.9515 16.8085 21.9478 16.8267 21.944 16.845C21.9403 16.8632 21.9365 16.8815 21.9345 16.9005C21.9015 17.2145 21.8505 17.5145 21.7795 17.8055C21.7627 17.8782 21.7433 17.9483 21.7238 18.0191L21.7195 18.0345C21.6395 18.3165 21.5455 18.5855 21.4325 18.8425C21.4127 18.8857 21.3918 18.9278 21.3709 18.9699C21.357 18.998 21.3431 19.0261 21.3295 19.0545C21.2075 19.2995 21.0755 19.5345 20.9225 19.7525C20.8942 19.7928 20.8641 19.8307 20.8339 19.8685C20.814 19.8936 20.794 19.9186 20.7745 19.9445C20.6155 20.1505 20.4495 20.3475 20.2615 20.5265C20.224 20.5622 20.1834 20.5948 20.1428 20.6275C20.1175 20.6479 20.0921 20.6683 20.0675 20.6895C19.8745 20.8555 19.6775 21.0145 19.4605 21.1505C19.4132 21.1802 19.3628 21.2052 19.3127 21.2301C19.2803 21.2462 19.2479 21.2622 19.2165 21.2795C18.9955 21.4015 18.7725 21.5205 18.5295 21.6125C18.4711 21.6347 18.4088 21.6508 18.3465 21.6669C18.3021 21.6783 18.2577 21.6898 18.2145 21.7035C18.1929 21.7102 18.1713 21.7169 18.1497 21.7236C17.9326 21.7912 17.7162 21.8585 17.4825 21.8985C17.3471 21.9222 17.2034 21.9313 17.0596 21.9405C16.9974 21.9444 16.9351 21.9484 16.8735 21.9535C16.8073 21.9584 16.7423 21.9664 16.6773 21.9744C16.5716 21.9874 16.4656 22.0005 16.3535 22.0005H7.63751C7.26151 22.0005 6.90251 21.9625 6.55551 21.9055C6.54251 21.9035 6.53051 21.9015 6.51851 21.8995C5.16551 21.6665 4.04251 21.0135 3.25551 20.0285C3.25005 20.0285 3.2479 20.0248 3.24504 20.0199C3.24319 20.0167 3.24105 20.013 3.23751 20.0095C2.44651 19.0135 1.99951 17.6745 1.99951 16.1025V7.88849C1.99951 4.36249 4.27051 2.00049 7.63751 2.00049H16.3535ZM11.0001 8.51505C11.0001 9.87 9.86639 11.0001 8.50496 11.0001C7.30825 11.0001 6.2879 10.1257 6.05922 8.99372C6.02143 8.82387 6.00011 8.64919 6.00011 8.46872C6.00011 7.10412 7.10864 6.00009 8.47879 6.00009C9.17647 6.00009 9.80825 6.29347 10.2608 6.76152C10.7152 7.21317 11.0001 7.83564 11.0001 8.51505Z" fill="currentColor"></path>                            </svg>                                    </i>
            <span class="item-name">{{ __('layout.documents') }}<span class="badge rounded-pill bg-info">Beta</span></span>
        </a>
    </li>
    @endif
    @if ($appPermissao->view_sermons == true)
    <li class="nav-item">
        <a class="nav-link {{ activeRoute(route('sermons.index')) }}" aria-current="page"
            href="{{ route('sermons.index') }}">
            <i class="icon">
                <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                            <path fill-rule="evenodd" clip-rule="evenodd" d="M6.11304 4.5H11.9051C14.3271 4.5 16.0181 6.16904 16.0181 8.56091V15.4391C16.0181 17.831 14.3271 19.5 11.9051 19.5H6.11304C3.69102 19.5 2 17.831 2 15.4391V8.56091C2 6.16904 3.69102 4.5 6.11304 4.5ZM19.958 6.87898C20.397 6.65563 20.912 6.67898 21.331 6.94294C21.75 7.20589 22 7.66274 22 8.16223V15.8384C22 16.3389 21.75 16.7947 21.331 17.0577C21.102 17.2008 20.846 17.2739 20.588 17.2739C20.373 17.2739 20.158 17.2231 19.957 17.1206L18.476 16.3734C17.928 16.0952 17.588 15.5369 17.588 14.9165V9.08305C17.588 8.46173 17.928 7.90335 18.476 7.62721L19.958 6.87898Z" fill="currentColor"></path>                            </svg>                        
            </i>
            <span class="item-name">{{ __('layout.sermons') }}</span>
        </a>
    </li>
    @endif
    @if ($appPermissao->view_financial == true)
    <li class="nav-item">
        <a class="nav-link {{ activeRoute(route('transaction.index')) }}" aria-current="page" href="{{ route('transaction.index') }}">
            <i class="icon">
                <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M21.9964 8.37513H17.7618C15.7911 8.37859 14.1947 9.93514 14.1911 11.8566C14.1884 13.7823 15.7867 15.3458 17.7618 15.3484H22V15.6543C22 19.0136 19.9636 21 16.5173 21H7.48356C4.03644 21 2 19.0136 2 15.6543V8.33786C2 4.97862 4.03644 3 7.48356 3H16.5138C19.96 3 21.9964 4.97862 21.9964 8.33786V8.37513ZM6.73956 8.36733H12.3796H12.3831H12.3902C12.8124 8.36559 13.1538 8.03019 13.152 7.61765C13.1502 7.20598 12.8053 6.87318 12.3831 6.87491H6.73956C6.32 6.87664 5.97956 7.20858 5.97778 7.61852C5.976 8.03019 6.31733 8.36559 6.73956 8.36733Z"
                        fill="currentColor"></path>
                    <path opacity="0.4"
                        d="M16.0374 12.2966C16.2465 13.2478 17.0805 13.917 18.0326 13.8996H21.2825C21.6787 13.8996 22 13.5715 22 13.166V10.6344C21.9991 10.2297 21.6787 9.90077 21.2825 9.8999H17.9561C16.8731 9.90338 15.9983 10.8024 16 11.9102C16 12.0398 16.0128 12.1695 16.0374 12.2966Z"
                        fill="currentColor"></path>
                    <circle cx="18" cy="11.8999" r="1" fill="currentColor"></circle>
                </svg>
            </i>
            <span class="item-name">{{ __('layout.financial') }}</span>
        </a>
    </li>
    @endif
    @if ($appPermissao->home_eventos == true)
    <li class="nav-item">
        <a class="nav-link {{ activeRoute(route('indexEventos')) }}" aria-current="page"
            href="{{ route('indexEventos') }}">
            <i class="icon">
                <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                            <path fill-rule="evenodd" clip-rule="evenodd" d="M19.761 12.001C19.761 12.8145 20.429 13.4764 21.25 13.4764C21.664 13.4764 22 13.8093 22 14.2195V16.8958C22 19.159 20.142 21 17.858 21H6.143C3.859 21 2 19.159 2 16.8958V14.2195C2 13.8093 2.336 13.4764 2.75 13.4764C3.572 13.4764 4.24 12.8145 4.24 12.001C4.24 11.2083 3.599 10.6118 2.75 10.6118C2.551 10.6118 2.361 10.5335 2.22 10.3938C2.079 10.2541 2 10.0648 2 9.86866L2.002 7.10514C2.002 4.84201 3.86 3 6.144 3H17.856C20.14 3 21.999 4.84201 21.999 7.10514L22 9.78245C22 9.97864 21.921 10.1689 21.781 10.3076C21.64 10.4473 21.45 10.5256 21.25 10.5256C20.429 10.5256 19.761 11.1875 19.761 12.001ZM14.252 12.648L15.431 11.5105C15.636 11.3143 15.707 11.025 15.618 10.7575C15.53 10.4899 15.3 10.2997 15.022 10.261L13.393 10.0252L12.664 8.5627C12.539 8.31102 12.285 8.15446 12.002 8.15347H12C11.718 8.15347 11.464 8.31003 11.337 8.56171L10.608 10.0252L8.982 10.26C8.701 10.2997 8.471 10.4899 8.382 10.7575C8.294 11.025 8.365 11.3143 8.569 11.5105L9.748 12.648L9.47 14.2562C9.422 14.5336 9.535 14.8091 9.765 14.9746C9.895 15.0667 10.046 15.1143 10.199 15.1143C10.316 15.1143 10.434 15.0855 10.542 15.0291L12 14.2701L13.455 15.0271C13.707 15.1608 14.006 15.14 14.235 14.9736C14.466 14.8091 14.579 14.5336 14.531 14.2562L14.252 12.648Z" fill="currentColor"></path>                            </svg>                        
            </i>
            <span class="item-name">{{ __('layout.events') }}</span>
        </a>
    </li>
    @endif
    @if ($appPermissao->home_dados == true)
    <li class="nav-item">
        <a class="nav-link {{ activeRoute(route('indexDados')) }}" aria-current="page"
            href="{{ route('indexDados') }}">
            <i class="icon">
                <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                            <path fill-rule="evenodd" clip-rule="evenodd" d="M17.5227 7.39601V8.92935C19.2451 9.46696 20.5 11.0261 20.5 12.8884V17.8253C20.5 20.1308 18.5886 22 16.2322 22H7.7688C5.41136 22 3.5 20.1308 3.5 17.8253V12.8884C3.5 11.0261 4.75595 9.46696 6.47729 8.92935V7.39601C6.48745 4.41479 8.95667 2 11.9848 2C15.0535 2 17.5227 4.41479 17.5227 7.39601ZM12.0051 3.73904C14.0678 3.73904 15.7445 5.37871 15.7445 7.39601V8.7137H8.25553V7.37613C8.26569 5.36878 9.94232 3.73904 12.0051 3.73904ZM12.8891 16.4549C12.8891 16.9419 12.4928 17.3294 11.9949 17.3294C11.5072 17.3294 11.1109 16.9419 11.1109 16.4549V14.2488C11.1109 13.7718 11.5072 13.3843 11.9949 13.3843C12.4928 13.3843 12.8891 13.7718 12.8891 14.2488V16.4549Z" fill="currentColor"></path>                            </svg>                                    </i>
            <span class="item-name">{{ __('layout.my_data') }}</span>
        </a>
    </li>
    @endif
    @if ($appPermissao->report_view == true)
    <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#sidebar-widget" role="button" aria-expanded="false"
            aria-controls="sidebar-widget">
            <i class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-graph-up" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M0 0h1v15h15v1H0V0Zm14.817 3.113a.5.5 0 0 1 .07.704l-4.5 5.5a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61 4.15-5.073a.5.5 0 0 1 .704-.07Z"/>
                  </svg>
            </i>
            <span class="item-name">{{ __('layout.report') }}</span>
            <i class="right-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </i>
        </a>
        <ul class="sub-nav collapse" id="sidebar-widget" data-bs-parent="#sidebar">
            <li class="nav-item">
                <a class="nav-link {{ activeRoute(route('people.Financial')) }}"
                    href="{{ route('people.Financial') }}">
                    <i class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                            <g>
                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                            </g>
                        </svg>
                    </i>
                    <i class="sidenav-mini-icon"> P </i>
                    <span class="item-name">{{ __('layout.report_people') }}</span>
                </a>
            </li>
            @if ($appSystem->geolocation == true)
            <li class="nav-item">
                <a class="nav-link {{ activeRoute(route('location.index')) }}"
                    href="{{ route('location.index') }}">
                    <i class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                            <g>
                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                            </g>
                        </svg>
                    </i>
                    <i class="sidenav-mini-icon"> L </i>
                    <span class="item-name">{{ __('layout.report_loc') }}</span>
                </a>
            </li>
            @endif
            <li class="nav-item">
                <a class="nav-link {{ activeRoute(route('group.Financial')) }}"
                    href="{{ route('group.Financial') }}">
                    <i class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                            <g>
                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                            </g>
                        </svg>
                    </i>
                    <i class="sidenav-mini-icon"> G </i>
                    <span class="item-name">{{ __('layout.report_groups') }}</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ activeRoute(route('financial.Financial')) }}"
                    href="{{ route('financial.Financial') }}">
                    <i class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                            <g>
                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                            </g>
                        </svg>
                    </i>
                    <i class="sidenav-mini-icon"> F </i>
                    <span class="item-name">{{ __('layout.report_financial') }}</span>
                </a>
            </li>
        </ul>
        @endif
    </li>
</ul>