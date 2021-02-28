@extends('layouts.admin')
@section('title', 'Eriala kursused')
@section('content')

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Eriala kursused</h4>
                    <div>
                        <a href="/add-course-to-speciality" class="btn btn-danger ml-5 mb-3">
                            Lisa erialale uusi kursusi
                        </a>
                    </div>

                        @if(Session::has('specialityCourse_deleted'))
                            <div class="alert alert-success" role="alert">
                                {{Session::get('specialityCourse_deleted')}}
                            </div>
                        @endif

                    <button style="margin-bottom: 10px" class="btn btn-warning delete_all" data-url="{{ url('deleteAll-course-to-speciality') }}">Kustuta kõik</button>

                        <table id="dataTable" class="table table-striped">
                            <thead style="text-align:left;">
                                <tr>
                                    <th width="50px"><input type="checkbox" id="master"></th>
                                    <th class="red">Id</th>
                                    <th class="text-left">Eriala</th>
                                    <th class="text-left">Kursus</th>

                                    <th class="red" style="text-align:center;">Muuda</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if($specialityCourses->count())
                                @foreach($specialityCourses as $key => $specialityCourse)

                                    <tr id="tr_{{$specialityCourse->id}}">
                                        <td><input type="checkbox" class="sub_chk" data-id="{{$specialityCourse->id}}"></td>

                                        <td class="text-left">{{$specialityCourse->id}}</td>
                                    <td class="text-left">{{$specialityCourse->speciality->nimi}}</td>

                                    <!-- Name from primary table-->
                                    <td class="text-left">{{$specialityCourse->course->nimi}}</td>

                                    <td>
                                        <!--<a class="mr-2" style="color: darkorange" href="/baseUnits/{{ $specialityCourse->id }}"><i class="fa fa-eye" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Vaata lähemalt"></i></a>-->
                                        <a class="mr-2" style="color: forestgreen" href="/edit-course-to-speciality/{{ $specialityCourse->id }}"><i class="fa fa-pencil-square-o" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Muuda"></i></a>
                                        <a style="color: red" href="/delete-course-to-speciality/{{ $specialityCourse->id }}"><i class="fa fa-trash-o" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Kustuta"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                                @endif
                            </tbody>

                        </table>

                    </div>
                </div>
            </div>
        </div>

@endsection

@section('scripts')

@endsection

