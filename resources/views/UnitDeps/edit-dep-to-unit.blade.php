@extends('layouts.admin')
@section('title', 'Lisa praktikaüksusele osakond')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Lisa praktikaüksusele osakond</h4>
                    <div class="card-body">

                        <!--Controlleri ja route lisamine-->
                            @if(Session::has('unitDep_updated'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('unitDep_updated') }}
                                </div>
                            @endif

                            <form method="POST" action="{{route('unitDep.update')}}">
                                @csrf

                                <row class="col-10 d-flex mt-4">

                                    <div class="col-4">

                                        <h6 class="ml-2" style="color: #000">Vali praktikaüksus</h6>


                                        <select for="dropdown" class="form-control input-sm" name="practice_unit_id">

                                            <option>{{$unitDeps->practiceUnits->nimi}}</option>

                                            @foreach ($practiceUnits as $practiceUnit)
                                                <option value="{{ $practiceUnit->id }}">
                                                    {{ $practiceUnit->nimi }}
                                                </option>
                                            @endforeach
                                        </select>

                                        @if ($errors->has('dropdown'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('dropdown') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="col-6">
                                        <h6 class="ml-2" style="color: #000">Vali praktika osakond</h6>
                                        <select class="form-control input-sm" name="practice_department_id">

                                            <option>{{ $unitDeps->practiceDepartments->nimi }}</option>

                                            @foreach ($practiceDepartments as $practiceDepartment)
                                                <option value="{{ $practiceDepartment->id }}">
                                                    {{ $practiceDepartment->nimi }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <input type="hidden" name="id" value="{{$unitDeps->id}}" />
                                </row>

                                <div class="mb-3">

                                    <button type="submit" class="btn btn-danger">Muuda</button>
                                    <a href="/dashboard" class="btn btn-success" style="margin-top:30px;">Tühista</a>
                                    <a href="/unitDeps" class="btn btn-info" style="margin-top:30px;">Vaata tabelit</a>
                                </div>

                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

@endsection

