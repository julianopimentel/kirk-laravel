<x-app-layout layout="boxedfancy" :assets="$assets ?? []">
    <div class="loader loader-default is-active">
    </div>
    <div class="container-fluid">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card">
                <div class="card-header">
                    <div class="form-group row">
                        <div class="col-9">
                            <h4>Integradores</h4>
                        </div>
                        <div class="col-2">
                            <button class="btn btn-primary" type="submit" data-bs-toggle="modal"
                                data-bs-target="#storeAddIntegrador">Adicionar
                            </button>
                            @include('admin.add.addIntegrador')
                        </div>
                    </div>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Documento</th>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Usuário Responsável</th>
                            <th>Status</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($integradores as $integrador)
                            <tr>
                                <td>{{ $integrador->id }}</td>
                                <td>{{ $integrador->doc }}</td>
                                <td>{{ $integrador->name_company }}</td>
                                <td>{{ $integrador->email }}</td>
                                <td>{{ $integrador->getUser->name }}</td>
                                <td>
                                    <span class="{{ $integrador->status->class }}">
                                        {{ $integrador->status->name }}
                                    </span>
                                </td>
                                <td> <a href="" target="_blank" data-bs-toggle="modal"
                                        data-bs-target="#updateIntegrador{{ $integrador->id }}">
                                        <svg class="icon-20" width="20" viewBox="0 0 24 24"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M9.3764 20.0279L18.1628 8.66544C18.6403 8.0527 18.8101 7.3443 18.6509 6.62299C18.513 5.96726 18.1097 5.34377 17.5049 4.87078L16.0299 3.69906C14.7459 2.67784 13.1541 2.78534 12.2415 3.95706L11.2546 5.23735C11.1273 5.39752 11.1591 5.63401 11.3183 5.76301C11.3183 5.76301 13.812 7.76246 13.8651 7.80546C14.0349 7.96671 14.1622 8.1817 14.1941 8.43969C14.2471 8.94493 13.8969 9.41792 13.377 9.48242C13.1329 9.51467 12.8994 9.43942 12.7297 9.29967L10.1086 7.21422C9.98126 7.11855 9.79025 7.13898 9.68413 7.26797L3.45514 15.3303C3.0519 15.8355 2.91395 16.4912 3.0519 17.1255L3.84777 20.5761C3.89021 20.7589 4.04939 20.8879 4.24039 20.8879L7.74222 20.8449C8.37891 20.8341 8.97316 20.5439 9.3764 20.0279ZM14.2797 18.9533H19.9898C20.5469 18.9533 21 19.4123 21 19.9766C21 20.5421 20.5469 21 19.9898 21H14.2797C13.7226 21 13.2695 20.5421 13.2695 19.9766C13.2695 19.4123 13.7226 18.9533 14.2797 18.9533Z"
                                            fill="currentColor"></path>
                                    </svg></a>
                                    @include('admin.add.EditIntegrador')</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $integradores->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
