@extends('layouts.admin')
@section('title', 'Kursused')
@section('content')

    <div class="card col-md-12">
        <div class="card-header">
            <h4 class="card-title">KURSUSED</h4>
            <div class="card-body">
                <div>
                    <a href="/add-course" class="btn btn-danger ml-5">
                         Lisa uus eriala
                    </a>
                </div>

                        @if(Session::has('course_deleted'))
                            <div class="alert alert-success" role="alert">
                                {{Session::get('course_deleted')}}
                            </div>
                        @endif

                <button style="margin-bottom: 10px" class="btn btn-warning delete_all mb-3 mt-0 ml-5" data-url="{{ url('deleteAll-course') }}">Kustuta kõik</button>

                        <table id="dataTable" class="table table-striped">
                            <thead style="text-align:center;">
                                <tr>
                                    <th width="50px"><input type="checkbox" id="master"></th>
                                    <th class="text-center">Id</th>
                                    <th class="text-left">Eriala</th>
                                    <th class="text-left">Kursus</th>
                                    <th class="text-center">Õpilaste arv</th>
                                    <th>Muuda</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if($courses->count())
                                @foreach($courses as $key => $course)

                                    <tr id="tr_{{$course->id}}">
                                        <td><input type="checkbox" class="sub_chk" data-id="{{$course->id}}"></td>

                                    <td>{{$course->id}}</td>
                                    <td class="text-left">{{$course->speciality->nimi}}</td>
                                    <td class="text-left">{{$course->nimi}}</td>
                                    <td>{{$course->opilasteArv}}</td>
                                    <td>
                                        <a class="mr-2" style="color: #228B22;" href="/edit-course/{{ $course->id }}"><i class="fa fa-pencil-square-o" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Muuda"></i></a>
                                        <a style="color: #E60011;" href="/delete-course/{{ $course->id }}"><i class="fa fa-trash-o" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Kustuta"></i></a>
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
    </div>


@endsection

@section('scripts')

@endsection

