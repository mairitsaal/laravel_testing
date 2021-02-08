@extends('layouts.master')
@section('title', 'Lisa praktikaüksus')
@section('content')

<section>
     <div class="container ">
         <div class="row justify-content-center">
             <div class="col-md-10">
                 <div class="row d-flex mb-2">
                     <div class="col-8">
                         <h3 class="ml-4" style="color: #E60011">LISA PRAKTIKAÜKSUS</h3>
                     </div>
                    <div class="col-4">
                        <a href="/practiceBases" class="btn btn-outline-danger mr-4">Praktikabaasid</a>
                        <a href="/practiceUnits" class="btn btn-outline-danger mr-4">Praktikaüksused</a>
                    </div>
                 </div>
                 <div class="card" style="border: 1px solid #EDEDED; background-color: #F5F5F5">
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
                               <div class="form-group">
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
                               <button type="submit" class="btn btn-danger">Lisa praktikaüksus</button>
                           </form>
                       </div>
                 </div>
             </div>
         </div>
     </div>
</section>
    <!--layouts.app-->

<!-- Include jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<!-- Include Date Range Picker -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

<script >
    $(document).ready(function(){
        $("[rel=tooltip]").tooltip({ placement: 'top'});
    });
</script>

<script>
    bootstrapValidate('#nimi', 'required:Sisesta praktikaüksuse nimi')

</script>

@endsection


