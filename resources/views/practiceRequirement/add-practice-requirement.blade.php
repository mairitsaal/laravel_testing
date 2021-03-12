@extends('layouts.admin')
@section('title', 'Lisa praktinõue')
@section('content')


    <div class="card col-md-12">
        <div class="card-header">
            <h4 class="card-title">LISA PRAKTIKANÕUE</h4>
            <div class="card-body p-4">
                <div>
                           <!--Controlleri ja route lisamine-->
                           @if(Session::has('practiceReq_created'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('practiceReq_created') }}
                            </div>
                           @endif

                           <form method="POST" action="{{ route('practiceReq.create') }}" enctype="multipart/form-data"><!--class="was-validated" novalidate-->
                               @csrf

                               <!--Praktikanõude nimi-->
                               <div class="form-group">
                                   <label for="nimi" class="required-field">Praktikanõude nimi</label>
                                   <div class="input-group">
                                       <div class="input-group-prepend">
                                           <span class="input-group-text" style="background-color:#fff; border: 1px solid #888888;" id="basic-addon1">
                                               <i class="fas fa-envelope-open-text fa-sm" style="color: #E60011;"></i>
                                           </span>
                                       </div>
                                       <input type="text" name="nimi" id="nimi" class="form-control" aria-label="Praktikanõude nimi" aria-describedby="basic-addon1" style="border: 1px solid #888888;" required data-toggle="tooltip" rel="tooltip" data-placement="top" title="Praktikanõude nimi">
                                   </div>
                               </div>

                                   <!--Kursus-->
                               <div class="row d-flex">
                                <div class="form-group col-md-6">
                                    <label>Lisa kursus</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1" style="border: 1px solid #888888;">
                                            <i class="fas fa-graduation-cap fa-sm" style="color: #E60011;"></i>
                                        </span>
                                       </div>
                                       <select for="dropdown" class="form-control input-sm custom-select custom-select-lg" name="course_id">
                                           <option selected>Vali kursus</option>
                                           <option value=""></option>
                                           @foreach ($courses as $course)
                                               <option value="{{ $course->id }}">
                                                   {{ $course->nimi }}
                                               </option>
                                           @endforeach

                                       </select>
                                   </div>
                                </div>

                                   <div class="form-group col-md-6">
                                           <label for="maht">Maht</label>
                                           <div class="input-group">
                                               <div class="input-group-prepend">
                                                   <span class="input-group-text" style="background-color:#ffffff; border: 1px solid #888888;" id="basic-addon1">
                                                       <i class="fas fa-file-contract fa-sm" style="color: #E60011;"></i>
                                                   </span>
                                               </div>
                                               <input type="text" name="maht" id="maht" class="form-control" aria-label="Praktikanõude maht" aria-describedby="basic-addon1" style="border: 1px solid #888888;" required data-toggle="tooltip" data-placement="top" title="Maht">
                                           </div>
                                    </div>
                               </div>
                               <!--Kirjeldus-->
                               <div class="form-group col-md-6 pl-0">
                                   <label for="kirjeldus">Kirjeldus</label>
                                   <div class="input-group">
                                       <div class="input-group-prepend">
                                                   <span class="input-group-text" style="background-color:#ffffff; border: 1px solid #888888;" id="basic-addon1">
                                                       <i class="fas fa-file-contract fa-sm" style="color: #E60011;"></i>
                                                   </span>
                                       </div>
                                       <input type="text" name="kirjeldus" id="kirjeldus" class="form-control" aria-label="Praktikanõude kirjeldus" aria-describedby="basic-addon1" style="border: 1px solid #888888;" required data-toggle="tooltip" data-placement="top" title="Kirjeldus">
                                   </div>
                               </div>

                                   <!--Kirjeldus, fail-->
                               <div class="col-md-6">
                                   <div class="custom-file">
                                       <input type="file" name="file" class="custom-file-input" id="chooseFile">
                                       <label class="custom-file-label" for="chooseFile">Select file</label>
                                   </div>

                               </div>

                               <!--Esimene päev kaasa-->
                                <div class="form-group col-md-6 m-0 p-0 pt-3 pr-5" >
                                   <label for="esimenePaevKaasa">Esimene päev kaasa</label>
                                   <textarea type="text" name="esimenePaevKaasa" id="esimenePaevKaasa" class="form-control" rows="3" style="border: 1px solid #888888; margin-left: 40px !important;" data-toggle="tooltip" data-placement="top" title="Esimene päev kaasa"></textarea>
                                </div>

                               <div>
                                   <button type="submit" class="btn btn-danger">Lisa praktikanõue</button>
                                   <a href="/dashboard" class="btn btn-success" style="margin-top:30px;">Tühista</a>
                                   <a href="/practiceReqs" class="btn btn-info" style="margin-top:30px;">Vaata tabelit</a>
                               </div>
                           </form>
                       </div>
                 </div>
             </div>
         </div>
     </div>

    <!--layouts.app-->



<script>
    bootstrapValidate('#nimi', 'required:Sisesta praktikanõude nimi')


</script>
@section('scripts')

@endsection
@endsection


