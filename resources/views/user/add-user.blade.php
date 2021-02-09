@extends('layouts.master')
@section('title', 'Lisa kasutaja')
@section('content')

    <section>
        <div class="container ">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="row d-flex mb-2">
                        <div class="col-6">
                            <h3 class="ml-4" style="color: #E60011">LISA KASUTAJA</h3>
                        </div>
                        <div class="col-6">
                            <a href="/practiceBases" class="btn btn-outline-danger mr-4">Praktikabaasid</a>
                            <a href="/practiceUnits" class="btn btn-outline-danger mr-4">Praktikaüksused</a>
                            <a href="/users" class="btn btn-outline-danger mr-4">Kasutajad</a>
                        </div>
                    </div>
                    <div class="card" style="border: 1px solid #EDEDED; background-color: #F5F5F5">
                        <div class="card-body p-4">

                            <!--Controlleri ja route lisamine
                            @if(Session::has('user_created'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('user_created') }}
                                </div>-->
                            @endif

                            <form method="POST" action="{{ route('user.create') }}" ><!--class="was-validated" novalidate-->
                            @csrf

                            <!--Kasutaja nimi-->
                                <div class="form-group">
                                    <label for="nimi" class="required-field">Kasutaja nimi</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                           <span class="input-group-text" style="background-color:#fff; border: 1px solid #888888;" id="basic-addon1">
                                               <i class="fas fa-envelope-open-text fa-sm" style="color: #E60011;"></i>
                                           </span>
                                        </div>
                                        <input type="text" name="nimi" id="nimi" class="form-control" aria-label="Kasutaja nimi" aria-describedby="basic-addon1" style="border: 1px solid #888888;" required data-toggle="tooltip" rel="tooltip" data-placement="top" title="Kasutaja nimi">
                                    </div>
                                </div>

                                <!--Telefon ja email-->
                                <div class="row d-flex">
                                    <div class="form-group col-md-6">
                                        <label for="telefon" class="required-field">Telefon</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                               <span class="input-group-text" style="background-color:#ffffff; border: 1px solid #888888;" id="basic-addon1">
                                                   <i class="fas fa-phone-square-alt fa-sm" style="color: #E60011;"></i>
                                               </span>
                                            </div>
                                            <input id="telefon" type="text" name="telefon" class="form-control" aria-label="Telefon" aria-describedby="basic-addon1" style="border: 1px solid #888888;" required data-toggle="tooltip" data-placement="top" title="Kasutaja number">
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
                                            <input id="email" type="email" name="email" class="form-control" aria-label="Email" aria-describedby="basic-addon1" style="border: 1px solid #888888;" required data-toggle="tooltip" data-placement="top" title="Kasutaja email">
                                        </div>
                                    </div>
                                </div>

                                <!--Kasutaja roll-->
                                <div class="row d-flex">
                                    <div class="form-group col-md-6">
                                        <label for="roll">Kasutaja roll</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                               <span class="input-group-text" style="background-color:#ffffff; border: 1px solid #888888;" id="basic-addon1">
                                                   <i class="fas fa-file-signature fa-sm" style="color: #E60011;"></i>
                                               </span>
                                            </div>
                                            <input type="text" name="roll" id="roll" class="form-control selectpicker" aria-label="Roll" aria-describedby="basic-addon1" style="border: 1px solid #888888;" data-toggle="tooltip" data-placement="top" title="Kasutaja roll andmebaasis">

                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-danger">Lisa kasutaja</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--layouts.app-->

    <!-- Include jQuery -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

    <!-- Include Date Range Picker -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>


    <script >
        $(document).ready(function(){
            $("[rel=tooltip]").tooltip({ placement: 'top'});
        });
    </script>

    <script>
        bootstrapValidate('#nimi', 'required:Sisesta praktikabaasi nimi')
        bootstrapValidate('#email', 'email:Sisesta korrektne email, näiteks mari@nooruse.ee')
        bootstrapValidate('#telefon', 'numeric:Sisesta telefoninumbrer')
    </script>

@endsection


