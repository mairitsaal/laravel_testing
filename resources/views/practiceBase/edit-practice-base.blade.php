@extends('layouts.app')
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Muuda praktikabaasi</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/a8018f10c4.js" crossorigin="anonymous"></script>
</head>
<style>
    .form-group {
        padding-top: 2px;
        padding-bottom: 2px;
    }
</style>
<body>
<section style="padding-top:60px">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="row d-flex mb-2">
                    <div class="col-10">
                        <h3 class="ml-4" style="color: #E60011">MUUDA PRAKTIKABAASI</h3>
                    </div>
                    <div class="col-2">
                        <a href="/practiceBases" class="btn btn-danger">Praktikabaasid</a>
                    </div>
                </div>
                <div class="card" style="border: 1px solid #EDEDED; background-color: #F5F5F5">
                    <div class="card-body p-4">

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
                                <label for="nimi">Praktikabaasi nimi</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                           <span class="input-group-text" style="background-color:#fff; border: 1px solid #888888;" id="basic-addon1">
                                               <i class="fas fa-envelope-open-text fa-sm" style="color: #E60011;"></i>
                                           </span>
                                    </div>
                                    <input type="text" name="nimi" class="form-control" aria-label="Praktikabaasi nimi" aria-describedby="basic-addon1" style="border: 1px solid #888888;" value="{{$practiceBase->nimi}}" />
                                </div>
                            </div>

                            <!--Lepingu number ja registri number-->
                            <div class="row d-flex">
                                <div class="form-group col-md-6">
                                    <label for="lepinguNr">Lepingu number</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                                   <span class="input-group-text" style="background-color:#ffffff; border: 1px solid #888888;" id="basic-addon1">
                                                       <i class="fas fa-file-contract fa-sm" style="color: #E60011;"></i>
                                                   </span>
                                        </div>
                                        <input type="text" name="lepinguNr" class="form-control" aria-label="Lepingu number" aria-describedby="basic-addon1" style="border: 1px solid #888888;" value="{{$practiceBase->lepinguNr}}" />
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="registriNr">Registri number</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                                   <span class="input-group-text" style="background-color:#ffffff; border: 1px solid #888888;" id="basic-addon1">
                                                       <i class="fas fa-file-contract fa-sm" style="color: #E60011;"></i>
                                                   </span>
                                        </div>
                                        <input type="text" name="registriNr" class="form-control" aria-label="Registri number" aria-describedby="basic-addon1" style="border: 1px solid #888888;" value="{{$practiceBase->registriNr}}" />
                                    </div>
                                </div>
                            </div>

                            <!--Aadress-->
                            <div class="form-group">
                                <label for="aadress">Aadress</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                           <span class="input-group-text" style="background-color:#ffffff; border: 1px solid #888888;" id="basic-addon1">
                                               <i class="fas fa-location-arrow fa-sm" style="color: #E60011"></i>
                                           </span>
                                    </div>
                                    <input type="text" name="aadress" class="form-control" aria-label="Praktikabaasi aadress" aria-describedby="basic-addon1" style="border: 1px solid #888888;" value="{{$practiceBase->aadress}}" />
                                </div>
                            </div>

                            <!--Telefon ja email-->
                            <div class="row d-flex">
                                <div class="form-group col-md-6">
                                    <label for="telefon">Telefon</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                               <span class="input-group-text" style="background-color:#ffffff; border: 1px solid #888888;" id="basic-addon1">
                                                   <i class="fas fa-phone-square-alt fa-sm" style="color: #E60011;"></i>
                                               </span>
                                        </div>
                                        <input type="text" name="telefon" class="form-control" aria-label="Telefon" aria-describedby="basic-addon1" style="border: 1px solid #888888;" value="{{$practiceBase->telefon}}" />
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                               <span class="input-group-text" style="background-color:#ffffff; border: 1px solid #888888;" id="basic-addon1">
                                                   <i class="fas fa-envelope-open-text fa-sm" style="color: #E60011;"></i>
                                               </span>
                                        </div>
                                        <input type="text" name="email" class="form-control" aria-label="Email" aria-describedby="basic-addon1" style="border: 1px solid #888888;" value="{{$practiceBase->email}}" />
                                    </div>
                                </div>
                            </div>

                            <!--Lepingu algus ja lepingu lõpp-->
                            <div class="bootstrap-iso">
                                <div class="container-fluid p-0">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="control-label" for="date">Lepingu algus</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                       <span class="input-group-text" style="background-color:#ffffff; border: 1px solid #888888;" id="basic-addon1">
                                                           <i class="fas fa-calendar-week fa-sm" style="color: #E60011;"></i>
                                                       </span>
                                                </div>
                                                <input class="form-control" id="date" name="lepinguAlgus" placeholder="yyyy/mm/dd" type="text" style="border: 1px solid #888888;" value="{{$practiceBase->lepinguAlgus}}" />
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="control-label" for="date">Lepingu lõpp</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                       <span class="input-group-text" style="background-color:#ffffff; border: 1px solid #888888;" id="basic-addon1">
                                                           <i class="fas fa-calendar-week fa-sm" style="color: #E60011;"></i>
                                                       </span>
                                                </div>
                                                <input class="form-control" id="date" name="lepinguLopp" placeholder="yyyy/mm/dd" type="text" style="border: 1px solid #888888;" value="{{$practiceBase->lepinguLopp}}"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--Lepingu allkirjastaja ja tunnihind-->
                            <div class="row d-flex">
                                <div class="form-group col-md-6">
                                    <label for="allkirjastaja">Lepingu allkirjastaja</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                               <span class="input-group-text" style="background-color:#ffffff; border: 1px solid #888888;" id="basic-addon1">
                                                   <i class="fas fa-file-signature fa-sm" style="color: #E60011;"></i>
                                               </span>
                                        </div>
                                        <input type="text" name="allkirjastaja" class="form-control" aria-label="Allkirjastaja" aria-describedby="basic-addon1" style="border: 1px solid #888888;" value="{{$practiceBase->allkirjastaja}}" />
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">Tunnihind</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                               <span class="input-group-text" style="background-color:#ffffff; border: 1px solid #888888;" id="basic-addon1">
                                                   <i class="fas fa-euro-sign fa-sm" style="color: #E60011;"></i>
                                               </span>
                                        </div>
                                        <input type="number" name="tunniHind" class="form-control" aria-label="Tunnihind" aria-describedby="basic-addon1" style="border: 1px solid #888888;" value="{{$practiceBase->tunniHind}}" />
                                    </div>
                                </div>
                            </div>

                            <!--Kontakt baasis-->
                            <div class="form-group">
                                <label for="kontaktBaasis">Kontakt baasis </label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                           <span class="input-group-text" style="background-color:#ffffff; border: 1px solid #888888;" id="basic-addon1">
                                               <i class="far fa-id-card fa-sm" style="color: #E60011;"></i>
                                           </span>
                                    </div>
                                    <input type="text" name="kontaktBaasis" class="form-control" aria-label="Kontakt baasis" aria-describedby="basic-addon1" style="border: 1px solid #888888;" value="{{$practiceBase->kontaktBaasis}}" />
                                </div>
                            </div>

                            <!--Märkused-->
                            <div class="form-group">
                                <label for="markused">Märkused</label>
                                <textarea name="markused" class="form-control" rows="3" style="border: 1px solid #888888;">{{$practiceBase->markused}}</textarea>
                            </div>

                            <button type="submit" class="btn btn-danger">Muuda</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Include jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<!-- Include Date Range Picker -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

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



<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

</body>
</html>
