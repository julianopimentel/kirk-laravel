@if ($appPermissao->view_media == true)
    @extends('layouts.base')

    @section('css')
        <link href="{{ asset('css/cropper.css') }}" rel="stylesheet">
    @endsection
    @section('content')
        <div class="container-fluid">
            <div class="fade-in">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Documentos</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div style="float:left;">
                                            @if ($parentFolder !== 'disable')
                                                <a class="btn btn-primary mt-2"
                                                    href="{{ route('media.folder.index', ['id' => $parentFolder]) }}">
                                                    <i class="cil-level-up"></i>
                                                    Voltar
                                                </a>
                                            @endif
                                            @if ($appPermissao->add_media == true)
                                                <a class="btn btn-primary mt-2"
                                                    href="{{ route('media.folder.add', ['thisFolder' => $thisFolder]) }}">
                                                    <i class="cil-plus"></i>
                                                    <i class="cil-folder"></i>
                                                    Nova Pasta
                                                </a>
                                            @endif
                                        </div>
                                        @if ($appPermissao->add_media == true)
                                            <div style="float:left;">

                                                <form method="POST" action="{{ route('media.file.add') }}"
                                                    enctype="multipart/form-data" id="file-file-form">
                                                    @csrf
                                                    <input type="hidden" name="thisFolder" value="{{ $thisFolder }}"
                                                        id="this-folder-id" />
                                                    <label class="btn btn-primary mt-2 ml-1">
                                                        <i class="cil-plus"></i>
                                                        <i class="cil-file"></i>
                                                        Upload do Arquivo <input type="file" name="file"
                                                            id="file-file-input" hidden>
                                                    </label>

                                                </form>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-8">
                                        <table class="table table-striped table-bordered datatable">
                                            <tbody>
                                                @foreach ($mediaFolders as $mediaFolder)
                                                    <tr>
                                                        <td>
                                                            <a
                                                                href="{{ route('media.folder.index', ['id' => $mediaFolder->id]) }}">
                                                                <i class="cil-folder"></i>
                                                                {{ $mediaFolder->name }}
                                                            </a>
                                                        </td>
                                                        <td>

                                                        </td>
                                                        @if ($appPermissao->edit_media == true)
                                                            <td>
                                                                <button class="btn btn-primary file-change-folder-name"
                                                                    atr="{{ $mediaFolder->id }}">
                                                                    Renomear
                                                                </button>
                                                            </td>
                                                            <td>

                                                            </td>
                                                            <td>
                                                                <button class="btn btn-primary file-move-folder"
                                                                    atr="{{ $mediaFolder->id }}">
                                                                    Mover
                                                                </button>
                                                            </td>
                                                        @endif
                                                        <td>

                                                        </td>
                                                        @if ($appPermissao->delete_media == true)
                                                            <td>
                                                                @if ($mediaFolder->resource != 1)
                                                                    <button class="btn btn-danger file-delete-folder"
                                                                        atr="{{ $mediaFolder->id }}">
                                                                        Deletar
                                                                    </button>
                                                                @endif
                                                            </td>
                                                        @endif
                                                    </tr>
                                                @endforeach
                                                @foreach ($medias as $media)
                                                    <tr>
                                                        <td class="click-file" atr="{{ $media->id }}">
                                                            <i class="cil-file"></i>
                                                            {{ $media->name }}
                                                        </td>
                                                        <td>
                                                            <a href="<?php echo $media->getUrl(); ?>" class="btn btn-primary">
                                                                Abrir
                                                            </a>
                                                        </td>
                                                        @if ($appPermissao->edit_media == true)
                                                            <td>
                                                                <button class="btn btn-primary file-change-file-name"
                                                                    atr="{{ $media->id }}">
                                                                    Renomear
                                                                </button>
                                                            </td>
                                                            <td>
                                                                <a href="{{ route('media.file.copy', ['id' => $media->id, 'thisFolder' => $thisFolder]) }}"
                                                                    class="btn btn-primary">
                                                                    Cópiar
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <button class="btn btn-primary file-move-file"
                                                                    atr="{{ $media->id }}">
                                                                    Mover
                                                                </button>
                                                            </td>
                                                            <td>
                                                                <?php 
                                                $mime = explode('/', $media->mime_type);
                                                if($mime[0] === 'image'){
                                            ?>
                                                                <button class="btn btn-success file-cropp-file"
                                                                    atr="{{ $media->id }}">
                                                                    Cortar
                                                                </button>
                                                                <?php 
                                                }
                                            ?>
                                                            </td>
                                                        @endif
                                                        @if ($appPermissao->delete_media == true)
                                                            <td>
                                                                <button class="btn btn-danger file-delete-file"
                                                                    atr="{{ $media->id }}">
                                                                    Deletar
                                                                </button>

                                                                <!--
                                                <a 
                                                    class="btn btn-danger" 
                                                    href="{{ route('media.file.delete', ['id' => $media->id, 'thisFolder' => $thisFolder]) }}"
                                                >
                                                    Delete
                                                </a>
                                                -->
                                                            </td>
                                                        @endif
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-4">
                                        @if ($appPermissao->add_media and $appPermissao->edit_media == true)
                                            <div class="card border-primary" id="file-move-folder">
                                                <div class="card-header">
                                                    <h4>Mover Pasta</h4>
                                                </div>
                                                <div class="card-body">
                                                    <form method="post" action="{{ route('media.folder.move') }}">
                                                        @csrf
                                                        <input type="hidden" name="thisFolder" value="{{ $thisFolder }}">
                                                        <input type="hidden" name="id" value="" id="file-move-folder-id">
                                                        <table class="table table-striped table-bordered">
                                                            @if ($parentFolder !== 'disable')
                                                                <tr>
                                                                    <td>
                                                                        <input type="radio" name="folder" value="moveUp">
                                                                    </td>
                                                                    <td>
                                                                        Subir
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                            @foreach ($mediaFolders as $mediaFolder)
                                                                <tr>
                                                                    <td>
                                                                        <input type="radio" name="folder"
                                                                            value="{{ $mediaFolder->id }}"
                                                                            class="file-move-folder-radio">
                                                                    </td>
                                                                    <td>
                                                                        {{ $mediaFolder->name }}
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </table>
                                                        <button type="submit" class="btn btn-primary mt-3">Salvar</button>
                                                        <button type="button" class="btn btn-primary mt-3"
                                                            id="file-move-folder-cancel">Cancelar</button>
                                                    </form>
                                                </div>
                                            </div>

                                            <div class="card border-primary" id="file-move-file">
                                                <div class="card-header">
                                                    <h4>Mover arquivo</h4>
                                                </div>
                                                <div class="card-body">
                                                    <form method="post" action="{{ route('media.file.move') }}">
                                                        @csrf
                                                        <input type="hidden" name="thisFolder" value="{{ $thisFolder }}">
                                                        <input type="hidden" name="id" value="" id="file-move-file-id">
                                                        <table class="table table-striped table-bordered">
                                                            @if ($parentFolder !== 'disable')
                                                                <tr>
                                                                    <td>
                                                                        <input type="radio" name="folder" value="moveUp">
                                                                    </td>
                                                                    <td>
                                                                        Subir
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                            @foreach ($mediaFolders as $mediaFolder)
                                                                <tr>
                                                                    <td>
                                                                        <input type="radio" name="folder"
                                                                            value="{{ $mediaFolder->id }}">
                                                                    </td>
                                                                    <td>
                                                                        {{ $mediaFolder->name }}
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </table>
                                                        <button type="submit" class="btn btn-primary mt-3">Salvar</button>
                                                        <button type="button" class="btn btn-primary mt-3"
                                                            id="file-move-file-cancel">Cancelar</button>
                                                    </form>
                                                </div>
                                            </div>

                                            <div class="card border-primary" id="file-rename-file-card">
                                                <div class="card-header">
                                                    <h4>Renomear arquivo</h4>
                                                </div>
                                                <div class="card-body">
                                                    <form method="post" action="{{ route('media.file.update') }}">
                                                        @csrf
                                                        <input type="hidden" name="thisFolder" value="{{ $thisFolder }}">
                                                        <input type="hidden" name="id" value="" id="file-rename-file-id">
                                                        <input type="text" name="name" id="file-rename-file-name"
                                                            class="form-control">
                                                        <button type="submit" class="btn btn-primary mt-3">Salvar</button>
                                                        <button type="button" class="btn btn-primary mt-3"
                                                            id="file-rename-file-cancel">Cancelar</button>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="card border-primary" id="file-rename-folder-card">
                                                <div class="card-header">
                                                    <h4>Renomear Pasta</h4>
                                                </div>
                                                <div class="card-body">
                                                    <form method="post" action="{{ route('media.folder.update') }}">
                                                        @csrf
                                                        <input type="hidden" name="thisFolder" value="{{ $thisFolder }}">
                                                        <input type="hidden" name="id" value="" id="file-rename-folder-id">
                                                        <input type="text" name="name" id="file-rename-folder-name"
                                                            class="form-control">
                                                        <button type="submit" class="btn btn-primary mt-3">Salvar</button>
                                                        <button type="button" class="btn btn-primary mt-3"
                                                            id="file-rename-folder-cancel">Cancelar</button>
                                                    </form>
                                                </div>
                                            </div>
                                        <div class="card border-primary" id="file-info-card">
                                            <div class="card-header">
                                                <h4>File info</h4>
                                            </div>
                                            <div class="card-body">
                                                <table class="table table-striped table-bordered">
                                                    <tr>
                                                        <td>
                                                            Nome
                                                        </td>
                                                        <td id="file-div-name">

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Nome Real
                                                        </td>
                                                        <td id="file-div-real-name">

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            URL
                                                        </td>
                                                        <td id="file-div-url">

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            mime type
                                                        </td>
                                                        <td id="file-div-mime-type">

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Tamanho
                                                        </td>
                                                        <td id="file-div-size">

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Criado em
                                                        </td>
                                                        <td id="file-div-created-at">

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Atualizado em
                                                        </td>
                                                        <td id="file-div-updated-at">

                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        @endif
                                    </div>

                                    <div class="modal fade" id="remove-file-modal" tabindex="-1" role="dialog"
                                        aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Deletar arquivo</h4>
                                                    <button class="close" type="button" data-dismiss="modal"
                                                        aria-label="Close"><span aria-hidden="true">×</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Você tem certeza?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="{{ route('media.file.delete') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="thisFolder" value="{{ $thisFolder }}">
                                                        <input type="hidden" name="id" value="" id="file-delete-file-id">
                                                        <button class="btn btn-secondary" type="button"
                                                            data-dismiss="modal">Cancelar</button>
                                                        <button class="btn btn-primary" type="submit">Deletar</button>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- /.modal-content-->
                                        </div>
                                        <!-- /.modal-dialog-->
                                    </div>

                                    <div class="modal fade" id="remove-folder-modal" tabindex="-1" role="dialog"
                                        aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Deletar Pasta</h4>
                                                    <button class="close" type="button" data-dismiss="modal"
                                                        aria-label="Close"><span aria-hidden="true">×</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Se você excluir uma pasta, todas as subpastas e arquivos também serão
                                                        excluídos</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="{{ route('media.folder.delete') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="thisFolder" value="{{ $thisFolder }}">
                                                        <input type="hidden" name="id" value="" id="file-delete-folder-id">
                                                        <button class="btn btn-secondary" type="button"
                                                            data-dismiss="modal">Cancelar</button>
                                                        <button class="btn btn-primary" type="submit">Deletar</button>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- /.modal-content-->
                                        </div>
                                        <!-- /.modal-dialog-->
                                    </div>

                                    <div class="modal fade" id="cropp-img-modal" tabindex="-1" role="dialog"
                                        aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Cortar imagem</h4>
                                                    <button class="close" type="button" data-dismiss="modal"
                                                        aria-label="Close"><span aria-hidden="true">×</span></button>
                                                </div>
                                                <div class="modal-body">

                                                    <img src="" id="cropp-img-img" />


                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" type="button"
                                                        data-dismiss="modal">Cancelar</button>
                                                    <button class="btn btn-primary" type="button"
                                                        id="cropp-img-save-button">Salvar</button>
                                                </div>
                                            </div>
                                            <!-- /.modal-content-->
                                        </div>
                                        <!-- /.modal-dialog-->
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>


        <style>
            #cropp-img-img {
                max-width: 300px;
                max-height: 300px;
            }

        </style>


    @section('javascript')
        <script src="{{ asset('js/axios.min.js') }}"></script>
        <script src="{{ asset('js/cropper.js') }}"></script>
        <script src="{{ asset('js/media.js') }}"></script>
        <script src="{{ asset('js/media-cropp.js') }}"></script>

    @endsection
@endsection

@else
@include('errors.redirecionar')
@endif
