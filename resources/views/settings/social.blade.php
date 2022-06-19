@if ($appPermissao->settings_social == true)
<x-app-layout :assets="$assets ?? []">
    <div>
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Configurações de Redes Sociais</h4>
                            <p class="card-text">Configure suas Redes Sociais para serem exibidadas na tela Home, para remover o botão da tela é necessário deixar o campo em branco</p>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="card-body">
                            <div class="row">
                            <form action="{{ route('settings.updateSocial') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label class="control-label">Facebook</label>
                                    <input type="text" class="form-control" name="facebook_link" placeholder="https://facebook.com" value="{{ $settings->facebook_link }}">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Twitter</label>
                                    <input type="text" class="form-control" name="twitter_link" placeholder="https://twitter.com" value="{{ $settings->twitter_link }}">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Youtube</label>
                                    <input type="text" class="form-control" name="youtube_link" placeholder="https://youtube.com" value="{{ $settings->youtube_link }}">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">LinkedIn</label>
                                    <input type="text" class="form-control" name="linkedin_link" placeholder="https://linkedin.com" value="{{ $settings->linkedin_link }}">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">VK</label>
                                    <input type="text" class="form-control" name="vk_link" placeholder="https://vk.com" value="{{ $settings->vk_link }}">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Site</label>
                                    <input type="text" class="form-control" name="site_link" placeholder="https://seusite.com" value="{{ $settings->site_link }}">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">WhatsApp</label>
                                    <input type="text" class="form-control" name="whatsapp_link" placeholder="5521981255454" value="{{ $settings->whatsapp_link }}">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Telegram</label>
                                    <input type="text" class="form-control" name="telegram_link" placeholder="seuusuario" value="{{ $settings->telegram_link }}">
                                </div>
                                <!-- /.row-->
                        <!-- /.row-->
                        <button class="btn btn-success" type="submit" title="Salvar">Salvar</button>
                    <a class="btn btn-danger" href="{{ route('settings') }}" title="Voltar">Voltar</a>
                            </form>
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
