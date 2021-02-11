@extends('layouts.admin')

@section('title')
    Muuda kasutajat | Praktika
@endsection


@section('content')
    <div class="row">
        <div class="col-12 ">
            <div class="card" style="border: 1px solid #EDEDED; background-color: #F5F5F5">
                <h3 class="ml-4 mt-2 mb-0" style="color: #E60011">MUUDA KASUTAJAT</h3>
                <div class="card-body p-4">



                    <form method="POST" action="/update-role-register/{{ $users->id }}" ><!--class="was-validated" novalidate-->

                    @csrf

                    <!--Kasutaja nimi-->
                        <div class="form-group">
                            <label for="name">Kasutaja nimi</label>
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
                            <div class="form-group col-md-6">
                                <label for="phone" >Telefon</label>
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
                        <div class="row d-flex">
                            <div class="form-group col-md-6">
                                <label for="roll">Kasutaja roll</label>
                                <select name="usertype" class="form-control">
                                    <option value="admin">Admin</option>
                                    <option value="student">Student</option>
                                    <option value="practiceBaseInstructor">Practice Base Instructor</option>
                                    <option value="schoolInstructor">School Instructor</option>
                                    <option value="school">School</option>
                                    <option value="practiceBase">Practice Base</option>
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-danger">Muuda kasutajat</button>
                        <a href="/role-register" class="btn btn-warning">Tühista</a>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection


@section('scripts')

@endsection
