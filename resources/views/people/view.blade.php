<!-- Modal Update Transaction-->
<div class="modal" id="ViewPeople{{ $people->id }}" tabindex="-1"
    aria-labelledby="ViewPeople{{ $people->id }}Title" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ViewPeople{{ $people->id }}Title">
                    @if ($people->sex == 'm')
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-gender-male" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M9.5 2a.5.5 0 0 1 0-1h5a.5.5 0 0 1 .5.5v5a.5.5 0 0 1-1 0V2.707L9.871 6.836a5 5 0 1 1-.707-.707L13.293 2H9.5zM6 6a4 4 0 1 0 0 8 4 4 0 0 0 0-8z" />
                        </svg>
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-gender-female" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M8 1a4 4 0 1 0 0 8 4 4 0 0 0 0-8zM3 5a5 5 0 1 1 5.5 4.975V12h2a.5.5 0 0 1 0 1h-2v2.5a.5.5 0 0 1-1 0V13h-2a.5.5 0 0 1 0-1h2V9.975A5 5 0 0 1 3 5z" />
                        </svg>
                    @endif
                    {{ $people->name }}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                            Email: {{ $people->email }}<br>
                            Mobile: {{ $people->mobile }}<br>
                            Birth: {{ $people->birth_at }}<br>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <address>
                                    <strong>Permissão:</strong> {{ $people->roleslocal->name }}<br>
                                </address>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <address>
                                    <div class="form-group row">
                                        <div class="col-md">
                                            <strong>Membresia:</strong>
                                        </div>
                                        <div class="col-md">
                                            <input class="form-check-input" type="checkbox"
                                                {{ $people->is_responsible == true ? 'checked' : '' }} disabled>
                                            <label class="form-check-label" for="check1">Responsável</label>
                                        </div>
                                        <div class="col-md">
                                            <input class="form-check-input" type="checkbox"
                                                {{ $people->is_visitor == true ? 'checked' : '' }} disabled>
                                            <label class="form-check-label" for="check2">Visitante</label>
                                        </div>
                                        <div class="col-md">
                                            <input class="form-check-input" type="checkbox"
                                                {{ $people->is_baptism == true ? 'checked' : '' }} disabled>
                                            <label class="form-check-label" for="check4">Batismo</label>
                                        </div>
                                        <div class="col-md">
                                            <input class="form-check-input" type="checkbox"
                                                {{ $people->is_transferred == true ? 'checked' : '' }} disabled>
                                            <label class="form-check-label" for="check5">Transferido</label>
                                        </div>
                                        <div class="col-md">
                                            <input class="form-check-input" type="checkbox"
                                                {{ $people->is_conversion == true ? 'checked' : '' }} disabled>
                                            <label class="form-check-label" for="check6">Convertido</label>
                                        </div>
                                    </div>
                                </address>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row mt-4">
                    <div class="col-md-12">
                        <address>
                            <strong>Grupos associados:</strong><br>
                        </address>
                    </div>
                    <div class="col-md-12">
                        <address>
                            <strong>Moram comigo:</strong><br>
                        </address>
                    </div>
                    <div class="col-md-12">
                        <address>
                            <strong>Note:</strong><br>
                        </address>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
