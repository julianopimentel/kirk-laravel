@if ($appPermissao->view_precadastro == true)
    <x-app-layout :assets="$assets ?? []">
        <div>
            <div class="row">
                <div class="col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Pré-cadastros</h4>
                            </div>
                            <form action="{{ route('peopleList.search') }}" method="POST" class="form form-inline">
                                {!! csrf_field() !!}

                                <div class="form-group row">
                                    <div class="col-sm-4 col-md-2 col-lg-2 col-xl-3">
                                        <div class="inner">
                                            <input type="text" id='name' name="name" class="form-control"
                                                placeholder="Nome">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="inner">
                                            <select class="form-select" id="status" name="status">
                                                <option value="">Status</option>
                                                @foreach ($status as $status)
                                                    <option value="{{ $status->id }}">{{ $status->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-8 col-md-2 col-lg-2 col-xl-2">
                                        <div class="box-header">
                                            <button type="submit" class="btn btn-primary">Pesquisar</button>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                        <table class="table table-responsive-sm">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>E-mail</th>
                                    <th>Mobile</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>{{ __('account.action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($peoples as $people)
                                    <tr>
                                        <td><strong>{{ $people->name }}</strong>
                                            @if ($people->is_verify == false)
                                                <span class="badge badge-danger">NEW</span>
                                            @endif
                                        </td>
                                        <td>{{ $people->email }}</td>
                                        <td>{{ $people->phone }}</td>
                                        <td>
                                            <span class="{{ $people->status->class }}">
                                                {{ $people->status->name }}
                                            </span>
                                        </td>
                                        <td>{{ $people->created_at }}</td>
                                        <td width="1%">
                                            @if ($appPermissao->edit_precadastro == true)
                                                <a href="{{ route('peopleList.edit', $people->id) }}"><svg class="icon-20" width="20" viewBox="0 0 24 24"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M9.3764 20.0279L18.1628 8.66544C18.6403 8.0527 18.8101 7.3443 18.6509 6.62299C18.513 5.96726 18.1097 5.34377 17.5049 4.87078L16.0299 3.69906C14.7459 2.67784 13.1541 2.78534 12.2415 3.95706L11.2546 5.23735C11.1273 5.39752 11.1591 5.63401 11.3183 5.76301C11.3183 5.76301 13.812 7.76246 13.8651 7.80546C14.0349 7.96671 14.1622 8.1817 14.1941 8.43969C14.2471 8.94493 13.8969 9.41792 13.377 9.48242C13.1329 9.51467 12.8994 9.43942 12.7297 9.29967L10.1086 7.21422C9.98126 7.11855 9.79025 7.13898 9.68413 7.26797L3.45514 15.3303C3.0519 15.8355 2.91395 16.4912 3.0519 17.1255L3.84777 20.5761C3.89021 20.7589 4.04939 20.8879 4.24039 20.8879L7.74222 20.8449C8.37891 20.8341 8.97316 20.5439 9.3764 20.0279ZM14.2797 18.9533H19.9898C20.5469 18.9533 21 19.4123 21 19.9766C21 20.5421 20.5469 21 19.9898 21H14.2797C13.7226 21 13.2695 20.5421 13.2695 19.9766C13.2695 19.4123 13.7226 18.9533 14.2797 18.9533Z"
                                                        fill="currentColor"></path>
                                                </svg></a>
                                            @endif
                                        </td>
                                    </tr>
                                    </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>

                        @if (isset($dataForm))
                            {!! $peoples->appends($dataForm)->links() !!}
                        @else
                            {!! $peoples->links() !!}
                        @endif
                    </div>
                </div>
            </div>
            <!-- /.row-->
        </div>
        </div>
        </div>


        <script>
            $("#name").on("input", function() {
                $(this).val($(this).val().toUpperCase());
            });
        </script>
    </x-app-layout>
@else
    @include('errors.redirecionar')
@endif
