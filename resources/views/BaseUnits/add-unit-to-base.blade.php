@extends('layouts.master')
@section('title', 'Lisa praktikaüksus baasile')
@section('content')

    <section>
        <div class="container ">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="row d-flex mb-2">
                        <div class="col-12">
                            <h3 class="m-2" style="color: #E60011">LISA PRAKTIKAÜKSUS BAASILE</h3>
                        </div>
                        <div class="col-12 m-2 text-right">
                            <a href="/practiceBases" class="btn btn-outline-danger mr-4">Praktikabaasid</a>
                            <a href="/practiceUnits" class="btn btn-outline-danger mr-4">Praktikaüksused</a>
                            <a href="/baseUnits" class="btn btn-outline-danger mr-4">Üksused ühendatud baasiga</a>

                        </div>
                    </div>
                    <div class="card" style="border: 1px solid #EDEDED; background-color: #F5F5F5">
                        <div class="card-body p-4">

                            <!--Controlleri ja route lisamine-->
                            @if(Session::has('baseUnit_created'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('baseUnit_created') }}
                                </div>
                            @endif

                            <form method="POST" action="{{ route('baseUnit.create') }}" ><!--class="was-validated" novalidate-->
                            @csrf

                            <!--Dropdown menu getting list from db-->
                            <row class="col-10 d-flex">
                                <div class="col-6">
                                    <h6 class="ml-2" style="color: #E60011">Vali praktikabaas</h6>
                                    <select for="dropdown" class="form-control input-sm mb-4" name="practice_base_id">

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
                                <div class="col-6">
                                    <h6 class="ml-2" style="color: #E60011">Vali praktikaüksus</h6>
                                    <select class="form-control input-sm mb-4" name="practice_unit_id">

                                        <option>Praktikaüksus</option>

                                        @foreach ($practiceUnits as $practiceUnit)
                                            <option value="{{ $practiceUnit->id }}">
                                                {{ $practiceUnit->nimi }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </row>



                            <button type="submit" class="btn btn-danger ml-4">Lisa üksus praktikabaasile</button>
                            <a href="/dashboard" class="btn btn-success">Tühista</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('scripts')

@endsection


