<x-app-layout :assets="$assets ?? []">
    <div>
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Alterar a senha</h4>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="card-body">
                            <form method="post" action="{{ route('password.update', $user->id) }}">
                                @csrf
                                @method('post')
                                <div class="row">
                                    <div class="col-4">
                                        <label class="form-label">Senha atual</label>
                                        <input type="password" class="form-control" id="Input2" name="old_password">
                                    </div>
                                    <div class="col-4">
                                        <label class="form-label">Nova senha</label>
                                        <input type="password" class="form-control" id="Input3" name="new_password">
                                    </div>
                                    <div class="col-4">
                                        <label class="form-label">Confirmação da nova senha</label>
                                        <input type="password" class="form-control" id="Input4"
                                            name="password_confirm">
                                    </div>
                                </div>
                                <div class="card-header">
                                    <button type="submit" class="btn btn-primary">Salvar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
