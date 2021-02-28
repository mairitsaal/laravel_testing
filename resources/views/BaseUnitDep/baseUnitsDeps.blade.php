@extends('layouts.admin')
@section('title', 'Praktikabaasi alamüksused')
@section('content')

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Praktikabaasi alamüksused</h4>
                    <div>
                        <a href="/add-unit-dep-to-base" class="btn btn-danger ml-5 mb-3">
                            Lisa uued seosed praktikabaasile
                        </a>
                    </div>

                        @if(Session::has('baseUnitsDeps_deleted'))
                            <div class="alert alert-success" role="alert">
                                {{Session::get('baseUnitsDeps_deleted')}}
                            </div>
                        @endif

                    <button style="margin-bottom: 10px" class="btn btn-warning delete_all" data-url="{{ url('deleteAll-unit-dep-to-base') }}">Kustuta kõik</button>

                        <table id="dataTable" class="table table-striped">
                            <thead style="text-align:left;">
                                <tr>
                                    <th width="50px"><input type="checkbox" id="master"></th>
                                    <th class="red">Id</th>
                                    <th class="darkerRed">Praktikabaas</th>
                                    <th class="red">Praktikaüksus</th>
                                    <th class="darkerRed">Praktika osakond</th>

                                    <th class="red" style="text-align:center;">Muuda</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if($baseUnitDepartments->count())
                                @foreach($baseUnitDepartments as $key => $baseUnitDepartment)

                                    <tr id="tr_{{$baseUnitDepartment->id}}">
                                        <td><input type="checkbox" class="sub_chk" data-id="{{$baseUnitDepartment->id}}"></td>

                                        <td class="text-left">{{$baseUnitDepartment->id}}</td>
                                    <td class="text-left">{{$baseUnitDepartment->practiceBase->nimi}}</td>

                                    <!-- Name from primary table-->
                                    <td class="text-left">{{$baseUnitDepartment->practiceUnit->nimi}}</td>

                                    <!-- Id from base_units table-->
                                    <td class="text-left">{{$baseUnitDepartment->practiceDepartment->nimi}}</td>

                                    <!-- Unit name from practice_units table-->
                                    <td>
                                        <!--<a class="mr-2" style="color: darkorange" href="/baseUnits/{{ $baseUnitDepartment->id }}"><i class="fa fa-eye" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Vaata lähemalt"></i></a>-->
                                        <a class="mr-2" style="color: forestgreen" href="/edit-unit-dep-to-base/{{ $baseUnitDepartment->id }}"><i class="fa fa-pencil-square-o" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Muuda"></i></a>
                                        <a style="color: red" href="/delete-unit-dep-to-base/{{ $baseUnitDepartment->id }}"><i class="fa fa-trash-o" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Kustuta"></i></a>
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

