@extends('layouts.admin')
@section('title', 'Lisa eriala')
@section('content')


    <div class="card col-md-12">
        <div class="card-header">
            <h4 class="card-title">LISA ERIALA</h4>
            <div class="card-body p-4">
                <div>
                           <!--Controlleri ja route lisamine-->
                           @if(Session::has('speciality_created'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('speciality_created') }}
                            </div>
                           @endif

                           <form method="POST" action="{{ route('speciality.create') }}" ><!--class="was-validated" novalidate-->
                               @csrf

                               <!--Eriala nimi-->
                               <div class="form-group col-md-8">
                                   <label for="nimi" class="required-field">Eriala nimi</label>
                                   <div class="input-group">
                                       <div class="input-group-prepend">
                                           <span class="input-group-text" style="background-color:#fff; border: 1px solid #888888;" id="basic-addon1">
                                               <i class="fas fa-envelope-open-text fa-sm" style="color: #E60011;"></i>
                                           </span>
                                       </div>
                                       <input type="text" name="nimi" id="nimi" class="form-control" aria-label="Eriala nimi" aria-describedby="basic-addon1" style="border: 1px solid #888888;" required data-toggle="tooltip" rel="tooltip" data-placement="top" title="Eriala nimi">
                                   </div>
                               </div>
                               <!--Kasutaja roll-->
                               <div class="row d-flex">
                                   <div class="form-group col-md-3">
                                       <label for="kestvus" class="required-field">Kestvus</label>
                                       <select name="kestvus" class="form-control label-control" style="border: 1px solid #888888;">

                                           <option value="0.6">6 kuud</option>
                                           <option value="1">1 aasta</option>
                                           <option value="1.6">1 aasta ja 6 kuud</option>
                                           <option value="2">2 aastat</option>
                                           <option value="2.6">2 aastat ja 6 kuud</option>
                                           <option></option>

                                       </select>
                                   </div>

                                   <div class="form-group col-md-3">
                                       <label for="oppevorm" class="required-field">Õppevorm</label>
                                       <select name="oppevorm" class="form-control label-control" style="border: 1px solid #888888;">

                                           <option>Statsionaar</option>
                                           <option>Sessioonõpe</option>
                                           <option>Töökohapõhine õpe</option>
                                           <option>Osakoormusega</option>
                                           <option></option>

                                       </select>
                                   </div>
                               </div>



                               <div>
                                   <button type="submit" class="btn btn-danger">Lisa eriala</button>
                                   <a href="/dashboard" class="btn btn-success" style="margin-top:30px;">Tühista</a>
                                   <a href="/specialities" class="btn btn-info" style="margin-top:30px;">Vaata tabelit</a>
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


