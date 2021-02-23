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

                               <!--Praktikajuhendaja nimi-->
                               <div class="form-group">
                                   <label for="name" class="required-field">Praktikajuhendaja nimi</label>
                                   <div class="input-group">
                                       <div class="input-group-prepend">
                                           <span class="input-group-text" style="background-color:#fff; border: 1px solid #888888;" id="basic-addon1">
                                               <i class="fas fa-envelope-open-text fa-sm" style="color: #E60011;"></i>
                                           </span>
                                       </div>
                                       <input type="text" name="name" id="name" class="form-control" aria-label="Praktikaüksuse nimi" aria-describedby="basic-addon1" style="border: 1px solid #888888;" required data-toggle="tooltip" rel="tooltip" data-placement="top" title="Praktikajuhendaja nimi">
                                   </div>
                               </div>
                               <!--Telefon-->
                               <div class="row d-flex">
                                   <div class="form-group col-md-6">
                                       <label for="phone" class="required-field">Telefon</label>
                                       <div class="input-group">
                                           <div class="input-group-prepend">
                                               <span class="input-group-text" style="background-color:#ffffff; border: 1px solid #888888;" id="basic-addon1">
                                                   <i class="fas fa-phone-square-alt fa-sm" style="color: #E60011;"></i>
                                               </span>
                                           </div>
                                           <input id="phone" type="text" name="phone" class="form-control" aria-label="Telefon" aria-describedby="basic-addon1" style="border: 1px solid #888888;" required data-toggle="tooltip" data-placement="top" title="Praktikabaasi telefoni number">
                                       </div>
                                   </div>
                               <!--Amet-->

                                    <div class="form-group col-md-6">
                                        <label for="position" class="required-field">Amet</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" style="background-color:#fff; border: 1px solid #888888;" id="basic-addon1">
                                                    <i class="fas fa-envelope-open-text fa-sm" style="color: #E60011;"></i>
                                                </span>
                                            </div>
                                            <input type="text" name="position" id="position" class="form-control" aria-label="Praktikaüksuse nimi" aria-describedby="basic-addon1" style="border: 1px solid #888888;" required data-toggle="tooltip" rel="tooltip" data-placement="top" title="Praktikajuhendaja amet">
                                        </div>
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


                               <div>
                                   <button type="submit" class="btn btn-danger">Lisa praktikajuhendaja</button>
                                   <a href="/dashboard" class="btn btn-success"style="margin-top:30px;">Tühista</a>
                                   <a href="/practiceInstructors" class="btn btn-info" style="margin-top:30px;">Vaata tabelit</a>
                               </div>
                           </form>
                 </div>
             </div>
         </div>



    <script>
        bootstrapValidate('#name', 'required:Sisesta juhendaja nimi')
        bootstrapValidate('#position', 'required:Sisesta praktikabaasi juhendaja amet')
        bootstrapValidate('#email', 'email:Sisesta korrektne email, näiteks mari.roos@nooruse.ee')
        bootstrapValidate('#phone', 'numeric:Sisesta telefoninumbrer')
    </script>

@endsection


