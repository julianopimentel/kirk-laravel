<x-app-layout layout="boxedfancy" :assets="$assets ?? []">
    <div class="row">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">Criar nova Conta</h4>
                </div>
            </div>
            <div class="card-body">
                        <form method="POST" action="{{ route('account.update', $institution->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="d-flex align-items-start gap-5">
                                    <div class="nav flex-column nav-pills nav-iconly gap-5" id="v-pills-tab" role="tablist"
                                        aria-orientation="vertical">
                                        <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill"
                                            data-bs-target="#v-pills-home" type="button" role="tab"
                                            aria-controls="v-pills-home" aria-selected="true">
                                            <svg width="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M9.14373 20.7821V17.7152C9.14372 16.9381 9.77567 16.3067 10.5584 16.3018H13.4326C14.2189 16.3018 14.8563 16.9346 14.8563 17.7152V20.7732C14.8562 21.4473 15.404 21.9951 16.0829 22H18.0438C18.9596 22.0023 19.8388 21.6428 20.4872 21.0007C21.1356 20.3586 21.5 19.4868 21.5 18.5775V9.86585C21.5 9.13139 21.1721 8.43471 20.6046 7.9635L13.943 2.67427C12.7785 1.74912 11.1154 1.77901 9.98539 2.74538L3.46701 7.9635C2.87274 8.42082 2.51755 9.11956 2.5 9.86585V18.5686C2.5 20.4637 4.04738 22 5.95617 22H7.87229C8.19917 22.0023 8.51349 21.8751 8.74547 21.6464C8.97746 21.4178 9.10793 21.1067 9.10792 20.7821H9.14373Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                            <br>
                                            Home
                                        </button>
                                        <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill"
                                            data-bs-target="#v-pills-profile" type="button" role="tab"
                                            aria-controls="v-pills-profile" aria-selected="false">
                                            <svg width="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M11.997 15.1746C7.684 15.1746 4 15.8546 4 18.5746C4 21.2956 7.661 21.9996 11.997 21.9996C16.31 21.9996 19.994 21.3206 19.994 18.5996C19.994 15.8786 16.334 15.1746 11.997 15.1746Z"
                                                    fill="currentColor"></path>
                                                <path opacity="0.4"
                                                    d="M11.9971 12.5838C14.9351 12.5838 17.2891 10.2288 17.2891 7.29176C17.2891 4.35476 14.9351 1.99976 11.9971 1.99976C9.06008 1.99976 6.70508 4.35476 6.70508 7.29176C6.70508 10.2288 9.06008 12.5838 11.9971 12.5838Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                            <br>
                                            Endereço
                                        </button>
                                        <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill"
                                            data-bs-target="#v-pills-settings" type="button" role="tab"
                                            aria-controls="v-pills-settings" aria-selected="false">
                                            <svg width="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M12.0122 14.8299C10.4077 14.8299 9.10986 13.5799 9.10986 12.0099C9.10986 10.4399 10.4077 9.17993 12.0122 9.17993C13.6167 9.17993 14.8839 10.4399 14.8839 12.0099C14.8839 13.5799 13.6167 14.8299 12.0122 14.8299Z"
                                                    fill="currentColor"></path>
                                                <path opacity="0.4"
                                                    d="M21.2301 14.37C21.036 14.07 20.76 13.77 20.4023 13.58C20.1162 13.44 19.9322 13.21 19.7687 12.94C19.2475 12.08 19.5541 10.95 20.4228 10.44C21.4447 9.87 21.7718 8.6 21.179 7.61L20.4943 6.43C19.9118 5.44 18.6344 5.09 17.6226 5.67C16.7233 6.15 15.5685 5.83 15.0473 4.98C14.8838 4.7 14.7918 4.4 14.8122 4.1C14.8429 3.71 14.7203 3.34 14.5363 3.04C14.1582 2.42 13.4735 2 12.7172 2H11.2763C10.5302 2.02 9.84553 2.42 9.4674 3.04C9.27323 3.34 9.16081 3.71 9.18125 4.1C9.20169 4.4 9.10972 4.7 8.9462 4.98C8.425 5.83 7.27019 6.15 6.38109 5.67C5.35913 5.09 4.09191 5.44 3.49917 6.43L2.81446 7.61C2.23194 8.6 2.55897 9.87 3.57071 10.44C4.43937 10.95 4.74596 12.08 4.23498 12.94C4.06125 13.21 3.87729 13.44 3.59115 13.58C3.24368 13.77 2.93709 14.07 2.77358 14.37C2.39546 14.99 2.4159 15.77 2.79402 16.42L3.49917 17.62C3.87729 18.26 4.58245 18.66 5.31825 18.66C5.66572 18.66 6.0745 18.56 6.40153 18.36C6.65702 18.19 6.96361 18.13 7.30085 18.13C8.31259 18.13 9.16081 18.96 9.18125 19.95C9.18125 21.1 10.1215 22 11.3069 22H12.6968C13.872 22 14.8122 21.1 14.8122 19.95C14.8429 18.96 15.6911 18.13 16.7029 18.13C17.0299 18.13 17.3365 18.19 17.6022 18.36C17.9292 18.56 18.3278 18.66 18.6855 18.66C19.411 18.66 20.1162 18.26 20.4943 17.62L21.2097 16.42C21.5776 15.75 21.6083 14.99 21.2301 14.37Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                            <br>
                                            Configuração
                                        </button>
                                    </div>

                                    
                                <div class="tab-content iq-tab-fade-up" id="v-pills-tabContent">
                                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                                        aria-labelledby="v-pills-home-tab">
                                        <div class="card-body">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vulputate,
                                                ex ac venenatis mollis, diam nibh finibus leo</p>
                                            <div class="row g-3 needs-validation">
                                                <div class="col-md-6">
                                                    <label for="name" class="form-label">Nome da
                                                        Conta*</label>
                                                        <input class="form-control" type="text"
                                                        placeholder="{{ __('Name') }}" name="name_company"
                                                        value="{{ $institution->name_company }}" required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="doc" class="form-label">CNPJ</label>
                                                    <input class="form-control" type="text"
                                                            placeholder="{{ __('CNPJ') }}" name="doc"
                                                            pattern="[0-9]{2}.[0-9]{3}.[0-9]{3}/[0-9]{4}-[0-9]{2}"
                                                            value="{{ $institution->doc }}">
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="email"
                                                        class="form-label">E-mail</label>
                                                    <div class="input-group has-validation">
                                                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                                                        <input class="form-control" type="email"
                                                        placeholder="{{ __('E-Mail Address') }}" name="email"
                                                        value="{{ $institution->email }}">
                                                        <div class="invalid-feedback">
                                                            Please choose a e-mail.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="contato"
                                                        class="form-label">Contato</label>
                                                        <input class="form-control" id="phone" name="phone" type="tel"
                                                        value="{{ $institution->mobile }}">
                                                        <span id=" valid-msg" class="hide">✓ Valid</span>
                                                    <span id="error-msg" class="hide"></span>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="type" class="form-label">Tipo*</label>
                                                    <select class="form-select" id="type" name="type" required>
                                                        @foreach ($statuses as $status)
                                                        @if ($status->id == $institution->status_id)
                                                            <option value="{{ $status->id }}" selected="true">
                                                                {{ $status->name }}</option>
                                                        @else
                                                            <option value="{{ $status->id }}">
                                                                {{ $status->name }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Please select a valid type.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                                        aria-labelledby="v-pills-profile-tab">
                                        <div class="card-body">
                                            <div class="row g-3 needs-validation">
                                                <div class="col-md-12">
                                                    <label class="form-label">Address</label>
                                                    <input class="form-control" name="address1" type="text"
                                                        placeholder="Enter street name"
                                                        value="{{ $institution->address1 }}" maxlength="200">
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <label class="form-label">City</label>
                                                    <input class="form-control" name="city" type="text"
                                                            value="{{ $institution->city }}" placeholder="São Paulo">
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="form-label">State</label>
                                                    <input class="form-control" name="state" type="text"
                                                            value="{{ $institution->state }}" maxlength="2"
                                                            placeholder="SP">
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label">Postal Code</label>
                                                    <input class="form-control" name="cep" type="text"
                                                            placeholder="69059-627" pattern="[0-9]{5}-[0-9]{3}"
                                                            maxlength="9" value="{{ $institution->cep }}">
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Latitude</label>
                                                    <input class="form-control" name="lat" type="text"
                                                            placeholder="Enter your city" value="{{ $institution->lat }}"
                                                            maxlength="15" placeholder="-27.5859412">
                                                                <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Longitude</label>
                                                    <input class="form-control" name="lng" type="text"
                                                        placeholder="Enter your state" value="{{ $institution->lng }}"
                                                        maxlength="15" placeholder="-48.6003264">
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Country</label>
                                                    <input class="form-control" name="country" id="country" type="text"
                                                        placeholder="Country name" value="{{ $institution->country }}">
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel"
                                        aria-labelledby="v-pills-settings-tab">

                                        <div class="mb-3 form-check form-switch">
                                            <input class="form-check-input" type="checkbox" name="compartilhar_link" id="flexSwitchCheckChecked" {{ $institution->compartilhar_link == true ? 'checked' : '' }}>
                                            <label class="form-check-label" for="flexSwitchCheckChecked">Ativar módulo de cadastro rápido</label>
                                        </div>
                                        <p>
                                        <div class="col-md-12">
                                            <label for="link_compartilhar">Link para compartilhar</label>
                                            <div class="input-group">
                                                {{ env('APP_URL') }}/share/{{ $institution->unique_id }}
                                            </div>
                                        </div>
                                        <p>
                                        <div class="col-md-12">
                                            <label for="qrcode">QRCode para compartilhar</label>
                                            <div class="input-group">
                                                {!! QrCode::size(300)->generate(env('APP_URL') . '/share/' . $institution->unique_id) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <button class="btn btn-success" type="submit" title="Salvar"
                            data-toggle="modal" data-target="#exampleModalScrollable">Salvar</button>
                        <a href="{{ route('account.index') }}" class="btn btn-primary"
                            type="submit">Voltar</a>
                    </div>
                </div>
            </div>
    </div>
</div>
</form>

</x-app-layout>