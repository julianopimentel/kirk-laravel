@if ($appPermissao->add_sermons == true)
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
                                <form method="POST" action="{{ route('sermons.store') }}" role="form"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Titulo*</label>
                                                <input class="form-control" type="text"
                                                    placeholder="{{ __('Title') }}" name="title" id="title"
                                                    required autofocus>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Mensagem*</label>
                                                <textarea class="form-control" name="content" rows="5" placeholder="{{ __('Content..') }}" required></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">URL do Youtube*</label>
                                                <input class="form-control" type="text"
                                                    placeholder="https://www.youtube.com/watch?v=d8u9uL9Ilyk&t=20s"
                                                    name="url" required autofocus>
                                                <p class="card-text">
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-success" type="submit" title="Salvar">Salvar</button>
                                    <a href="{{ route('sermons.index') }}" class="btn btn-primary"
                                        title="Voltar">Voltar</a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Data da Publicação*</label>
                                        <div class="input-group">
                                            <input class="form-control" name="applies_to_date" type="date"
                                                placeholder="date" value="{{ date('Y-m-d') }}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Categoria*</label>
                                        <div class="input-group">
                                            <select class="form-select" name="type">
                                                @foreach ($category as $category)
                                                    <option value="{{ $category->id }}">
                                                        {{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Status*</label>
                                        <div class="input-group">
                                            <select class="form-select" name="status_id">
                                                @foreach ($statuses as $status)
                                                    <option value="{{ $status->id }}">
                                                        {{ $status->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Blog -->
        <script>
            CKEDITOR.replace('content');
        </script>
        </div>
    </x-app-layout>
@else
    @include('errors.redirecionar')
@endif
