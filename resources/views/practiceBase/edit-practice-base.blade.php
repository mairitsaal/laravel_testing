@extends('layouts.admin')
@section('title', 'Muuda praktikabaasi')
@section('content')

    <div class="card col-md-12">
        <div class="card-header">
            <h4 class="card-title">MUUDA PRAKTIKABAASI</h4>
            <div class="card-body p-4">
                <div>
                        <!--Controlleri ja route lisamine-->
                        @if(Session::has('practiceBase_updated'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('practiceBase_updated') }}
                            </div>
                        @endif

                        <form method="POST" action="{{route('practiceBase.update')}}">
                        @csrf
                            <input type="hidden" name="id" value="{{$practiceBase->id}}" />

                            <!--Praktikabaasi nimi-->
                            <div class="form-group">
                                <label for="nimi" class="required-field">Praktikabaasi nimi</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                           <span class="input-group-text" style="background-color:#fff; border: 1px solid #888888;" id="basic-addon1">
                                               <i class="fas fa-envelope-open-text fa-sm" style="color: #E60011;"></i>
                                           </span>
                                    </div>
                                    <input type="text" name="nimi" id="nimi" class="form-control" aria-label="Praktikabaasi nimi" aria-describedby="basic-addon1" style="border: 1px solid #888888;" required data-toggle="tooltip" data-placement="top" title="Praktikabaasi nimi" value="{{$practiceBase->nimi}}">
                                </div>
                            </div>

                            <!--Lepingu number ja registri number-->
                            <div class="row d-flex">
                                <div class="form-group col-md-6">
                                    <label for="lepinguNr" class="required-field">Lepingu number</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                                   <span class="input-group-text" style="background-color:#ffffff; border: 1px solid #888888;" id="basic-addon1">
                                                       <i class="fas fa-file-contract fa-sm" style="color: #E60011;"></i>
                                                   </span>
                                        </div>
                                        <input type="text" name="lepinguNr" id="lepinguNr" class="form-control" aria-label="Lepingu number" aria-describedby="basic-addon1" style="border: 1px solid #888888;" required data-toggle="tooltip" data-placement="top" title="Lepingu number" value="{{$practiceBase->lepinguNr}}">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="registriNr" class="required-field">Registri number</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                                   <span class="input-group-text" style="background-color:#ffffff; border: 1px solid #888888;" id="basic-addon1">
                                                       <i class="fas fa-file-contract fa-sm" style="color: #E60011;"></i>
                                                   </span>
                                        </div>
                                        <input type="text" name="registriNr" id="registriNr" class="form-control" aria-label="Registri number" aria-describedby="basic-addon1" style="border: 1px solid #888888;" required data-toggle="tooltip" data-placement="top" title="Ettevõtte registri number" value="{{$practiceBase->registriNr}}">
                                    </div>
                                </div>
                            </div>

                            <!--Aadress-->
                            <div class="form-group">
                                <label for="aadress" class="required-field">Aadress</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                           <span class="input-group-text" style="background-color:#ffffff; border: 1px solid #888888;" id="basic-addon1">
                                               <i class="fas fa-location-arrow fa-sm" style="color: #E60011"></i>
                                           </span>
                                    </div>
                                    <input type="text" name="aadress" id="aadress" class="form-control" aria-label="Praktikabaasi aadress" aria-describedby="basic-addon1" style="border: 1px solid #888888;" required data-toggle="tooltip" data-placement="top" title="Praktikabaasi aadress" value="{{$practiceBase->aadress}}">
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
                                        <input id="telefon" type="text" name="telefon" class="form-control" aria-label="Telefon" aria-describedby="basic-addon1" style="border: 1px solid #888888;" required data-toggle="tooltip" data-placement="top" title="Praktikabaasi telefoni number" value="{{$practiceBase->telefon}}">
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
                                        <input id="email" type="email" name="email" class="form-control" aria-label="Email" aria-describedby="basic-addon1" style="border: 1px solid #888888;" required data-toggle="tooltip" data-placement="top" title="TPraktikabaasi email" value="{{$practiceBase->email}}">
                                    </div>
                                </div>
                            </div>

                            <!--Lepingu algus ja lepingu lõpp-->
                            <div class="bootstrap-iso">
                                <div class="container-fluid p-0">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="control-label required-field" for="date">Lepingu algus</label>
                                            <div class="input-group d-flex">
                                                <div class="input-group-prepend">
                                                       <span class="input-group-text" style="background-color:#ffffff; border: 1px solid #888;" id="basic-addon1">
                                                           <i class="fas fa-calendar-week fa-sm"></i>
                                                       </span>
                                                </div>
                                                <input class="form-control" id="date" name="lepinguAlgus" placeholder="yyyy-mm-dd" type="text" style="border: 1px solid #888;" data-toggle="tooltip" data-placement="top" title="Lepingu algus kuupäev" value="{{$practiceBase->lepinguAlgus}}"/>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label class="control-label required-field" for="date">Lepingu lõpp</label>
                                            <div class="input-group d-flex">
                                                <div class="input-group-prepend">
                                                       <span class="input-group-text" style="background-color:#ffffff; border: 1px solid #888888;" id="basic-addon1">
                                                           <i class="fas fa-calendar-week fa-sm" style="color: #E60011;"></i>
                                                       </span>
                                                </div>
                                                <input class="form-control" id="date" name="lepinguLopp" placeholder="yyyy-mm-dd" type="text" style="border: 1px solid #888888;" data-toggle="tooltip" data-placement="top" title="Lepingu lõpp kuupäev" value="{{$practiceBase->lepinguLopp}}"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!--Lepingu allkirjastaja ja tunnihind-->
                            <div class="row d-flex">
                                <div class="form-group col-md-6">
                                    <label for="allkirjastaja" class="required-field">Lepingu allkirjastaja</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                               <span class="input-group-text" style="background-color:#ffffff; border: 1px solid #888888;" id="basic-addon1">
                                                   <i class="fas fa-file-signature fa-sm" style="color: #E60011;"></i>
                                               </span>
                                        </div>
                                        <input type="text" name="allkirjastaja" id="allkirjastaja" class="form-control" aria-label="Allkirjastaja" aria-describedby="basic-addon1" style="border: 1px solid #888888;" data-toggle="tooltip" data-placement="top" title="Praktikabaasi poolne lepingu allkirjastaja" value="{{$practiceBase->allkirjastaja}}">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="tunniHind" class="required-field">Tunnihind</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                               <span class="input-group-text" style="background-color:#ffffff; border: 1px solid #888888;" id="basic-addon1">
                                                   <i class="fas fa-euro-sign fa-sm" style="color: #E60011;"></i>
                                               </span>
                                        </div>
                                        <input name="tunniHind" id="tunniHind" class="form-control" aria-label="Tunnihind" placeholder="0.00" aria-describedby="basic-addon1" style="border: 1px solid #888888;" data-toggle="tooltip" data-placement="top" title="Tunnihind praktikanditel" value="{{$practiceBase->tunniHind}}">
                                    </div>
                                </div>
                            </div>

                            <!--Kontakt baasis-->
                            <div class="form-group">
                                <label for="kontaktBaasis">Kontakt baasis</label>
                                <div class="input-group">
                                    <textarea type="text" name="kontaktBaasis" id="kontaktBaasis" class="form-control" aria-label="Kontakt baasis" rows="1" style="border: 1px solid #888888; margin-left: 40px !important;" data-toggle="tooltip" data-placement="top" title="Kontakt baasis">{{$practiceBase->kontaktBaasis}}</textarea>
                                </div>
                            </div>

                            <!--Märkused-->
                            <div class="form-group pr-5">
                                <label for="markused">Märkused</label>
                                <textarea type="text" name="markused" id="markused" class="form-control" rows="3" style="border: 1px solid #888888; margin-left: 40px !important;" data-toggle="tooltip" data-placement="top" title="Vajalikud märkused">{{$practiceBase->markused}}</textarea>
                            </div>

                            <div>
                                <button type="submit" class="btn btn-danger">Muuda</button>
                                <a href="/dashboard" class="btn btn-success" style="margin-top:30px;">Tühista</a>
                                <a href="/practiceBases" class="btn btn-info" style="margin-top:30px;">Vaata tabelit</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Include jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<!-- Include Date Range Picker -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

