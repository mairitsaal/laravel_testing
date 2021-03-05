@extends('layouts.admin')
@section('title', 'Muuda praktikaüksust')
@section('content')

        <div class="card col-md-12">
            <div class="card-header">
                <h4 class="card-title">MUUDA PRAKTIKAÜKSUST</h4>
                <div class="card-body p-4">
                        <!--Controlleri ja route lisamine-->
                        @if(Session::has('practiceUnit_updated'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('practiceUnit_updated') }}
                            </div>
                        @endif

                        <form method="POST" action="{{route('practiceUnit.update')}}">
                        @csrf

                            <input type="hidden" name="id" value="{{$practiceUnit->id}}" />

                            <!--Praktikabaasi nimi-->
                            <div class="form-group">
                                <label for="nimi" class="required-field">Praktikaüksuse nimi</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                           <span class="input-group-text" style="background-color:#fff; border: 1px solid #888888;" id="basic-addon1">
                                               <i class="fas fa-envelope-open-text fa-sm" style="color: #E60011;"></i>
                                           </span>
                                    </div>
                                    <input type="text" name="nimi" id="nimi" class="form-control" aria-label="Praktikabaasi nimi" aria-describedby="basic-addon1" style="border: 1px solid #888888;" required data-toggle="tooltip" data-placement="top" title="Praktikaüksuse nimi" value="{{$practiceUnit->nimi}}">
                                </div>
                            </div>
                           <div>
                               <div class="form-group col-md-6 m-0 p-0">
                                   <label>Lisa praktikaüksus praktikabaasiga</label>
                                   <div class="input-group">
                                       <div class="input-group-prepend">
                                               <span class="input-group-text" id="basic-addon1" style="border: 1px solid #888888;">
                                                   <i class="fas fa-graduation-cap fa-sm" style="color: #E60011;"></i>
                                               </span>
                                       </div>
                                       <select for="dropdown" class="form-control input-sm custom-select custom-select-lg" name="practice_base_id">
                                           <option value="p{{$practiceUnit->practiceBase->id}}">{{ $practiceUnit->practiceBase->nimi }}</option>
                                           @foreach ($practiceBase as $base)
                                               <option value="{{ $base->id }}">
                                                   {{ $base->nimi }}
                                               </option>
                                           @endforeach
                                           <option value=""></option>
                                       </select>
                                   </div>
                               </div>

                               <button type="submit" class="btn btn-danger">Muuda</button>
                               <a href="/dashboard" class="btn btn-success" style="margin-top:30px;">Tühista</a>
                               <a href="/practiceUnits" class="btn btn-info" style="margin-top:30px;">Vaata tabelit</a>
                           </div>
                        </form>
                </div>
            </div>
        </div>


<script>
    bootstrapValidate('#nimi', 'required:Sisesta praktikaüksuse nimi')

</script>
@endsection
