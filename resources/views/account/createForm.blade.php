@if (Auth::user()->isAdmin() == true)
    <x-app-layout layout="boxedfancy" :assets="$assets ?? []">
        <div class="row">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Criar nova Conta</h4>
                    </div>
                </div>
                <form method="POST" action="{{ route('account.store') }}"
                    onsubmit="this.enviar.value='Enviando...'; this.enviar.disabled=true;">
                    @csrf
                    <div class="card-body">
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
                                </div>
                                <div class="tab-content iq-tab-fade-up" id="v-pills-tabContent">
                                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                                        aria-labelledby="v-pills-home-tab">

                                        <div class="card-body">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vulputate,
                                                ex ac venenatis mollis, diam nibh finibus leo</p>
                                            <div class="row g-3 needs-validation">
                                                <div class="col-md-6">
                                                    <label for="account" class="form-label">Nome da
                                                        Conta*</label>
                                                    <input type="text" class="form-control" id="name_company"
                                                        placeholder="{{ __('Name') }}" id="name_company"
                                                        name="name_company" required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="doc" class="form-label">CNPJ</label>
                                                    <input type="text" class="form-control" id="doc"
                                                        placeholder="01.452.25/0001-19"
                                                        pattern="[0-9]{2}.[0-9]{3}.[0-9]{3}/[0-9]{4}-[0-9]{2}"
                                                        name="doc">
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="email" class="form-label">E-mail</label>
                                                    <div class="input-group has-validation">
                                                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                                                        <input type="email" class="form-control" id="email"
                                                            aria-describedby="inputGroupPrepend"
                                                            placeholder="{{ __('E-Mail Address') }}" name="email">
                                                        <div class="invalid-feedback">
                                                            Please choose a e-mail.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="phone" class="form-label">Contato</label>
                                                    <input class="form-control" id="phone" name="phone" type="tel">
                                                    <span id="valid-msg" class="hide">✓ Valid</span>
                                                    <span id="error-msg" class="hide"></span>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="type" class="form-label">Tipo*</label>
                                                    <select class="form-select" id="type" name="type" required>
                                                        @foreach ($statuses as $status)
                                                            <option value="{{ $status->id }}">{{ $status->name }}
                                                            </option>
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
                                                    <label for="address" class="form-label">Address</label>
                                                    <input class="form-control" name="address" type="text"
                                                        placeholder="Enter street name" maxlength="200">
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <label for="city" class="form-label">City</label>
                                                    <input class="form-control" name="city" type="text"
                                                        placeholder="Enter your city">
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="state" class="form-label">State</label>
                                                    <input class="form-control" name="state" type="text"
                                                        placeholder="State" placeholder="SP" maxlength="2">
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="cep" class="form-label">Postal Code</label>
                                                    <input class="form-control" name="cep" type="text"
                                                        placeholder="69059-627" maxlength="9"
                                                        pattern="[0-9]{5}-[0-9]{3}">
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="latitude" class="form-label">Latitude</label>
                                                    <input class="form-control" name="lat" type="text" maxlength="15"
                                                        placeholder="-27.5859412">
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="logintude" class="form-label">Longitude</label>
                                                    <input class="form-control" name="lng" type="text" maxlength="15"
                                                        placeholder="-48.6003264">
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="country" class="form-label">Country</label>
                                                    <input class="form-control" name="country" type="text"
                                                        placeholder="Country name" value="Brazil">
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <button id="botao" class="btn btn-success" type="submit" title="Salvar" name="enviar"
                                    data-toggle="modal" data-target="#exampleModalScrollable">Salvar</button>
                                <a href="{{ route('account.index') }}" class="btn btn-primary"
                                    type="submit">Voltar</a>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        </form>

        <!-- Modal -->
        <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">

                    <div class="modal-body">
                        Sua conta está sendo criada, por favor aguarde um momento.
                    </div>

                </div>
            </div>
        </div>

        <script>
            $(document).ready(function() {
                $('#name_company').on('input', function() {
                    $('#botao').prop('disabled', $(this).val().length < 6);
                });
            });
        </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </x-app-layout>
@else
    @include('errors.redirecionar')
@endif
