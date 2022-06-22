@if (Auth::user()->menuroles == 'admin')
<x-app-layout layout="boxedfancy" :assets="$assets ?? []">
        <div class="container-fluid">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <form action="{{ route('account.search') }}" method="POST" class="form form-inline">
                                    {!! csrf_field() !!}
                                    <div class="form-group row">
                                        <div class="col-sm-12 col-md-4 col-lg-5 col-xl-5">
                                            <h4><strong>{{ __('account.select') }}</strong></h4>
                                        </div>
                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                            <div class="inner">
                                                <input type="text" id='name_company' name="name_company"
                                                    class="form-control" placeholder="Nome">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                            <div class="inner">
                                                <select class="form-select" id="integrador" name="integrador">
                                                    <option value="">Integrador</option>
                                                    @foreach ($integradores as $integradores)
                                                        <option value="{{ $integradores->id }}">
                                                            {{ $integradores->name_company }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-1 col-md-1 col-lg-1 col-xl-1">
                                            <div class="box-header">
                                                <button type="submit" class="btn btn-primary" title="Pesquisar"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                                  </svg></button>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                            </div>
                            <div class="card-body">
                                <table class="table table-responsive">
                                    <thead>
                                        <tr>
                                            <th>{{ __('account.id') }}</th>
                                            <th>{{ __('account.name') }}</th>
                                            <th>{{ __('account.integrador') }}</th>
                                            <th>{{ __('account.type') }}</th>
                                            <th colspan="3">
                                                <Center>{{ __('account.action') }}</Center>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($institutions as $institution)
                                            <tr>
                                                <td width="10%">{{ $institution->id }}</td>
                                                <td width="40%">{{ $institution->name_company }} </td>
                                                <td width="40%">{{ $institution->getIntegrador->name_company }} </td>
                                                <td>
                                                    <span class="{{ $institution->status->class }}">
                                                        {{ $institution->status->name }}
                                                    </span>
                                                </td>

                                                <td width="1%">
                                                    @if (Auth::user()->isAdmin())
                                                        <a href="{{ route('account.edit', $institution->id) }}"
                                                            class="btn btn-primary-outline"><svg class="icon-20" width="20" viewBox="0 0 24 24"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M9.3764 20.0279L18.1628 8.66544C18.6403 8.0527 18.8101 7.3443 18.6509 6.62299C18.513 5.96726 18.1097 5.34377 17.5049 4.87078L16.0299 3.69906C14.7459 2.67784 13.1541 2.78534 12.2415 3.95706L11.2546 5.23735C11.1273 5.39752 11.1591 5.63401 11.3183 5.76301C11.3183 5.76301 13.812 7.76246 13.8651 7.80546C14.0349 7.96671 14.1622 8.1817 14.1941 8.43969C14.2471 8.94493 13.8969 9.41792 13.377 9.48242C13.1329 9.51467 12.8994 9.43942 12.7297 9.29967L10.1086 7.21422C9.98126 7.11855 9.79025 7.13898 9.68413 7.26797L3.45514 15.3303C3.0519 15.8355 2.91395 16.4912 3.0519 17.1255L3.84777 20.5761C3.89021 20.7589 4.04939 20.8879 4.24039 20.8879L7.74222 20.8449C8.37891 20.8341 8.97316 20.5439 9.3764 20.0279ZM14.2797 18.9533H19.9898C20.5469 18.9533 21 19.4123 21 19.9766C21 20.5421 20.5469 21 19.9898 21H14.2797C13.7226 21 13.2695 20.5421 13.2695 19.9766C13.2695 19.4123 13.7226 18.9533 14.2797 18.9533Z"
                                                                fill="currentColor"></path>
                                                        </svg></a>
                                                    @endif
                                                </td>
                                                <td width="1%">
                                                    @if (Auth::user()->isAdmin())
                                                        <form action="{{ route('account.destroy', $institution->id) }}"
                                                            method="POST">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button class="btn btn-primary-outline show_confirm"
                                                                data-toggle="tooltip" title='Delete'><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                                                  </svg></button>
                                                        </form>
                                                    @endif
                                                </td>
                                                <td width="1%">
                                                    <form method="post"
                                                        action="{{ route('tenant', ['id' => $institution->id]) }}">
                                                        @method('POST')
                                                        @csrf
                                                        <button class="btn btn-primary-outline" data-toggle="modal"
                                                            data-target=".cd-load"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-door-open-fill" viewBox="0 0 16 16">
                                                                <path d="M1.5 15a.5.5 0 0 0 0 1h13a.5.5 0 0 0 0-1H13V2.5A1.5 1.5 0 0 0 11.5 1H11V.5a.5.5 0 0 0-.57-.495l-7 1A.5.5 0 0 0 3 1.5V15H1.5zM11 2h.5a.5.5 0 0 1 .5.5V15h-1V2zm-2.5 8c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z"/>
                                                              </svg></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @if (isset($dataForm))
                                    {!! $institutions->appends($dataForm)->links() !!}
                                @else
                                    {!! $institutions->links() !!}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
    @else
        @include('errors.redirecionar')
@endif
