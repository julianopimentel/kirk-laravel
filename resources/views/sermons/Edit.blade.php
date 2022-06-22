@if ($appPermissao->edit_sermons == true)
    <x-app-layout :assets="$assets ?? []">
        <script src="https://cdn.ckeditor.com/4.17.2/standard/ckeditor.js"></script>
        <div>
            <div class="row">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Dados da Palavra</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="card-body">
                                <form method="POST" action="/sermons/{{ $note->id }}" role="form"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Titulo*</label>
                                                <input class="form-control" type="text"
                                                    placeholder="{{ __('Title') }}" name="title" id="title"
                                                    value="{{ $note->title }}" required autofocus>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label">Mensagem*</label>
                                                <textarea class="form-control" id="textarea-input" id="content" name="content" rows="5"
                                                    placeholder="{{ __('Content..') }}" required>{{ $note->content }}</textarea>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label">URL do Youtube*</label>
                                                <input class="form-control" type="text"
                                                    value="{{ $note->url_video }}" name="url" id="url"
                                                    required autofocus>
                                            </div>
                                            <button class="btn btn-success" type="submit"
                                                title="Salvar">Salvar</button>
                                            <a href="{{ route('sermons.index') }}" class="btn btn-primary"
                                                title="Voltar">Voltar</a>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Data da Publicação*</label>
                                        <div class="input-group">
                                            <input class="form-control" name="applies_to_date" type="date"
                                                id="date" placeholder="date" value="{{ $note->applies_to_date }}"
                                                required />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Categoria</label>
                                        <div class="input-group">
                                            <select class="form-select" name="type" id="type">
                                                @foreach ($category as $category)
                                                    @if ($category->id == $note->type)
                                                        <option value="{{ $category->id }}" selected="true">
                                                            {{ $category->name }}</option>
                                                    @else
                                                        <option value="{{ $category->id }}">
                                                            {{ $category->name }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Status</label>
                                        <div class="input-group">
                                            <select class="form-select" name="status_id" id="status_id">
                                                @foreach ($statuses as $status)
                                                    @if ($status->id == $note->status_id)
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
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        

        <script>
            CKEDITOR.replace('content');
        </script>

    </x-app-layout>
@else
    @include('errors.redirecionar')
@endif
