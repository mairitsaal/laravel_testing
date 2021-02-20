@extends('layouts.admin')
@section('title', 'Praktikaüksused')
@section('content')

        <div class="card col-md-12">
            <div class="card-header">
                <h4 class="card-title"> PRAKTIKAÜKSUSED</h4>
                <div class="card-body">
                    <div>
                        <a href="/add-practice-unit" class="btn btn-danger ml-5 mb-3">
                            Lisa uus praktikaüksus
                        </a>
                    </div>
                    </div>
                    <div class="card-body">

                        @if(Session::has('practiceUnit_deleted'))
                            <div class="alert alert-success" role="alert">
                                {{Session::get('practiceUnit_deleted')}}
                            </div>
                        @endif

                        <table id="dataTable" class="table table-striped" style="text-align:center;">
                            <thead>
                                <tr>
                                    <th class="red">Id</th>
                                    <th class="darkerRed text-left">Praktikabaas</th>
                                    <th class="red text-left">Praktikaüksus</th>

                                    <th class="darkerRed">Muuda</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($practiceUnits as $practiceUnit)
                                <tr>
                                    <td>{{$practiceUnit->id}}</td>
                                    <td class="text-left">{{$practiceUnit->practiceBase->nimi}}</td>
                                    <td class="text-left">{{$practiceUnit->nimi}}</td>
                                    <td>

                                        <!--<a class="mr-2" style="color: darkorange" href="/practiceUnits/{{ $practiceUnit->id }}"><i class="fa fa-eye" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Vaata lähemalt"></i></a>-->
                                        <a class="mr-2" style="color: forestgreen" href="/edit-practice-unit/{{ $practiceUnit->id }}"><i class="fa fa-pencil-square-o" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Muuda"></i></a>
                                        <a style="color: red" href="/delete-practice-unit/{{ $practiceUnit->id }}"><i class="fa fa-trash-o" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Kustuta"></i></a>

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

