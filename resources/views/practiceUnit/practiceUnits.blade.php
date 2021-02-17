@extends('layouts.master')
@section('title', 'Praktikaüksused')
@section('content')

<section style="padding-top:20px">
    <div class="container-fluid m-0">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h3 class="m-4" style="color: #E60011">PRAKTIKAÜKSUSED</h3>
                <div>
                    <a href="/add-practice-unit" class="btn btn-outline-danger ml-4 mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-plus-square-fill mb-1" viewBox="0 0 16 16">
                            <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z"/>
                        </svg> Lisa uus praktikaüksus</a>
                </div>

                <div class="card" style="border: none;">
                    <div class="card-body">

                        @if(Session::has('practiceUnit_deleted'))
                            <div class="alert alert-success" role="alert">
                                {{Session::get('practiceUnit_deleted')}}
                            </div>
                        @endif

                        <table id="dataTable" class="table table-striped">
                            <thead style="text-align:center;">
                                <tr>
                                    <th class="red">Id</th>
                                    <th class="darkerRed">Praktikabaas</th>
                                    <th class="red">Praktikaüksus</th>

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

