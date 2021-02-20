@extends('layouts.admin')
@section('title', 'Praktika osakonnad')
@section('content')

        <div class="card col-md-12">
            <div class="card-header">
                <h4 class="card-title">PRAKTIKA OSAKONNAD</h4>
                <div class="card-body p-4">
                    <div>
                        <a href="/add-practice-department" class="btn btn-danger ml-5 mb-3">
                            Lisa uus praktika osakond
                        </a>
                    </div>

                        @if(Session::has('practiceDepartment_deleted'))
                            <div class="alert alert-success" role="alert">
                                {{Session::get('practiceDepartment_deleted')}}
                            </div>
                        @endif

                        <table id="dataTable" class="table table-striped">
                            <thead style="text-align:center;">
                                <tr>
                                    <th class="red">Id</th>
                                    <th class="red text-left">Praktika osakond</th>

                                    <th class="darkerRed">Muuda</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($practiceDepartments as $practiceDepartment)
                                <tr>
                                    <td>{{$practiceDepartment->id}}</td>
                                    <td class="text-left">{{$practiceDepartment->nimi}}</td>
                                    <td>

                                        <a class="mr-2" style="color: forestgreen" href="/edit-practice-department/{{ $practiceDepartment->id }}"><i class="fa fa-pencil-square-o" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Muuda"></i></a>
                                        <a style="color: red" href="/delete-practice-department/{{ $practiceDepartment->id }}"><i class="fa fa-trash-o" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Kustuta"></i></a>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

