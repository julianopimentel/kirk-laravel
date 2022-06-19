<x-app-layout layout="boxedfancy" :assets="$assets ?? []">
    <div class="loader loader-default is-active"></div>
    <div class="container-fluid">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            @if (!$institutions->isEmpty())
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">{{ __('account.select') }}</h4>
                        </div>
                    </div>
                        <br>
                    <div class="bd-example table-responsive">
                        <table class="table table-responsive table-responsive-xl">
                            <thead>
                                <tr>
                                    <th scope="col">{{ __('account.id') }}</th>
                                    <th scope="col">{{ __('account.name') }}</th>
                                    @if (Auth::user()->isAdmin() == true)
                                        <th scope="col">{{ __('account.type') }}</th>
                                    @endif
                                    <th style="min-width: 100px" colspan="3">
                                        <Center>{{ __('account.action') }}</Center>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($institutions as $institution)
                                    <tr>
                                        <td scope="col" width="10%">{{ $institution->AccountList->id }}</td>
                                        <td width="90%">{{ $institution->AccountList->name_company }} </td>
                                        @if (Auth::user()->isAdmin() == true)
                                            <td width="10%">
                                                <span class="{{ $institution->AccountList->status->class }}">
                                                    {{ $institution->AccountList->status->name }}
                                                </span>
                                            </td>
                                        @endif
                                        <td width="1%">
                                            @if ($you->integrador_id == $institution->AccountList->integrador)
                                                <a href="{{ route('account.edit', $institution->AccountList->id) }}"
                                                    class="btn btn-primary-outline">
                                                    <svg class="icon-20" width="20" viewBox="0 0 24 24"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M9.3764 20.0279L18.1628 8.66544C18.6403 8.0527 18.8101 7.3443 18.6509 6.62299C18.513 5.96726 18.1097 5.34377 17.5049 4.87078L16.0299 3.69906C14.7459 2.67784 13.1541 2.78534 12.2415 3.95706L11.2546 5.23735C11.1273 5.39752 11.1591 5.63401 11.3183 5.76301C11.3183 5.76301 13.812 7.76246 13.8651 7.80546C14.0349 7.96671 14.1622 8.1817 14.1941 8.43969C14.2471 8.94493 13.8969 9.41792 13.377 9.48242C13.1329 9.51467 12.8994 9.43942 12.7297 9.29967L10.1086 7.21422C9.98126 7.11855 9.79025 7.13898 9.68413 7.26797L3.45514 15.3303C3.0519 15.8355 2.91395 16.4912 3.0519 17.1255L3.84777 20.5761C3.89021 20.7589 4.04939 20.8879 4.24039 20.8879L7.74222 20.8449C8.37891 20.8341 8.97316 20.5439 9.3764 20.0279ZM14.2797 18.9533H19.9898C20.5469 18.9533 21 19.4123 21 19.9766C21 20.5421 20.5469 21 19.9898 21H14.2797C13.7226 21 13.2695 20.5421 13.2695 19.9766C13.2695 19.4123 13.7226 18.9533 14.2797 18.9533Z"
                                                            fill="currentColor"></path>
                                                    </svg></a>
                                            @endif
                                        </td>
                                        <td width="1%">
                                            @if ($you->integrador_id == $institution->AccountList->integrador)
                                                <form
                                                    action="{{ route('account.destroy', $institution->AccountList->id) }}"
                                                    method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-primary-outline show_confirm"
                                                        data-toggle="tooltip" title='Delete'>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                                          </svg>
                                                    </button>
                                                </form>
                                            @endif
                                        </td>
                                        <td width="1%">
                                            <form method="post"
                                                action="{{ route('tenant', ['id' => $institution->AccountList->id]) }}">
                                                @method('POST')
                                                @csrf
                                                <button class="btn btn-primary-outline" data-toggle="modal"
                                                    data-target=".cd-load">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-door-open-fill" viewBox="0 0 16 16">
                                                        <path d="M1.5 15a.5.5 0 0 0 0 1h13a.5.5 0 0 0 0-1H13V2.5A1.5 1.5 0 0 0 11.5 1H11V.5a.5.5 0 0 0-.57-.495l-7 1A.5.5 0 0 0 3 1.5V15H1.5zM11 2h.5a.5.5 0 0 1 .5.5V15h-1V2zm-2.5 8c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z"/>
                                                      </svg>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $institutions->links() }}
                </div>
        </div>
    </div>
    </div>
