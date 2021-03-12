@extends('layouts.admin')
@section('title', 'Muuda praktikanõuet')
@section('content')

    <div class="card col-md-12">
        <div class="card-header">
            <h4 class="card-title">MUUDA PRAKTIKANÕUET</h4>
            <div class="card-body p-4">
                <div>
                        <!--Controlleri ja route lisamine-->
                        @if(Session::has('practiceReq_updated'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('practiceReq_updated') }}
                            </div>
                        @endif

                        <form method="POST" action="{{route('practiceReq.update')}}">
                        @csrf
                            <input type="hidden" name="id" value="{{$practiceRequirement->id}}" />

                            <!--Praktikanõude nimi-->
                            <div class="form-group">
                                <label for="nimi" class="required-field">Praktikanõude nimi</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                           <span class="input-group-text" style="background-color:#fff; border: 1px solid #888888;" id="basic-addon1">
                                               <i class="fas fa-envelope-open-text fa-sm" style="color: #E60011;"></i>
                                           </span>
                                    </div>
                                    <input type="text" name="nimi" id="nimi" class="form-control" aria-label="Praktikanõude nimi" aria-describedby="basic-addon1" style="border: 1px solid #888888;" required data-toggle="tooltip" rel="tooltip" data-placement="top" title="Praktikanõude nimi" value="{{ $practiceRequirement->nimi }}">
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
                                            <option value="{{ $practiceRequirement->courses->id }}>{{ $practiceRequirement->courses->nimi }}</option>

                                            @foreach ($courses as $course)
                                                <option value="{{ $course->id }}">
                                                    {{ $course->nimi }}
                                                </option>
                                            @endforeach
                                            <option value=""></option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="maht" class="required-field">Maht</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                                   <span class="input-group-text" style="background-color:#ffffff; border: 1px solid #888888;" id="basic-addon1">
                                                       <i class="fas fa-file-contract fa-sm" style="color: #E60011;"></i>
                                                   </span>
                                        </div>
                                        <input type="text" name="maht" id="maht" class="form-control" aria-label="Praktikanõude maht" aria-describedby="basic-addon1" style="border: 1px solid #888888;" required data-toggle="tooltip" data-placement="top" title="Maht" value="{{$practiceRequirement->maht}}">
                                    </div>
                                </div>

                            </div>


                            <!--Kirjeldus, fail-->
                            <div class="form-group">
                                <label for="kirjeldus" class="required-field">Kirjeldus</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                           <span class="input-group-text" style="background-color:#ffffff; border: 1px solid #888888;" id="basic-addon1">
                                               <i class="fas fa-location-arrow fa-sm" style="color: #E60011"></i>
                                           </span>
                                    </div>
                                    <input type="text" name="kirjeldus" id="kirjeldus" class="form-control" aria-label="Praktikanõude kirjeldus" aria-describedby="basic-addon1" style="border: 1px solid #888888;" required data-toggle="tooltip" data-placement="top" title="Praktikanõude kirjeldus" value="{{$practiceRequirement->kirjeldus}}">
                                </div>
                            </div>

                            <!--Esimene päev kaasa-->
                            <div class="form-group col-md-6 m-0 p-0 pt-3 pr-5" >
                                <label for="esimenePaevKaasa">Esimene päev kaasa</label>
                                <textarea type="text" name="esimenePaevKaasa" id="esimenePaevKaasa" class="form-control" rows="3" style="border: 1px solid #888888; margin-left: 40px !important;" data-toggle="tooltip" data-placement="top" title="Esimene päev kaasa">{{$practiceRequirement->esimenePaevKaasa}}</textarea>
                            </div>

                            <div>
                                <button type="submit" class="btn btn-danger">Muuda</button>
                                <a href="/dashboard" class="btn btn-success" style="margin-top:30px;">Tühista</a>
                                <a href="/practiceReqs" class="btn btn-info" style="margin-top:30px;">Vaata tabelit</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
@endsection
