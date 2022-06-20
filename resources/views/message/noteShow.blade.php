@if ($appPermissao->view_message == true)
<x-app-layout :assets="$assets ?? []">
  <div>
      <div class="row">
          <div class="col-sm-12 col-lg-12">
              <div class="card">
                  <div class="card-header d-flex justify-content-between">
                      <div class="header-title">
                          <h4 class="card-title">{{ $note->title }}</h4>
                      </div>
                  </div>
                    <div class="card-body">
                        <h4>Texto:</h4> 
                        <p>
                          @php
                            echo $note->content;
                          @endphp
                        </p>
                        <br>
                        <h4>Applies to date:</h4> 
                        <p>{{ $note->applies_to_date }}</p>
                        <h4> Status: </h4>
                        <p>
                            <span class="{{ $note->status->class }}">
                              {{ $note->status->name }}
                            </span>
                        </p>
                        <h4>Note type:</h4>
                        <p>{{ $note->note_type }}</p>
                        <br>
                        Autor: {{ $note->user->name }}</p>
                        <a class="btn btn-primary" href="{{ route('message.index') }}">Retornar</a>
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