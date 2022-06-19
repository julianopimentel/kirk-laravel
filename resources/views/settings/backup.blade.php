@if ($appPermissao->add_people == true)
<x-app-layout :assets="$assets ?? []">
    <div>
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Backup</h4>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="card-body">
                                @if($people == 0)
                                Você pode baixar o arquivo csv de demonstração aqui:<br>
                                <a class="btn btn-primary" href="{{ url('/public/backup/empty.csv') }} ">Download</a>
                                <br><br>
                                <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" name="file" class="form-control">
                                    <br>

                                    <button class="btn btn-success">Importar</button>
                                    @else
                                    <a class="btn btn-primary" href="{{ route('export') }}">Export User Data</a>
                                    @endif
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.col-->
        </div>
        <!-- /.row-->
    </div>
</x-app-layout>
@else
@include('errors.redirecionar')
@endif
