
        <!-- Start Navigation -->
        <nav class="navbar navbar-default navbar-fixed navbar-transparent white bootsnav">

            <div class="container-semi">

                <!-- Start Atribute Navigation -->
                <div class="attr-nav button-light">
                    <ul>
                        <li>
                            <a href="{{ route('login')}}">Entrar</a>
                        </li>
                    </ul>
                </div>
                <!-- End Atribute Navigation -->

                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="/">
                        <img src="{{ asset('site/assets/img/coreui-base-white-228x81.png')}}" class="logo logo-display" alt="Logo"
                            width="140" height="60">
                        <img src="{{ asset('site/assets/img/logo.png')}}" class="logo logo-scrolled" alt="Logo"
                            width="130" height="80">
                    </a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav navbar-right" data-in="#" data-out="#">
                        <li>
                            <a class="smooth-menu" href="{{ route('features')}}">Por que Usar?</a>
                        </li>
                        <li>
                            <a class="smooth-menu" href="{{ route('blog')}}">Blog</a>
                        </li>
                        <li class="dropdown dropdown-right">
                            <a href="#" class="dropdown-toggle smooth-menu" data-toggle="dropdown">Suporte</a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('contact')}}">Contato</a></li>
                                <li><a href="/wiki">Central de Ajuda</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="smooth-menu" href="#" data-toggle="modal" data-target="#staticBackdrop">Login</a>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div>

        </nav>
        <!-- End Navigation -->

            <!-- Modal -->
<div class="modal fade" id="staticBackdrop" data--backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body">
          <form action="#" autocomplete="off">
              <h3 class="text-center">Sign In</h3>
              <p class="text-center">Sign in to stay connected</p>
              <div class="form-group">
                  <label class="form-label">Email address</label>
                  <input type="email" class="form-control mb-0"  placeholder="Enter email" autocomplete="off">
              </div>
              <div class="form-group">
                  <label class="form-label">Password</label>
                  <input type="password" class="form-control mb-0" placeholder="Enter password" autocomplete="off">
              </div>
              <div class="d-flex justify-content-between">
                  <div class="form-check d-inline-block mt-2 pt-1">
                      <input type="checkbox" class="form-check-input" id="customCheck11">
                      <label class="form-check-label" for="customCheck11">Remember Me</label>
                  </div>
                  <a href="#">Forget password</a>
              </div>
              <div class="text-center pb-3">
                  <button type="button" class="btn btn-primary" data-dismiss="modal">Sign in</button>
              </div>
              <p class="text-center">Or sign in with other accounts?</p>
              <div class="d-flex justify-content-center">
                  <ul class="list-group list-group-horizontal list-group-flush">
                  <li class="list-group-item border-0 pb-0">
                      <a href="#"><img src="https://templates.iqonic.design/product/hope-ui/pro/laravel/public/images/brands/fb.svg" alt="fb" loading="lazy"></a>
                  </li>
                  <li class="list-group-item border-0 pb-0">
                      <a href="#"><img src="https://templates.iqonic.design/product/hope-ui/pro/laravel/public/images/brands/gm.svg" alt="gm" loading="lazy"></a>
                  </li>
                  <li class="list-group-item border-0 pb-0">
                      <a href="#"><img src="https://templates.iqonic.design/product/hope-ui/pro/laravel/public/images/brands/im.svg" alt="im" loading="lazy"></a>
                  </li>
                  <li class="list-group-item border-0 pb-0">
                      <a href="#"><img src="https://templates.iqonic.design/product/hope-ui/pro/laravel/public/images/brands/li.svg" alt="li" loading="lazy"></a>
                  </li>
                  </ul>
              </div>
              <p class="text-center">Don't have account?<a href="#"> Click here to sign up.</a></p>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="staticBackdrop1" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdrop1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body">
          <form action="#">
              <h3 class="text-center">Sign Up</h3>
              <p class="text-center">Create your Hope UI account</p>
              <div class="d-flex justify-content-between">
              <div class="form-group me-3">
                  <label class="form-label">First Name</label>
                  <input type="text" class="form-control mb-0"  placeholder="Enter First Name" autocomplete="off">
              </div>
              <div class="form-group">
                  <label class="form-label">Last Name</label>
                  <input type="text" class="form-control mb-0" placeholder="Enter Last Name" autocomplete="off">
              </div>
              </div>
              <div class="d-flex justify-content-between">
              <div class="form-group me-3">
                  <label class="form-label">Email</label>
                  <input type="email" class="form-control mb-0"  placeholder="Enter Email" autocomplete="off">
              </div>
              <div class="form-group">
                  <label class="form-label">Phone No.</label>
                  <input type="tel" class="form-control mb-0" placeholder="Enter Phone Number" autocomplete="off">
              </div>
              </div>
              <div class="d-flex justify-content-between">
              <div class="form-group me-3">
                  <label class="form-label">Password</label>
                  <input type="password" class="form-control mb-0"  placeholder="Enter Password"  autocomplete="off">
              </div>
              <div class="form-group">
                  <label class="form-label">Confirm Password</label>
                  <input type="password" class="form-control mb-0" placeholder="Enter Confirm Password" autocomplete="off">
              </div>
              </div>
                  <div class="text-center pb-3">
                      <input type="checkbox" class="form-check-input" id="customCheck112">
                      <label class="form-check-label" for="customCheck112">I agree with the terms of use</label>
                  </div>
              <div class="text-center pb-3">
                  <button type="button" class="btn btn-primary" data-dismiss="modal">Sign in</button>
              </div>
              <p class="text-center">Or sign in with other accounts?</p>
              <div class="d-flex justify-content-center">
                  <ul class="list-group list-group-horizontal list-group-flush">
                      <li class="list-group-item border-0 pb-0">
                          <a href="#"><img src="https://templates.iqonic.design/product/hope-ui/pro/laravel/public/images/brands/fb.svg" alt="fb" loading="lazy"></a>
                      </li>
                      <li class="list-group-item border-0 pb-0">
                          <a href="#"><img src="https://templates.iqonic.design/product/hope-ui/pro/laravel/public/images/brands/gm.svg" alt="gm" loading="lazy"></a>
                      </li>
                      <li class="list-group-item border-0 pb-0">
                          <a href="#"><img src="https://templates.iqonic.design/product/hope-ui/pro/laravel/public/images/brands/im.svg" alt="im" loading="lazy"></a>
                      </li>
                      <li class="list-group-item border-0 pb-0">
                          <a href="#"><img src="https://templates.iqonic.design/product/hope-ui/pro/laravel/public/images/brands/li.svg" alt="li" loading="lazy"></a>
                      </li>
                  </ul>
              </div>
              <p class="text-center">Already have an Account<a href="#">Sign in</a></p>
          </form>
        </div>
      </div>
    </div>
  </div>