@if ($appPermissao->add_message == true)
    <x-app-layout :assets="$assets ?? []">
        <script src="https://cdn.ckeditor.com/4.17.2/standard/ckeditor.js"></script>
        <div>
            <div class="row">
                <div class="col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Dados do Recado</h4>
                            </div>
                        </div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('message.store') }}" role="form"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Titulo</label>
                                                <input class="form-control" type="text"
                                                    placeholder="{{ __('Title') }}" name="title" required autofocus>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label">Mensagem</label>
                                                <textarea class="form-control" id="textarea-input" name="content" rows="9" placeholder="{{ __('Content..') }}"
                                                    required></textarea>
                                            </div>
                                            <!-- /.row-->
                                            <div class="row">
                                                <div class="form-group col-sm-3">
                                                    <div class="form-group">
                                                        <label class="form-label">Data</label>
                                                        <div class="input-group">
                                                            <input class="form-control" name="applies_to_date"
                                                                type="date" placeholder="date"
                                                                value="{{ date('Y-m-d') }}" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Status</label>
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
                                                <div class="form-group col-sm-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Type</label>
                                                        <div class="input-group">
                                                            <input class="form-control" type="text"
                                                                placeholder="{{ __('Note type') }}" name="note_type"
                                                                required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-5">
                                                    <div class="form-group">
                                                        <label for="image"
                                                            class="col-md-6 col-form-label text-md-right">
                                                            Image</label>
                                                        <div class="form-group col-sm-6">
                                                            <input id="image" type="file" class="form-control"
                                                                name="image">
                                                            <p>
                                                                <small class="text-medium-emphasis">Recomendamos o
                                                                    tamanho
                                                                    de 670 x 480 </small>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="btn btn-success" type="submit" title="Salvar">Salvar</button>
                                            <a href="{{ route('message.index') }}" class="btn btn-primary"
                                                title="Voltar">Voltar</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Blog -->
        <script>
            CKEDITOR.replace('content');
        </script>
    </x-app-layout>
@else
    @include('errors.redirecionar')
@endif
