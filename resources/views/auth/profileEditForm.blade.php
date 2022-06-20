<x-app-layout :assets="$assets ?? []">
    <div>
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Editar Profile</h4>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="card-body">
                            <div class="card-body">
                                    <form action="{{ route('profile.update') }}" method="POST" role="form"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <!--
                                <center>
                                    @if (!empty(Auth::user()->profile_image))
<img class="image rounded-circle" src="{{ Auth()->user()->profile_image }}"
                                            alt="profile_image"
                                            style="width: 160px;height: 160px; padding: 10px; margin: 0px; ">
@endif
                                </center>
                                -->

                                        <div class="row">
                                            <label class="form-label"
                                                class="col-md-4 col-form-label text-md-right">Profile
                                                Image</label>
                                            <div class="form-group col-sm-6">
                                                <input id="profile_image" type="file" class="form-control"
                                                    name="profile_image">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-label">Nome</label>
                                                    <div class="input-group mb-3">
                                                        <input class="form-control" type="text"
                                                            value='{{ Auth::user()->name }}' name="name" required>
                                                    </div>
                                                </div>
                                            </div>
                                            @if (Auth::user()->menuroles == 'admin')
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label class="form-label">CNPJ/CPF</label>
                                                        <div class="input-group mb-3">
                                                            <input class="form-control" type="text"
                                                                value='{{ Auth::user()->doc }}' name="doc"
                                                                disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-label">Email</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">@</span>
                                                        </div>
                                                        <input class="form-control" name="email" type="email"
                                                            placeholder="joao@live.com" autocomplete="joao@live.com"
                                                            value="{{ Auth::user()->email }}" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-label">Celular</label>
                                                    <div class="input-group mb-3">
                                                        <input class="form-control" id="phone" name="phone"
                                                            type="tel" value="{{ Auth::user()->phone }}" required>
                                                        <span id="valid-msg" class="hide">✓ Valid</span>
                                                        <span id="error-msg" class="hide"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.row-->
                                        <button class="btn btn-success" type="submit" title="Salvar">Salvar</button>
                                        <a href="{{ route('account.index') }}" class="btn btn-primary"
                                            title="Voltar">Voltar</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row-->
            <!-- /.col-->
        </div>
</x-app-layout>
