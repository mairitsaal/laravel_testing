@extends('layouts.admin')
@section('title', 'Lisa praktikajuhendaja')
@section('content')

    <div class="card col-md-12">
        <div class="card-header">
            <h4 class="card-title">LISA PRAKTIKAJUHENDAJAD</h4>
            <div class="card-body">


                           <!--Controlleri ja route lisamine-->
                           @if(Session::has('practiceInstructor_created'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('practiceInstructor_created') }}
                            </div>
                           @endif

                           <form method="POST" action="{{ route('practiceInstructor.create') }}" ><!--class="was-validated" novalidate-->
                               @csrf

                               <!--Praktikaüksuse nimi-->
                               <div class="form-group">
                                   <label for="nimi" class="required-field">Praktikajuhendaja nimi</label>
                                   <div class="input-group">
                                       <div class="input-group-prepend">
                                           <span class="input-group-text" style="background-color:#fff; border: 1px solid #888888;" id="basic-addon1">
                                               <i class="fas fa-envelope-open-text fa-sm" style="color: #E60011;"></i>
                                           </span>
                                       </div>
                                       <input type="text" name="nimi" id="nimi" class="form-control" aria-label="Praktikaüksuse nimi" aria-describedby="basic-addon1" style="border: 1px solid #888888;" required data-toggle="tooltip" rel="tooltip" data-placement="top" title="Praktikajuhendaja nimi">
                                   </div>
                               </div>
                               <!--Amet-->
                               <div class="row">
                               <div class="form-group col-md-6">
                                   <label for="amet" class="required-field">Amet</label>
                                   <div class="input-group">
                                       <div class="input-group-prepend">
                                           <span class="input-group-text" style="background-color:#fff; border: 1px solid #888888;" id="basic-addon1">
                                               <i class="fas fa-envelope-open-text fa-sm" style="color: #E60011;"></i>
                                           </span>
                                       </div>
                                       <input type="text" name="amet" id="amet" class="form-control" aria-label="Praktikaüksuse nimi" aria-describedby="basic-addon1" style="border: 1px solid #888888;" required data-toggle="tooltip" rel="tooltip" data-placement="top" title="Praktikajuhendaja amet">
                                   </div>
                               </div>
                               <!--Email-->
                               <div class="form-group col-md-6">
                                   <label for="email" class="required-field">Email</label>
                                   <div class="input-group">
                                       <div class="input-group-prepend">
                                               <span class="input-group-text" style="background-color:#ffffff; border: 1px solid #888888;" id="basic-addon1">
                                                   <i class="fas fa-envelope-open-text fa-sm" style="color: #E60011;"></i>
                                               </span>
                                       </div>
                                       <input id="email" type="email" name="email" class="form-control" aria-label="Email" aria-describedby="basic-addon1" style="border: 1px solid #888888;" required data-toggle="tooltip" data-placement="top" title="TPraktikajuhendaja email">
                                   </div>
                               </div>
                               </div>
                               <div>
                                   <button type="submit" class="btn btn-danger">Lisa praktikajuhendaja</button>
                                   <a href="/dashboard" class="btn btn-success"style="margin-top:30px;">Tühista</a>
                                   <a href="/practiceInstructors" class="btn btn-info" style="margin-top:30px;">Vaata tabelit</a>
                               </div>
                           </form>
                 </div>
             </div>
         </div>

    <!-- Include jQuery -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

    <!-- Include Date Range Picker -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>


    <script>
        bootstrapValidate('#nimi', 'required:Sisesta juhendaja nimi')
        bootstrapValidate('#amet', 'required:Sisesta praktikabaasi juhendaja amet')
        bootstrapValidate('#email', 'email:Sisesta korrektne email, näiteks mari.roos@nooruse.ee')
    </script>
    <!--layouts.app-->



@endsection