<script>
    $(document).ready(function(){
        var date_input=$('input[name="lepinguAlgus"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        date_input.datepicker({
            format: 'yyyy/mm/dd',
            container: container,
            todayHighlight: true,
            autoclose: true,
        })
    })
</script>
<script>
    $(document).ready(function(){
        var date_input=$('input[name="lepinguLopp"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        date_input.datepicker({
            format: 'yyyy/mm/dd',
            container: container,
            todayHighlight: true,
            autoclose: true,
        })
    })
</script>
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>

<script>
    bootstrapValidate('#nimi', 'required:Sisesta praktikabaasi nimi')
    bootstrapValidate('#lepinguNr', 'required:Sisesta lepingu number')
    bootstrapValidate('#registriNr', 'integer:Sisesta ainult numbrid')
    bootstrapValidate('#aadress', 'required:Sisesta praktikabaasi aadress')
    bootstrapValidate('#email', 'email:Sisesta korrektne email, näiteks mari@nooruse.ee')
    bootstrapValidate('#telefon', 'numeric:Sisesta telefoninumbrer')
    bootstrapValidate('#date', 'ISO8601:Sisesta kuupäev YYYY-MM-DD')
    //bootstrapValidate('#date', 'ISO8601:Sisesta kuupäev YYYY-MM-DD')
    bootstrapValidate('#allkirjastaja', 'required:Sisesta praktikabaasi poolne allkirjastaja')


</script>


@endsection
