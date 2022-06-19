<x-guest-layout>
   <section class="login-content">
      <div class="row m-0 align-items-center bg-white vh-100">
         <div class="col-md-6">
            <div class="row justify-content-center">
               <div class="col-md-10">
                  <div class="card card-transparent shadow-none d-flex justify-content-center mb-0 auth-card">
                     <div class="card-body">
                        <a href="{{route('dashboard')}}" class="navbar-brand d-flex align-items-center mb-3">
                           <svg width="32px" height="32px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
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
                           <h4 class="logo-title ms-3">{{env('APP_NAME')}}</h4>
                        </a>
                        <h2 class="mb-2 text-center"><br></h2>
                        <p class="text-center"><br></p>
                        <x-auth-session-status class="mb-4" :status="session('status')" />

                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        <form method="POST" action="{{ route('login') }}" data-toggle="validator">
                            {{csrf_field()}}
                           <div class="row">
                              <div class="col-lg-12">
                                 <div class="form-group">
                                    <label for="email" class="form-label">Email</label>
                                    <input id="email" type="email" name="email"  value="{{env('IS_DEMO') ? 'admin@example.com' : old('email')}}"   class="form-control"  placeholder="admin@example.com" required autofocus>
                                 </div>
                              </div>
                              <div class="col-lg-12">
                                 <div class="form-group">
                                    <label for="password" class="form-label">Password</label>
                                    <input class="form-control" type="password" placeholder="********"  name="password" value="{{ env('IS_DEMO') ? 'password' : '' }}" required autocomplete="current-password">
                                 </div>
                              </div>
                              <div class="col-lg-6">
                                 <div class="form-check mb-3">
                                    <input type="checkbox" class="form-check-input" id="customCheck1">
                                    <!-- <input type="checkbox" class="custom-control-input" id="customCheck1"> -->
                                    <label class="form-check-label" for="customCheck1">Remember Me</label>
                                 </div>
                              </div>
                              <div class="col-lg-6">
                                 <a href="{{route('auth.recoverpw')}}"  class="float-end">{{ __('auth.forgot_password') }}</a>
                              </div>
                           </div>
                           <div class="d-flex justify-content-center">
                              <button type="submit" class="btn btn-primary">{{ __('auth.login') }}</button>
                           </div>
                           <p class="text-center my-3">{{ __('auth.register_outher') }}</p>
                           <div class="d-flex justify-content-center">
                              <ul class="list-group list-group-horizontal list-group-flush">
                                 <li class="list-group-item border-0 pb-0">
                                    <a href="#"><img src="{{asset('images/brands/fb.svg')}}" alt="fb"></a>
                                 </li>
                                 <li class="list-group-item border-0 pb-0">
                                    <a href="#"><img src="{{asset('images/brands/gm.svg')}}" alt="gm"></a>
                                 </li>
                                 <li class="list-group-item border-0 pb-0">
                                    <a href="#"><img src="{{asset('images/brands/im.svg')}}" alt="im"></a>
                                 </li>
                                 <li class="list-group-item border-0 pb-0">
                                    <a href="#"><img src="{{asset('images/brands/li.svg')}}" alt="li"></a>
                                 </li>
                              </ul>
                           </div>
                           <p class="mt-3 text-center">
                              {{ __('auth.register_') }} <a href="{{route('auth.signup')}}" class="text-underline">{{ __('auth.register_up') }}</a>
                           </p>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
            <div class="sign-bg">
               <!-- fundo do logo
               <svg width="280" height="230" viewBox="0 0 431 398" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g opacity="0.05">
                  <rect x="-157.085" y="193.773" width="543" height="77.5714" rx="38.7857" transform="rotate(-45 -157.085 193.773)" fill="#3B8AFF"/>
                  <rect x="7.46875" y="358.327" width="543" height="77.5714" rx="38.7857" transform="rotate(-45 7.46875 358.327)" fill="#3B8AFF"/>
                  <rect x="61.9355" y="138.545" width="310.286" height="77.5714" rx="38.7857" transform="rotate(45 61.9355 138.545)" fill="#3B8AFF"/>
                  <rect x="62.3154" y="-190.173" width="543" height="77.5714" rx="38.7857" transform="rotate(45 62.3154 -190.173)" fill="#3B8AFF"/>
                  </g>
               </svg>
            -->
            </div>
         </div>
         <div class="col-md-6 d-md-block d-none bg-primary p-0 mt-n1 vh-100 overflow-hidden">
            <img src="{{asset('images/auth/01.png')}}" class="img-fluid gradient-main animated-scaleX" alt="images">
         </div>
      </div>
   </section>
</x-guest-layout>
