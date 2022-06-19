@if ($appPermissao->settings_email == true)
<x-app-layout :assets="$assets ?? []">
    <div>
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Configurações de Email</h4>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="card-body">
                            <form action="{{ route('settings.updateEmail') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    Recurso desativaddo temporariamente!
                                    <br>
                                    @if (Auth::user()->menuroles == 'admin')
                                   
                                    <label class="control-label">Email From/ Reply to</label>
                                    <input type="text" class="form-control" name="email_from"
                                        placeholder="no-reply@domain.com" value="{{ $settings->email_from }}" required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">SMTP Host</label>
                                    <input type="text" class="form-control" name="smtp_host" placeholder="SMTP Host"
                                        value="{{ $settings->smtp_host }}" required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">SMTP Port</label>
                                    <input type="text" class="form-control" name="smtp_port" placeholder="SMTP Port"
                                        value="{{ $settings->smtp_port }}" required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">SMTP User</label>
                                    <input type="text" class="form-control" name="smtp_user" placeholder="SMTP Email"
                                        value="{{ $settings->smtp_user }}" required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">SMTP Password</label>
                                    <input type="password" class="form-control" name="smtp_pass" placeholder="SMTP Password"
                                        value="" required>
                                </div>
                                <!-- /.row-->
                              
                                <!-- /.row-->
                                <button class="btn btn-success" type="submit" title="Salvar"><i
                                    class="c-icon c-icon-sm cil-save"></i></button>
                            <a class="btn btn-primary" href="{{ route('settings') }}" title="Voltar"><i
                                    class="c-icon c-icon-sm cil-action-undo"></i></a>
                                    @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
    @else
        @include('errors.redirecionar')
    @endif
    