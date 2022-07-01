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
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                            height="20" fill="currentColor" class="bi bi-trash-fill"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
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
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                        height="20" fill="currentColor" class="bi bi-door-open-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M1.5 15a.5.5 0 0 0 0 1h13a.5.5 0 0 0 0-1H13V2.5A1.5 1.5 0 0 0 11.5 1H11V.5a.5.5 0 0 0-.57-.495l-7 1A.5.5 0 0 0 3 1.5V15H1.5zM11 2h.5a.5.5 0 0 1 .5.5V15h-1V2zm-2.5 8c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z" />
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
        <h4><strong></strong></h4>
    </center>
    <br>
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"> Seja Bem-vindo a Igreja Digital! </h4>
                    <p class="card-text">Tenha na palma de sua mão
                    <div class="input-group mb-3">
                        <div class="v-text-align">
                            <h5>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    fill="currentColor" class="bi bi-calendar-check" viewBox="0 0 16 16">
                                    <path
                                        d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                    <path
                                        d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                                </svg>
                                Eventos
                            </h5>
                            <p>
                                <label class="form-label">Gostaria de confirmar sua presença no evento? Acompanhar os
                                    preparativos?</label>
                            </p>
                        </div>
                    </div>
                    </p>
                    <p class="card-text">
                    <div class="input-group mb-3">
                        <div class="v-text-align">
                            <h5>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-chat-dots" viewBox="0 0 16 16">
                                    <path d="M5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                                    <path d="m2.165 15.803.02-.004c1.83-.363 2.948-.842 3.468-1.105A9.06 9.06 0 0 0 8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6a10.437 10.437 0 0 1-.524 2.318l-.003.011a10.722 10.722 0 0 1-.244.637c-.079.186.074.394.273.362a21.673 21.673 0 0 0 .693-.125zm.8-3.108a1 1 0 0 0-.287-.801C1.618 10.83 1 9.468 1 8c0-3.192 3.004-6 7-6s7 2.808 7 6c0 3.193-3.004 6-7 6a8.06 8.06 0 0 1-2.088-.272 1 1 0 0 0-.711.074c-.387.196-1.24.57-2.634.893a10.97 10.97 0 0 0 .398-2z"/>
                                  </svg>
                                Mural de Recados
                            </h5>
                            <p>
                                <label class="form-label">Encontre as noticias, sermões ou palavras mais importante de
                                    sua Igreja!</label>
                            </p>
                        </div>
                    </div>
                    </p>
                    <p class="card-text">
                    <div class="input-group mb-3">
                        <div class="v-text-align">
                            <h5>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-wallet2" viewBox="0 0 16 16">
                                    <path d="M12.136.326A1.5 1.5 0 0 1 14 1.78V3h.5A1.5 1.5 0 0 1 16 4.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 13.5v-9a1.5 1.5 0 0 1 1.432-1.499L12.136.326zM5.562 3H13V1.78a.5.5 0 0 0-.621-.484L5.562 3zM1.5 4a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"/>
                                  </svg>
                                Dizimos e Ofertas
                            </h5>
                            <p>
                                <label class="form-label">Acompanhe a movimentação financeira de seus Dizimos e
                                    Ofertas.</label>
                            </p>
                        </div>
                    </div>
                    </p>
                    <a class="btn btn-primary" href="{{ route('features') }}">Conheça</a>
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
                    <a class="btn btn-success" href="{{ route('wizard.index') }}">Avançar</a>
                </div>
            </div>
        </div>
    </div>
    @endif
    </div>
    </div>
</x-app-layout>
