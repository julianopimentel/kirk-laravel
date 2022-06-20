@if ($appPermissao->edit_prayer == true)
    <x-app-layout :assets="$assets ?? []">
        <div>
            <div class="row">
                <div class="col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Dados da Oração</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="/prayer/{{ $prayer->id }}" role="form"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Titulo</label>
                                            <input class="form-control" type="text" placeholder="{{ __('Title') }}"
                                                name="title" value="{{ $prayer->title }}" required autofocus>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label">Mensagem</label>
                                            <textarea class="form-control" id="textarea-input" name="content" rows="9" placeholder="{{ __('Content..') }}"
                                                required>{{ $prayer->content }}</textarea>
                                        </div>
                                        <!-- /.row-->
                                        <div class="row">
                                            <div class="form-group col-sm-3">
                                                <div class="form-group">
                                                    <label class="form-label">Status</label>
                                                    <div class="input-group">
                                                        <select class="form-select"name="status_id">
                                                            @foreach ($statuses as $status)
                                                                @if ($status->id == $prayer->status_id)
                                                                    <option value="{{ $status->id }}" selected="true">
                                                                        {{ $status->name }}</option>
                                                                @else
                                                                    <option value="{{ $status->id }}">
                                                                        {{ $status->name }}</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-2">
                                                <div class="form-group">
                                                    <label class="form-label">Type</label>
                                                    <div class="input-group">
                                                        <input class="form-control" type="text"
                                                            placeholder="{{ __('Note type') }}" name="note_type"
                                                            value="{{ $prayer->note_type }}" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-2">
                                                <div class="form-group">
                                                    <label class="form-label">Público</label>
                                                    <div class="input-group">
                                                        <label
                                                            class="c-switch c-switch-label c-switch-pill c-switch-primary">
                                                            <input class="c-switch-input" name="public" type="checkbox"
                                                                {{ $prayer->public == true ? 'checked' : '' }}><span
                                                                class="c-switch-slider" data-checked="&#x2713"
                                                                data-unchecked="&#x2715"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-success" type="submit" title="Salvar">Salvar</button>
                                        <a class="btn btn-primary" href="{{ route('prayer.index') }}"
                                            title="Voltar">Voltar</a>
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
