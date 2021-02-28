@extends('layouts.admin')
@section('title', 'Lisa praktikabaasile alamüksused')
@section('content')


        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Muuda seoseid</h4>


                <!--Controlleri ja route lisamine-->
                    @if(Session::has('baseUnitsDeps_updated'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('baseUnitsDeps_updated') }}
                        </div>
                    @endif

                    <form method="POST" action="{{route('baseUnitDep.update')}}">
                    @csrf

                    <!--Dropdown menu getting list from db-->


                        <row class="col-10 d-flex mt-4">

                            <div class="col-4">

                                <h6 class="ml-2" style="color: #000">Vali praktikabaas</h6>

                                <select for="dropdown" class="form-control input-sm" name="practice_base_id">

                                    <option value="{{$baseUnitDepartment->id}}">{{$baseUnitDepartment->practiceBase->nimi}}</option>

                                    @foreach ($practiceBases as $practiceBase)
                                        <option value="{{ $practiceBase->id }}">
                                            {{ $practiceBase->nimi }}
                                        </option>
                                    @endforeach
                                        <option value=""></option>
                                </select>

                                @if ($errors->has('dropdown'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('dropdown') }}</strong>
                                        </span>
                                @endif
                            </div>
                            <div class="col-4">
                                <h6 class="ml-2" style="color: #000">Vali praktikaüksus</h6>
                                <select class="form-control input-sm" name="practice_unit_id">

                                    <option value="{{$baseUnitDepartment->id}}">{{$baseUnitDepartment->practiceUnit->nimi}}</option>

                                    @foreach ($practiceUnits as $practiceUnit)
                                        <option value="{{ $practiceUnit->id }}">
                                            {{ $practiceUnit->nimi }}
                                        </option>
                                    @endforeach
                                    <option value=""></option>
                                </select>
                            </div>
                            <div class="col-4">
                                <h6 class="ml-2" style="color: #000">Vali praktika osakond</h6>
                                <select class="form-control input-sm" name="practice_department_id">


                                    <option value="{{$baseUnitDepartment->id}}">{{$baseUnitDepartment->practiceDepartment->nimi}}</option>

                                    @foreach ($practiceDepartments as $practiceDepartment)
                                        <option value="{{ $practiceDepartment->id }}">
                                            {{ $practiceDepartment->nimi }}
                                        </option>
                                    @endforeach
                                        <option value=""></option>
                                </select>
                            </div>
                        </row>
                        <input type="hidden" name="id" value="{{$baseUnitDepartment->id}}" />
                        <div class="mb-3">

                            <button type="submit" class="btn btn-danger">Muuda</button>
                            <a href="/dashboard" class="btn btn-success" style="margin-top:30px;">Tühista</a>
                            <a href="/baseUnitsDeps" class="btn btn-info" style="margin-top:30px;">Vaata tabelit</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

@endsection


@section('scripts')

@endsection


