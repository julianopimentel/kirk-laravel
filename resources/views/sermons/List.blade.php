@if ($appPermissao->view_sermons == true)
    <x-app-layout :assets="$assets ?? []">
        <div>
            @if ($appPermissao->add_sermons == true)
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Pedidos de Oração</h4>
                        </div>
                        <a href="{{ route('sermons.create') }}" class="btn btn-primary" title="Adicionar"><i
                                class="c-icon c-icon-sm cil-plus"></i> Adicionar</a>
                    </div>
                    <p>
                </div>
            @endif

            @foreach ($category as $category)
                @if (!$notes->isEmpty())
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">{{ $category->name }}</h4>
                            </div>
                            <a href="{{ route('sermons.indexCategory', $category->id) }}" class="btn btn-primary">
                                Ver todos
                            </a>
                        </div>
                        <div class="card-body" style="card-color: #adb5bd;">
                            <div class="row">
                                <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                                    <div class="row row-cols-1 row-cols-md-2 g-4">
                                        <div class="col">
                                            @foreach ($notes as $note)
                                                @php
                                                    $video = Youtube::getVideoInfo($note->codigo_url);
                                                    
                                                    $dateTime1 = new DateTime($note->applies_to_date);
                                                    $dateTime2 = new DateTime();
                                                    $interval = $dateTime1->diff($dateTime2);
                                                @endphp

                                                @if ($note->type == $category->id)
                                                    <div class="card">
                                                        <a href="{{ route('sermons.show', $note->id) }}">
                                                            <img src="{{ $video->snippet->thumbnails->high->url }}"
                                                                width="100%" height="100%"> </a>
                                                        <div class="card-body">
                                                            <h5 class="card-title"><a
                                                                    href="{{ route('sermons.show', $note->id) }}">{{ mb_strimwidth($note->title, 0, 45, '...') }}</a>
                                                            </h5>
                                                            @if ($note->status_id == 2)
                                                                <div class="article-badge">
                                                                    <div class="article-badge-item bg-danger"><i
                                                                            class="fas fa-fire"></i>
                                                                        Trending</div>
                                                                </div>
                                                            @elseif($interval->format('%d') < 7)
                                                                <div class="article-badge">
                                                                    <div class="article-badge-item bg-info"><i
                                                                            class="fas fa-fire"></i>
                                                                        {{ __('layout.new') }}</div>
                                                                </div>
                                                            @endif
                                                            <p class="card-text">
                                                                @php
                                                                    echo mb_strimwidth($note->content, 0, 145, '...');
                                                                @endphp</p>
                                                        </div>
                                                    </div>
                                                @endif
                                        </div>
                @endforeach
        </div>
        </div>
@endif
@endforeach



@if ($category->count() == 0)
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h4><strong>Palavras</strong></h4>
            </div>
            <div class="container-fluid">
                <div class="fade-in">
                    Não possuiu estudos vinculado ao seu grupo, fale com o administrador da conta
                </div>
            </div>
        </div>
@endif

</div>


</div>
</div>
</div>
</x-app-layout>
@else
@include('errors.redirecionar')
@endif
