@extends('layouts.admin')
@section('title', 'Lisa praktikaüksus')
@section('content')

        <div class="card col-md-12">
            <div class="card-header">
                <h4 class="card-title"> Lisa uus praktikaüksus</h4>
                       <div class="card-body p-4">

                           <!--Controlleri ja route lisamine-->
                           @if(Session::has('practiceUnit_created'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('practiceUnit_created') }}
                            </div>
                           @endif

                           <form method="POST" action="{{ route('practiceUnit.create') }}" ><!--class="was-validated" novalidate-->
                               @csrf

                               <!--Praktikaüksuse nimi-->
                               <div class="form-group col-md-6">
                                   <label for="nimi" class="required-field">Praktikaüksuse nimi</label>
                                   <div class="input-group">
                                       <div class="input-group-prepend">
                                           <span class="input-group-text" style="background-color:#fff; border: 1px solid #888888;" id="basic-addon1">
                                               <i class="fas fa-envelope-open-text fa-sm" style="color: #E60011;"></i>
                                           </span>
                                       </div>
                                       <input type="text" name="nimi" id="nimi" class="form-control" aria-label="Praktikaüksuse nimi" aria-describedby="basic-addon1" style="border: 1px solid #888888;" required data-toggle="tooltip" rel="tooltip" data-placement="top" title="Praktikaüksuse nimi">
                                   </div>
                               </div>
                               <div>
                                   <button type="submit" class="btn btn-danger">Lisa praktikaüksus</button>
                                   <a href="/dashboard" class="btn btn-success" style="margin-top:30px;">Tühista</a>
                                   <a href="/practiceUnits" class="btn btn-info" style="margin-top:30px;">Vaata tabelit</a>
                               </div>
                           </form>

                       </div>
                 </div>
        </div>
    </div>


<script>
    bootstrapValidate('#nimi', 'required:Sisesta praktikaüksuse nimi')

</script>

@endsection


