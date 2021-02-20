@extends('layouts.admin')
@section('title', 'Muuda praktika osakonda')
@section('content')

    <<div class="row">
        <div class="card col-sm-8">
            <div class="card-header">
                <h4 class="card-title">MUUDA PRAKTIKA OSAKONDA</h4>
                <div class="card-body p-4">

                        <!--Controlleri ja route lisamine-->
                        @if(Session::has('practiceDepartment_updated'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('practiceDepartment_updated') }}
                            </div>
                        @endif

                        <form method="POST" action="{{route('practiceDepartment.update')}}">
                        @csrf

                            <!-- Practice unit-->
                            <h6 class="ml-2" style="color: #E60011">Vali praktikaüksus</h6>
                            <select class="form-control input-sm mb-4" name="practice_unit_id">

                                <option>Praktikaüksus</option>

                                @foreach ($practiceUnits as $practiceUnit)
                                    <option value="{{ $practiceUnit->id }}">
                                        {{ $practiceUnit->nimi }}
                                    </option>
                                @endforeach
                            </select>

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
                            <button type="submit" class="btn btn-danger">Muuda praktika osakonda</button>
                            <a href="/dashboard" class="btn btn-success" style="margin-top:30px;">Tühista</a>
                            <a href="/practiceDepartments" class="btn btn-info" style="margin-top:30px;">Vaata tabelit</a>
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
