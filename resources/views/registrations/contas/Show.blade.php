@if ($appPermissao->settings_general == true)
    <x-app-layout :assets="$assets ?? []">
        <div>
            <div class="row">
                <div class="col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Contas Financeiras</h4>
                            </div>
                            <button class="btn btn-primary" type="submit" data-bs-toggle="modal"
                                data-bs-target="#storyCategory">Adicionar
                            </button>
                            @include('registrations.contas.add.Add')
                        </div>
                    </div>
                </div>
                @foreach ($categorys as $category)
                    <div class="col-lg-6 col-md-12">
                        <div class="row">
                            <div class="col-lg-12 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card credit-card-widget">
                                            <div class="pb-4 border-0 card-header">
                                                <div class="p-4 border border-white rounded primary-gradient-card">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div>
                                                            <h5 class="font-weight-bold">{{ $category->card_type }}
                                                            </h5>
                                                            <P class="mb-0">{{ $category->banco }}</P>
                                                        </div>
                                                        <div class="master-card-content">
                                                            <svg class="master-card-1" width="60" height="60"
                                                                viewBox="0 0 24 24">
                                                                <path fill="#ffffff"
                                                                    d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z" />
                                                            </svg>
                                                            <svg class="master-card-2" width="60" height="60"
                                                                viewBox="0 0 24 24">
                                                                <path fill="#ffffff"
                                                                    d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z" />
                                                            </svg>
                                                        </div>
                                                    </div>
                                                    <div class="my-4">
                                                        <div class="card-number">
                                                            <span
                                                                class="fs-5 me-2">{{ $category->card_number }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="mb-2 d-flex align-items-center justify-content-between">
                                                        <p class="mb-0">Card holder</p>
                                                        <p class="mb-0">Expire Date</p>
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <h6>{{ $category->card_name }}</h6>
                                                        <h6 class="ms-5">{{ $category->expire_date }}</h6>
                                                    </div>
                                                    <P class="mb-0">AG: {{ $category->agencia }} CONTA:
                                                        {{ $category->conta }}</P>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <div class="mb-3">
                                            <a href="#"
                                                class="btn btn-soft-primary border-primary border-1 border-dashed"
                                                data-bs-toggle="modal"
                                                data-bs-target="#updateCategory{{ $category->id }}">Edita</a>
                                            @include('registrations.contas.add.Edit')
                                        </div>
                                        <div class="mb-3">
                                            <form action="{{ route('registrations.destroyContas', [$category->id]) }}"
                                                method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-soft-danger border-danger border-1 border-dashed"
                                                    class="show_confirm" type="submit">Inativar</button>
                                            </form>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
    </x-app-layout>
@else
    @include('errors.redirecionar')
@endif
