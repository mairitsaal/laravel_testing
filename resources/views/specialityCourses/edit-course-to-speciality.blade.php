@extends('layouts.admin')
@section('title', 'Muuda eriala seoseid')
@section('content')


        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Muuda seoseid</h4>


                <!--Controlleri ja route lisamine-->
                    @if(Session::has('specialityCourse_updated'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('specialityCourse_updated') }}
                        </div>
                    @endif

                    <form method="POST" action="{{route('specialityCourse.update')}}">
                    @csrf

                    <!--Dropdown menu getting list from db-->


                        <row class="col-10 d-flex mt-4">

                            <div class="col-4">

                                <h6 class="ml-2" style="color: #000">Vali eriala</h6>

                                <select for="dropdown" class="form-control input-sm" name="speciality_id">

                                    <option value="{{$specialityCourse->id}}">{{$specialityCourse->speciality->nimi}}</option>

                                    @foreach ($specialities as $speciality)
                                        <option value="{{ $speciality->id }}">
                                            {{ $speciality->nimi }}
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
                                <h6 class="ml-2" style="color: #000">Vali kursus</h6>
                                <select class="form-control input-sm" name="course_id">

                                    <option value="{{$specialityCourse->id}}">{{$specialityCourse->course->nimi}}</option>

                                    @foreach ($courses as $course)
                                        <option value="{{ $course->id }}">
                                            {{ $course->nimi }}
                                        </option>
                                    @endforeach
                                    <option value=""></option>
                                </select>
                            </div>
                        </row>
                        <input type="hidden" name="id" value="{{$specialityCourse->id}}" />
                        <div class="mb-3">

                            <button type="submit" class="btn btn-danger">Muuda</button>
                            <a href="/dashboard" class="btn btn-success" style="margin-top:30px;">Tühista</a>
                            <a href="/specialityCourses" class="btn btn-info" style="margin-top:30px;">Vaata tabelit</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

@endsection


@section('scripts')

@endsection


