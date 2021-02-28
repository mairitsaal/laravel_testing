@extends('layouts.admin')
@section('title', 'Lisa praktikaüksusele osakond')
@section('content')

    <div class="card col-md-12">
        <div class="card-header">
            <h4 class="card-title">LISA PRAKTIKAÜKSUSELE OSAKOND</h4>
            <div class="card-body p-4">
                <div>
                    <div>
                        <a href="/add-dep-to-unit" class="btn btn-danger ml-5 mb-3">
                            Lisa uus praktikabaas
                        </a>
                    </div>

                        @if(Session::has('unitDep_deleted'))
                            <div class="alert alert-success" role="alert">
                                {{Session::get('unitDep_deleted')}}
                            </div>
                        @endif

                        <table id="dataTable" class="table table-striped">
                            <thead style="text-align:center;">
                                <tr>
                                    <th class="text-center">Id</th>
                                    <th class="text-center">Id</th>
                                    <th class="text-left">Praktikaüksus</th>
                                    <th class="text-center">Id</th>
                                    <th class="text-left">Praktikaosakond</th>

                                    <th class="text-center">Muuda</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($unitDeps as $unitDep)
                                <tr>
                                    <td class="text-center">{{$unitDep->id}}</td>
                                    <td class="text-center">{{$unitDep->practice_unit_id}}</td>

                                    <td class="text-left">{{$unitDep->practiceUnits->nimi}}</td>

                                    <td class="text-center">{{$unitDep->practice_department_id}}</td>

                                    <td class="text-left">{{$unitDep->practiceDepartments->nimi}}</td>
                                    <td>
                                        <!--<a class="mr-2" style="color: darkorange" href="/baseUnits/{{ $unitDep->id }}"><i class="fa fa-eye" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Vaata lähemalt"></i></a>-->
                                        <a class="mr-2" style="color: forestgreen" href="/edit-dep-to-unit/{{ $unitDep->id }}"><i class="fa fa-pencil-square-o" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Muuda"></i></a>
                                        <a style="color: red" href="/delete-dep-to-unit/{{ $unitDep->id }}"><i class="fa fa-trash-o" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Kustuta"></i></a>

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

@section('scripts')

@endsection

