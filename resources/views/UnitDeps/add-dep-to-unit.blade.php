@extends('layouts.admin')
@section('title', 'Lisa praktikaüksusele osakond')
@section('content')

    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Lisa praktikaüksusele osakond</h4>

                            <!--Controlleri ja route lisamine-->
                            @if(Session::has('unitDep_created'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('unitDep_created') }}
                                </div>
                            @endif

                            <form method="POST" action="{{ route('unitDeps.create') }}" ><!--class="was-validated" novalidate-->
                            @csrf

                            <!--Dropdown menu getting list from db-->
                            <row class="col-10 d-flex mt-4">
                                <div class="col-6">
                                    <h6 class="ml-2" style="color: #000">Vali praktikaüksus</h6>
                                    <select for="dropdown" class="form-control input-sm" name="practice_unit_id">

                                        <option>Vali praktikaüksus</option>

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

                                        <option>Vali praktika osakond</option>

                                        @foreach ($practiceDepartments as $practiceDepartment)
                                            <option value="{{ $practiceDepartment->id }}">
                                                {{ $practiceDepartment->nimi }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </row>

                            <div class="mb-3">

                                <button type="submit" class="btn btn-danger">Lisa praktikaüksusele osakond</button>
                                <a href="/dashboard" class="btn btn-success" style="margin-top:30px;">Tühista</a>
                                <a href="/unitDeps" class="btn btn-info" style="margin-top:30px;">Vaata tabelit</a>
                            </div>

                            </form>
                        </div>

                <!-- New card for table-->

                    </div>
        </div>

@endsection


@section('scripts')

@endsection


