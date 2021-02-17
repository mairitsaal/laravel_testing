@extends('layouts.master')
@section('title', 'Muuda praktikaüksust')
@section('content')

<section style="padding-top:60px">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="row d-flex mb-2">
                    <div class="col-6">
                        <h3 class="ml-4" style="color: #E60011">MUUDA PRAKTIKAÜKSUST</h3>
                    </div>
                    <div class="col-6">
                        <a href="/practiceBases" class="btn btn-outline-danger mr-4">Praktikabaasid</a>
                        <a href="/practiceUnits" class="btn btn-outline-danger mr-4">Praktikaüksused</a>
                        <a href="/practiceDepartments" class="btn btn-outline-danger mr-4">Praktika osakonnad</a>
                    </div>
                </div>
                <div class="card" style="border: 1px solid #EDEDED; background-color: #F5F5F5">
                    <div class="card-body p-4">

                        <!--Controlleri ja route lisamine-->
                        @if(Session::has('practiceDepartment_updated'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('practiceDepartment_updated') }}
                            </div>
                        @endif

                        <form method="POST" action="{{route('practiceDepartment.update')}}">
                        @csrf
                            <input type="hidden" name="id" value="{{$practiceDepartment->id}}" />

                            <!--Praktikabaasi nimi-->
                            <div class="form-group">
                                <label for="nimi" class="required-field">Praktika osakonna nimi</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                           <span class="input-group-text" style="background-color:#fff; border: 1px solid #888888;" id="basic-addon1">
                                               <i class="fas fa-envelope-open-text fa-sm" style="color: #E60011;"></i>
                                           </span>
                                    </div>
                                    <input type="text" name="nimi" id="nimi" class="form-control" aria-label="Praktikaosakonna nimi" aria-describedby="basic-addon1" style="border: 1px solid #888888;" required data-toggle="tooltip" data-placement="top" title="Praktikaüksuse nimi" value="{{$practiceDepartment->nimi}}">
                                </div>
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
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>

<script>
    bootstrapValidate('#nimi', 'required:Sisesta praktikaüksuse nimi')

</script>


<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

@endsection
