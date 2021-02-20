@extends('layouts.admin')
@section('title', 'Praktikajuhendajad')
@section('content')

    <div class="card col-md-12">
        <div class="card-header">
            <h4 class="card-title"> PRAKTIKAJUHENDAJAD</h4>
            <div class="card-body">
                <div>
                    <a href="/add-practice-instructor" class="btn btn-danger ml-5 mb-3">
                        Lisa uus praktikajuhendaja
                    </a>
                </div>

                        @if(Session::has('practiceInstructor_deleted'))
                            <div class="alert alert-success" role="alert">
                                {{Session::get('practiceInstructor_deleted')}}
                            </div>
                        @endif

                        <table id="dataTable" class="table table-striped">
                            <thead style="text-align:center;">
                                <tr>
                                    <th class="text-center">Id</th>
                                    <th class="text-left">Nimi</th>
                                    <th class="text-left">Amet</th>
                                    <th class="text-left">Email</th>
                                    <th class="text-center">Muuda</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($practiceInstructors as $practiceInstructor)
                                <tr>
                                    <td>{{$practiceInstructor->id}}</td>
                                    <td class="text-left">{{$practiceInstructor->nimi}}</td>
                                    <td class="text-left">{{$practiceInstructor->amet}}</td>
                                    <td class="text-left">{{$practiceInstructor->email}}</td>
                                    <td>

                                        <a class="mr-2" style="color: #228B22;" href="/edit-practice-instructor/{{ $practiceInstructor->id }}"><i class="fa fa-pencil-square-o" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Muuda"></i></a>
                                        <a style="color: #E60011;" href="/delete-practice-instructor/{{ $practiceInstructor->id }}"><i class="fa fa-trash-o" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Kustuta"></i></a>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                </div>
            </div>
        </div>


@endsection

@section('scripts')

    @endsection

