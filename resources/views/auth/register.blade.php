@extends('layouts.admin')

@section('content')
    <div class="card col-md-12">
        <div class="card-header">
            <h4 class="card-title">LISA UUS KASUTAJA</h4>
            <div class="card-body p-4">

                <form method="POST" action="{{ route('register') }}">
                @csrf

                <!--Kasutaja nimi-->
                    <form>
                        <div class="form-group">
                            <label for="name" class="required-field">{{ __('Ees- ja perkonnanimi') }}</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="background-color:#fff; border: 1px solid #888888;" id="basic-addon1">
                                        <i class="fas fa-envelope-open-text fa-sm" style="color: #E60011;"></i>
                                    </span>
                                </div>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus aria-label="Kasutaja nimi" aria-describedby="basic-addon1" style="border: 1px solid #888888;" required data-toggle="tooltip" rel="tooltip" data-placement="top" title="Kasutaja nimi">

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row d-flex">
                            <div class="form-group col-md-6">
                                <label for="phone" class="required-field">{{ __('Telefon') }}</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="background-color:#ffffff; border: 1px solid #888888;" id="basic-addon1">
                                            <i class="fas fa-file-signature fa-sm" style="color: #E60011;"></i>
                                        </span>
                                    </div>
                                    <input type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus style="border: 1px solid #888888;" data-toggle="tooltip" data-placement="top" title="Telefon">
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email" class="required-field">{{ __('E-mail') }}</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="background-color:#ffffff; border: 1px solid #888888;" id="basic-addon1">
                                            <i class="fas fa-envelope-open-text fa-sm" style="color: #E60011;"></i>
                                        </span>
                                    </div>
                                    <input name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" aria-label="Email" aria-describedby="basic-addon1" style="border: 1px solid #888888;" data-toggle="tooltip" data-placement="top" title="Email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                            </div>
                        </div>
                        <div class="row d-flex">
                            <div class="form-group col-md-6">
                                <label for="password" class="required-field">{{ __('Parool') }}</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="background-color:#ffffff; border: 1px solid #888888;" id="basic-addon1">
                                            <i class="fas fa-key fa-sm" style="color: #E60011;"></i>
                                        </span>
                                    </div>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" aria-label="Telefon" aria-describedby="basic-addon1" required autocomplete="phone" autofocus style="border: 1px solid #888888;" data-toggle="tooltip" data-placement="top" title="Telefon">
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="password-confirm" class="required-field">{{ __('Parool uuesti') }}</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="background-color:#ffffff; border: 1px solid #888888;" id="basic-addon1">
                                            <i class="fas fa-key fa-sm" style="color: #E60011;"></i>
                                        </span>
                                    </div>
                                    <input id="password-confirm" type="password" class="form-control @error('email') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password" value="{{ old('email') }}" required autocomplete="email" aria-label="Email" aria-describedby="basic-addon1" style="border: 1px solid #888888;" data-toggle="tooltip" data-placement="top" title="Email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <!--Kasutaja roll-->
                        <div class="row d-flex" >
                            <div class="form-group col-md-6">
                                <label for="roll" class="required-field">Kasutaja roll</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="border: 1px solid #888888;" id="basic-addon1">
                                            <i class="fas fa-user fa-sm" style="color: #E60011;"></i>
                                        </span>
                                    </div>
                                    <select name="usertype" class="form-control label-control custom-select custom-select-lg">
                                        <option value="">Vali roll</option>
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
                                    <input id="position" type="text" class="form-control @error('position') is-invalid @enderror" name="position" required autocomplete="position" value="{{ old('position') }}" required autocomplete="position" aria-label="Amet" aria-describedby="basic-addon1" style="border: 1px solid #888888;" data-toggle="tooltip" data-placement="top" title="Amet">
                                    @error('amet')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong></span>
                                                @enderror
                                </div>
                            </div>



                                <label for="" class="mt-2">Lisa seos kursusega</label>
                                <div class="form-group col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                            <span class="input-group-text" style="border: 1px solid #888888;" id="basic-addon1">
                                <i class="fas fa-school fa-sm" style="color: #E60011;"></i>
                            </span>
                                        </div>
                                        <select name="speciality" class="custom-select custom-select-lg form-control input-lg">
                                            <option value="">Vali eriala</option>

                                            @foreach ($specialities as $key => $speciality)
                                                <option value="{{ $key }}">{{ $speciality }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                            <span class="input-group-text" style="border: 1px solid #888888;" id="basic-addon1">
                                <i class="fas fa-school fa-sm" style="color: #E60011;"></i>
                            </span>
                                        </div>
                                        <select name="course" class="custom-select custom-select-lg form-control input-lg">
                                            <option value="">Vali kursus</option>
                                        </select>
                                    </div>
                                </div>



                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-danger">
                                    {{ __('Registreeri') }}
                                </button>
                                <a href="/dashboard" class="btn btn-success" style="margin-top:30px;">Tühista</a>
                                <a href="/role-register" class="btn btn-info" style="margin-top:30px;">Vaata tabelit</a>
                            </div>
                        </div>
                    </form>
                </form>
            </div>
        </div>



@endsection
@section('scripts')

@endsection

