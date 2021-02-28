@extends('layouts.admin')
@section('title', 'Lisa eriala')
@section('content')


    <div class="card col-md-12">
        <div class="card-header">
            <h4 class="card-title">LISA ERIALA</h4>
            <div class="card-body">
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
                               <div class="form-group col-md-12 m-0 p-0">
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
                                   <div class="row d-flex" >
                                       <div class="form-group col-md-4">
                                           <label for="oppekava">Õppekava</label>
                                           <div class="input-group">
                                               <div class="input-group-prepend">
                                               <span class="input-group-text" style="border: 1px solid #888888;" id="basic-addon1">
                                                   <i class="fas fa-school fa-sm" style="color: #E60011;"></i>
                                               </span>
                                               </div>
                                               <select name="oppekava" class="form-control label-control custom-select custom-select-lg">
                                                   <option value="Rakenduskõrgharidus">Rakenduskõrgharidus</option>
                                                   <option value="Kutseõpe">Kutseõpe</option>
                                                   <option value="Magistriõpe">Magistriõpe</option>
                                                   <option value=""></option>
                                               </select>
                                           </div>
                                       </div>
                                       <div class="form-group col-md-4">
                                           <label for="oppevorm">Õppevorm</label>
                                           <div class="input-group">
                                               <div class="input-group-prepend">
                                               <span class="input-group-text" style="border: 1px solid #888888;" id="basic-addon1">
                                                   <i class="fas fa-graduation-cap fa-sm" style="color: #E60011;"></i>
                                               </span>
                                               </div>
                                               <select name="oppevorm" class="form-control label-control custom-select custom-select-lg">
                                                   <option value=Sessioonõpe">Sessioonõpe</option>
                                                   <option value="Töökohapõhine">Töökohapõhine õpe</option>
                                                   <option value="Statsionaar">Statsionaarne õpe</option>
                                                   <option value="Osakoormusega">Osakoormusega</option>
                                                   <option value=""></option>
                                               </select>
                                           </div>
                                       </div>
                                       <div class="form-group col-md-4">
                                           <label for="kestvus">Õppetöö kestvus</label>
                                           <div class="input-group">
                                               <div class="input-group-prepend">
                                               <span class="input-group-text" style="border: 1px solid #888888;" id="basic-addon1">
                                                   <i class="fas fa-hourglass-half fa-sm" style="color: #E60011;"></i>
                                               </span>
                                               </div>
                                               <select name="kestvus" class="form-control label-contro custom-select custom-select-lgl">
                                                   <option value="0.6">Pool aastat</option>
                                                   <option value="1.0">Üks aasta</option>
                                                   <option value="1.6">Poolteist aastat</option>
                                                   <option value="2.0">Kaks aastat</option>
                                                   <option value="2.6">Kaks ja pool aastat</option>
                                                   <option value="3.0">Kolm aastat</option>
                                                   <option value="3.6">Kolm ja pool aastat</option>
                                                   <option value="4.0">Neli aastat</option>
                                                   <option value="4.6">Neli ja pool aastat</option>
                                                   <option value=""></option>
                                               </select>
                                           </div>
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

<script>
    bootstrapValidate('#nimi', 'required:Sisesta eriala nimi')
    bootstrapValidate('#kestvus', 'integer:Sisesta ainult numbrid')
</script>

@endsection
@section('scripts')

@endsection