@else
    <center>
        <h4><strong>Seja Bem-vindo a Igreja Digital!</strong></h4>
    </center>
    <br>
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><strong>Tenha na palma de sua mão</strong></h5>
                    <p class="card-text">

                    <table id="u_content_text_6" style="font-family:arial,helvetica,sans-serif;" role="presentation"
                        cellpadding="0" cellspacing="0" width="100%" border="0">
                        <tbody>
                            <tr>
                                <td class="v-container-padding-padding"
                                    style="overflow-wrap:break-word;word-break:break-word;padding:10px 10px 0px;font-family:arial,helvetica,sans-serif;"
                                    align="left">
                                    <div class="v-text-align"
                                        style="color: #636f83; line-height: 140%; text-align: left; word-wrap: break-word;">
                                        <p style="font-size: 14px; line-height: 140%;">
                                            <strong>&#8594; Eventos</strong>
                                        </p>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table id="u_content_text_7" style="font-family:arial,helvetica,sans-serif;" role="presentation"
                        cellpadding="0" cellspacing="0" width="100%" border="0">
                        <tbody>
                            <tr>
                                <td class="v-container-padding-padding"
                                    style="overflow-wrap:break-word;word-break:break-word;padding:10px 10px 0px;font-family:arial,helvetica,sans-serif;"
                                    align="left">
                                    <div class="v-text-align"
                                        style="line-height: 140%; text-align: left; word-wrap: break-word;">
                                        <p style="font-size: 14px; line-height: 140%;"><span
                                                style="font-family: Raleway, sans-serif; font-size: 14px; line-height: 19.6px;">Gostaria
                                                de confirmar sua presen&ccedil;a no evento?
                                                Acompanhar os preparativos?</span>
                                        </p>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table id="u_content_text_8" style="font-family:arial,helvetica,sans-serif;" role="presentation"
                        cellpadding="0" cellspacing="0" width="100%" border="0">
                        <tbody>
                            <tr>
                                <td class="v-container-padding-padding"
                                    style="overflow-wrap:break-word;word-break:break-word;padding:10px 10px 0px;font-family:arial,helvetica,sans-serif;"
                                    align="left">
                                    <div class="v-text-align"
                                        style="color: #636f83; line-height: 140%; text-align: left; word-wrap: break-word;">
                                        <p style="font-size: 14px; line-height: 140%;">
                                            <strong>&#8594; Grupos</strong>
                                        </p>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table id="u_content_text_9" style="font-family:arial,helvetica,sans-serif;" role="presentation"
                        cellpadding="0" cellspacing="0" width="100%" border="0">
                        <tbody>
                            <tr>
                                <td class="v-container-padding-padding"
                                    style="overflow-wrap:break-word;word-break:break-word;padding:10px 10px 0px;font-family:arial,helvetica,sans-serif;"
                                    align="left">
                                    <div class="v-text-align"
                                        style="line-height: 140%; text-align: left; word-wrap: break-word;">
                                        <p style="font-size: 14px; line-height: 140%;"><span
                                                style="font-family: Raleway, sans-serif; font-size: 14px; line-height: 19.6px;">Participe
                                                de seu grupo, veja a
                                                pr&oacute;xima reuni&atilde;o e converse apenas
                                                entre vocês</span>
                                        </p>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table id="u_content_text_5" style="font-family:arial,helvetica,sans-serif;" role="presentation"
                        cellpadding="0" cellspacing="0" width="100%" border="0">
                        <tbody>
                            <tr>
                                <td class="v-container-padding-padding"
                                    style="overflow-wrap:break-word;word-break:break-word;padding:10px 10px 0px;font-family:arial,helvetica,sans-serif;"
                                    align="left">
                                    <div class="v-text-align"
                                        style="color: #636f83; line-height: 140%; text-align: left; word-wrap: break-word;">
                                        <p style="font-size: 14px; line-height: 140%;">
                                            <strong>&#8594; Dizimos</strong>
                                        </p>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table id="u_content_text_4" style="font-family:arial,helvetica,sans-serif;" role="presentation"
                        cellpadding="0" cellspacing="0" width="100%" border="0">
                        <tbody>
                            <tr>
                                <td class="v-container-padding-padding"
                                    style="overflow-wrap:break-word;word-break:break-word;padding:10px 10px 0px;font-family:arial,helvetica,sans-serif;"
                                    align="left">
                                    <div class="v-text-align"
                                        style="line-height: 140%; text-align: left; word-wrap: break-word;">
                                        <p style="font-size: 14px; line-height: 140%;"><span
                                                style="font-family: Raleway, sans-serif; font-size: 14px; line-height: 19.6px;">Aqui
                                                se a igreja desejar, poder&aacute; lhe mostrar
                                                seu movimento financeiro, seus dizimo e
                                                ofertas.</span>
                                        </p>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <br>
                    </p><a class="btn btn-primary" href="{{ route('features') }}">Conheça</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card bg-dark text-dark"><img class="card-img"
                    src="http://localhost:8000/public/email/image-11.png" alt="">
                <div class="card-img-overlay">
                    <h5 class="card-title"><strong>Vamos começar?</strong></h5>
                    <p class="card-text">
                    <h6> Você não possui nenhum cadastro<br>associado.
                        Gostaria de criar um<br> pré-cadastro a sua igreja? </h6>
                    </p>
                    <br>
                    <a class="btn btn-primary" href="{{ route('wizard.index') }}">Avançar</a>

                </div>
            </div>
        </div>
        <div class="col-xl-12">
            <div class="card text-white bg-dark mb-3 text-center">
                <div class="card-body">
                    <h5 class="card-title">Você tem uma pergunta?</h5>
                    <p class="card-text">Caso tenha dúvidas sobre a nossa plataforma, entre em contato conosco ou
                        com o
                        responsável pela administração de sua igreja</p>
                    <a class="btn btn-light" href="{{ config('app.url') }}/#contact">Entre em contato</a>
                </div>
            </div>
        </div>
    </div>
    @endif
    </div>
    </div>
</x-app-layout>
