@extends('layouts.admin')
@section('title', 'Muuda kursust')
@section('content')

    <div class="card col-md-12">
        <div class="card-header">
            <h4 class="card-title">MUUDA KURSUST</h4>
            <div class="card-body p-4">
                <div>
                        <!--Controlleri ja route lisamine-->
                        @if(Session::has('course_updated'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('course_updated') }}
                            </div>
                        @endif

                        <form method="POST" action="{{route('course.update')}}">
                        @csrf
                            <input type="hidden" name="id" value="{{$course->id}}" />

                            <!--Kursuse nimi-->
                            <div class="row d-flex">
                                <div class="form-group col-md-6">
                                    <label for="nimi" class="required-field">Kursuse nimi</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                           <span class="input-group-text" style="background-color:#fff; border: 1px solid #888888;" id="basic-addon1">
                                               <i class="fas fa-envelope-open-text fa-sm" style="color: #E60011;"></i>
                                           </span>
                                        </div>
                                        <input type="text" name="nimi" id="nimi" class="form-control" aria-label="Kursuse nimi" aria-describedby="basic-addon1" style="border: 1px solid #888888;" required data-toggle="tooltip" rel="tooltip" data-placement="top" title="Kursuse nimi" value="{{$course->nimi}}">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="opilasteArv" class="required-field">Õpilaste arv</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                                   <span class="input-group-text" style="background-color:#ffffff; border: 1px solid #888888;" id="basic-addon1">
                                                       <i class="fas fa-file-contract fa-sm" style="color: #E60011;"></i>
                                                   </span>
                                        </div>
                                        <input type="text" name="opilasteArv" id="opilasteArv" class="form-control" aria-label="Õpilaste arv" aria-describedby="basic-addon1" style="border: 1px solid #888888;" required data-toggle="tooltip" data-placement="top" title="Õpilaste arv" value="{{$course->opilasteArv}}">
                                    </div>
                                </div>
                            </div>


                            <div>
                                <button type="submit" class="btn btn-danger">Muuda</button>
                                <a href="/dashboard" class="btn btn-success" style="margin-top:30px;">Tühista</a>
                                <a href="/courses" class="btn btn-info" style="margin-top:30px;">Vaata tabelit</a>
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
