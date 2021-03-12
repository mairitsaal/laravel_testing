@extends('layouts.admin')
@section('title', 'Lisa praktikaüksus baasile')
@section('content')

    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Lisa praktikaüksus baasile</h4>

                            <!--Controlleri ja route lisamine-->
                            @if(Session::has('baseUnit_created'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('baseUnit_created') }}
                                </div>
                            @endif

                            <form method="POST" action="{{ route('baseUnit.create') }}" ><!--class="was-validated" novalidate-->
                            @csrf

                            <!--Dropdown menu getting list from db-->
                            <row class="col-10 d-flex mt-4">
                                <div class="col-6">
                                    <h6 class="ml-2" style="color: #000">Vali praktikabaas</h6>
                                    <select for="dropdown" class="form-control input-sm" name="practice_base_id">

                                        <option>Praktikabaas</option>

                                        @foreach ($practiceBaseList as $practiceBase)
                                            <option value="{{ $practiceBase->id }}">
                                                {{ $practiceBase->nimi }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('dropdown'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('dropdown') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <h6 class="ml-2" style="color: #000">Vali praktikaüksus</h6>
                                    <select class="form-control input-sm" name="practice_unit_id">

                                        <option>Praktikaüksus</option>

                                        @foreach ($practiceUnits as $practiceUnit)
                                            <option value="{{ $practiceUnit->id }}">
                                                {{ $practiceUnit->nimi }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </row>

                            <div class="mb-3">

                                <button type="submit" class="btn btn-danger">Lisa üksus praktikabaasile</button>
                                <a href="/dashboard" class="btn btn-success" style="margin-top:30px;">Tühista</a>
                                <a href="/baseUnits" class="btn btn-info" style="margin-top:30px;">Vaata tabelit</a>
                            </div>

                            </form>
                        </div>

                <!-- New card for table-->

                    </div>
        </div>

@endsection


@section('scripts')

@endsection


