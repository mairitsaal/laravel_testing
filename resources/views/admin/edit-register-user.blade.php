@extends('layouts.admin')

@section('title')
    Muuda kasutajat | Praktika
@endsection

@section('content')

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> MUUDA KASUTAJAT</h4>
                <div class="card-body">

                    <form method="POST" action="/update-role-register/{{ $users->id }}" ><!--class="was-validated" novalidate-->
                    @csrf

                    <!--Kasutaja nimi-->
                        <div class="form-group">
                            <label for="name" class="required-field">Kasutaja nimi</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="background-color:#fff; border: 1px solid #888888;" id="basic-addon1">
                                        <i class="fas fa-envelope-open-text fa-sm" style="color: #E60011;"></i>
                                    </span>
                                </div>
                                <input type="text" name="name" id="name" class="form-control" aria-label="Kasutaja nimi" aria-describedby="basic-addon1" style="border: 1px solid #888888;" required data-toggle="tooltip" rel="tooltip" data-placement="top" title="Kasutaja nimi" value="{{ $users->name }}">
                            </div>
                        </div>

                        <!--Telefon ja email-->
                        <div class="row d-flex">
                            <div class="form-group col-md-6" >
                                <label for="phone" class="required-field">Telefon</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="background-color:#ffffff; border: 1px solid #888888;" id="basic-addon1">
                                            <i class="fas fa-phone-square-alt fa-sm" style="color: #E60011;"></i>
                                        </span>
                                    </div>
                                    <input id="phone" type="text" name="phone" class="form-control" aria-label="Telefon" aria-describedby="basic-addon1" style="border: 1px solid #888888;" required data-toggle="tooltip" data-placement="top" title="Kasutaja number" value="{{ $users->phone }}">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email" class="required-field">Email</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="background-color:#ffffff; border: 1px solid #888888;" id="basic-addon1">
                                            <i class="fas fa-envelope-open-text fa-sm" style="color: #E60011;"></i>
                                        </span>
                                    </div>
                                    <input id="email" type="email" name="email" class="form-control" aria-label="Email" aria-describedby="basic-addon1" style="border: 1px solid #888888;" required data-toggle="tooltip" data-placement="top" title="Kasutaja email" value="{{ $users->email }}">
                                </div>
                            </div>
                        </div>

                        <!--Kasutaja roll-->
                        <div class="row d-flex" >
                            <div class="form-group col-md-6">
                                <label for="roll">Kasutaja roll</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="border: 1px solid #888888;" id="basic-addon1">
                                            <i class="fas fa-user fa-sm" style="color: #E60011;"></i>
                                        </span>
                                    </div>
                                    <select name="usertype" class="form-control label-control custom-select custom-select-lg">
                                        <option value="{{ $users->usertype }}">{{ $users->usertype }}</option>
                                        <option value="admin">Administraator</option>
                                        <option value="student">Õpilane</option>
                                        <option value="practiceBaseInstructor">Praktikajuhendaja</option>
                                        <option value="schoolInstructor">Koolijuhendaja</option>
                                        <option value="school">Kool</option>
                                        <option value="practiceBase">Praktikabaas</option>
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="position">{{ __('Amet') }}</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="background-color:#ffffff; border: 1px solid #888888;" id="basic-addon1">
                                            <i class="fas fa-user fa-sm" style="color: #E60011;"></i>
                                        </span>
                                    </div>
                                    <input id="position" type="text" name="position" class="form-control" aria-label="Amet" aria-describedby="basic-addon1" style="border: 1px solid #888888;" required data-toggle="tooltip" data-placement="top" title="Amet" value="{{ $users->position }}">
                                    @error('amet')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                            </div>
                        </div>


                </div>

                        <div>
                            <button type="submit" class="btn btn-danger">Muuda</button>
                            <a href="/dashboard" class="btn btn-success" style="margin-top:30px;">Tühista</a>
                            <a href="/role-register" class="btn btn-info" style="margin-top:30px;">Vaata tabelit</a>
                        </div>
                    </form>
                </div>
            </div>

        </div>


@endsection


@section('scripts')

@endsection
