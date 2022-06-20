@if ($appPermissao->view_prayer == true)
<x-app-layout :assets="$assets ?? []">
  <div>
      <div class="row">
          <div class="col-sm-12 col-lg-12">
              <div class="card">
                  <div class="card-header d-flex justify-content-between">
                      <div class="header-title">
                          <h4 class="card-title">Pedidos de Oração</h4>
                      </div>
                    </div>
                    <div class="card-body">
                      <h4>Note: {{ $prayer->title }}</h4>
                        <br>
                        <h4>Author:</h4>
                        <p> {{ $prayer->user->name }}</p>
                        <h4>Title:</h4>
                        <p> {{ $prayer->title }}</p>
                        <h4>Content:</h4> 
                        <p>{{ $prayer->content }}</p>
                        <h4>Data de criação:</h4> 
                        <p>{{ $prayer->created_at }}</p>
                        <h4> Status: </h4>
                        <p>
                            <span class="{{ $prayer->status->class }}">
                              {{ $prayer->status->name }}
                            </span>
                        </p>
                        <h4>Note type:</h4>
                        <p>{{ $prayer->note_type }}</p>
                        <a class="btn btn-primary" href="{{ route('prayer.index') }}">Retornar</a>
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