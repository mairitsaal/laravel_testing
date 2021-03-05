@extends('layouts.admin')
@section('title', 'Lisa praktika osakond')
@section('content')

        <div class="card col-md-12">
            <div class="card-header">
                <h4 class="card-title">LISA PRAKTIKA OSAKOND</h4>
                <div class="card-body p-4">

                           <!--Controlleri ja route lisamine-->
                           @if(Session::has('practiceDepartment_created'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('practiceDepartment_created') }}
                            </div>
                           @endif

                           <form method="POST" action="{{ route('practiceDepartment.create') }}" ><!--class="was-validated" novalidate-->
                               @csrf

                               <!--Praktikaüksuse nimi-->
                               <div class="form-group col-md-12">
                                   <label for="nimi" class="required-field">Praktika osakonna nimi</label>
                                   <div class="input-group">
                                       <div class="input-group-prepend">
                                           <span class="input-group-text" style="background-color:#fff; border: 1px solid #888888;" id="basic-addon1">
                                               <i class="fas fa-envelope-open-text fa-sm" style="color: #E60011;"></i>
                                           </span>
                                       </div>
                                       <input type="text" name="nimi" id="nimi" class="form-control" aria-label="Praktika osakonna nimi" aria-describedby="basic-addon1" style="border: 1px solid #888888;" required data-toggle="tooltip" rel="tooltip" data-placement="top" title="Praktika osakonna nimi">
                                   </div>
                               </div>
                               <div class="form-group col-md-6">
                                   <label class="mt-3">Lisa praktika osakond praktikaüksusega</label>
                                   <div class="input-group">
                                       <div class="input-group-prepend">
                                               <span class="input-group-text" id="basic-addon1" style="border: 1px solid #888888;">
                                                   <i class="fas fa-graduation-cap fa-sm" style="color: #E60011;"></i>
                                               </span>
                                       </div>
                                       <select for="dropdown" class="form-control input-sm custom-select custom-select-lg" name="practice_unit_id">
                                           <option selected>Leia praktikaüksus</option>
                                           <option value=""></option>
                                           @foreach ($practiceUnit as $unit)
                                               <option value="{{ $unit->id }}">
                                                   {{ $unit->nimi }}
                                               </option>
                                           @endforeach

                                       </select>
                                   </div>
                               </div>
                               <div>
                                   <button type="submit" class="btn btn-danger">Lisa osakond</button>
                                   <a href="/dashboard" class="btn btn-success" style="margin-top:30px;">Tühista</a>
                                   <a href="/practiceDepartments" class="btn btn-info" style="margin-top:30px;">Vaata tabelit</a>
                               </div>
                           </form>
                       </div>
                 </div>
             </div>
         </div>

    <!--layouts.app-->

<!-- Include jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<!-- Include Date Range Picker -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>


<script>
    bootstrapValidate('#nimi', 'required:Sisesta praktikaüksuse nimi')

</script>

@endsection


