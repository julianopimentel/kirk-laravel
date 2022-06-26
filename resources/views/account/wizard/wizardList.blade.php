<x-app-layout layout="boxedfancy" :assets="$assets ?? []">

    <div class="loader loader-default is-active"></div>
    <div class="container-fluid">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4>Selecionar uma instituição</h4>
                </div>
                <form action="{{ route('wizard.search') }}" method="POST" class="form form-inline">
                    {!! csrf_field() !!}
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-4">
                                <div class="inner">
                                    <input type="text" id='name' name="name" class="form-control"
                                        placeholder="Nome">
                                </div>
                            </div>
                            <div class="col-sm-8 col-md-2 col-lg-2 col-xl-2">
                                <div class="box-header">
                                    <button type="submit" class="btn btn-primary">Pesquisar</button>
                                </div>
                            </div>
                            <div class="col-sm-8 col-md-4 col-lg-4 col-xl-2">
                                <div class="box-header">
                                    <a href="{{ url('wizardList') }}" class="btn btn-danger">{{ __('Limpar') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <table class="table table-responsive-sm table-sm">
                    <thead>
                        <tr>
                            <th>Instituição</th>
                            <th>Telefone</th>
                            <th>Selecionar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($institutions as $institution)
                            <tr>
                                <td width="30%">{{ $institution->id }} -
                                    {{ $institution->name_company }}</td>
                                <td>{{ $institution->mobile }}</td>
                                <td width="1%">
                                    <form method="post"
                                        action="{{ route('tenantWizard', ['id' => $institution->tenant]) }}">
                                        @method('POST')
                                        @csrf
                                        <button class="btn btn-primary-outline" data-toggle="modal"
                                            data-target=".cd-deskapps"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-door-open" viewBox="0 0 16 16">
                                                <path d="M8.5 10c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z"/>
                                                <path d="M10.828.122A.5.5 0 0 1 11 .5V1h.5A1.5 1.5 0 0 1 13 2.5V15h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V1.5a.5.5 0 0 1 .43-.495l7-1a.5.5 0 0 1 .398.117zM11.5 2H11v13h1V2.5a.5.5 0 0 0-.5-.5zM4 1.934V15h6V1.077l-6 .857z"/>
                                              </svg></button>
                                    </form>
                                </td>
                                </td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
        <!-- /.row-->
    </div>

</x-app-layout>
