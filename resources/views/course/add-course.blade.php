@extends('layouts.admin')
@section('title', 'Lisa kursus')
@section('content')


    <div class="card col-md-12">
        <div class="card-header">
            <h4 class="card-title">LISA KURSUS</h4>
            <div class="card-body p-4">
                <div>
                           <!--Controlleri ja route lisamine-->
                           @if(Session::has('course_created'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('course_created') }}
                            </div>
                           @endif

                           <form method="POST" action="{{ route('course.create') }}" ><!--class="was-validated" novalidate-->
                               @csrf

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
                                       <input type="text" name="nimi" id="nimi" class="form-control" aria-label="Kursuse nimi" aria-describedby="basic-addon1" style="border: 1px solid #888888;" required data-toggle="tooltip" rel="tooltip" data-placement="top" title="Kursuse nimi">
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
                                           <input type="text" name="opilasteArv" id="opilasteArv" class="form-control" aria-label="Õpilaste arv" aria-describedby="basic-addon1" style="border: 1px solid #888888;" required data-toggle="tooltip" data-placement="top" title="Õpilaste arv">
                                       </div>
                                   </div>
                               </div>

                               <div>
                                   <button type="submit" class="btn btn-danger">Lisa kursus</button>
                                   <a href="/dashboard" class="btn btn-success" style="margin-top:30px;">Tühista</a>
                                   <a href="/courses" class="btn btn-info" style="margin-top:30px;">Vaata tabelit</a>
                               </div>
                           </form>
                       </div>
                 </div>
             </div>
         </div>
     </div>

    <!--layouts.app-->



<script>
    bootstrapValidate('#nimi', 'required:Sisesta eriala nimi')
    bootstrapValidate('#kestvus', 'integer:Sisesta ainult numbrid')



</script>

@endsection


