@extends('layouts.admin')
@section('title', 'Erialad')
@section('content')

<div class="row">
    <div class="card col-md-12">
        <div class="card-header">
            <h4 class="card-title">Erialad</h4>
            <div class="card-body">
                <div>
                    <a href="/add-speciality" class="btn btn-danger ml-5">
                         Lisa uus eriala
                    </a>
                </div>

                        @if(Session::has('speciality_deleted'))
                            <div class="alert alert-success" role="alert">
                                {{Session::get('speciality_deleted')}}
                            </div>
                        @endif

                <button style="margin-bottom: 10px" class="btn btn-warning delete_all mb-3 mt-0 ml-5" data-url="{{ url('deleteAll-speciality') }}">Kustuta kõik</button>

                        <table id="dataTable" class="table table-striped">
                            <thead style="text-align:center;">
                                <tr>
                                    <th width="50px"><input type="checkbox" id="master"></th>
                                    <th class="text-center">Id</th>
                                    <th class="text-left">Nimi</th>
                                    <th class="text-left">Õppekava</th>
                                    <th class="text-left">Õppevorm</th>
                                    <th class="text-center">Kestvus</th>
                                    <th>Muuda</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if($specialities->count())
                                @foreach($specialities as $key => $speciality)

                                    <tr id="tr_{{$speciality->id}}">
                                        <td><input type="checkbox" class="sub_chk" data-id="{{$speciality->id}}"></td>

                                    <td>{{$speciality->id}}</td>
                                        <td class="text-left">{{$speciality->nimi}}</td>
                                        <td class="text-left">{{$speciality->oppekava}}</td>
                                        <td class="text-left">{{$speciality->oppevorm}}</td>
                                        <td>{{$speciality->kestvus}}</td>
                                    <td>
                                        <a class="mr-2" style="color: #228B22;" href="/edit-speciality/{{ $speciality->id }}"><i class="fa fa-pencil-square-o" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Muuda"></i></a>
                                        <a style="color: #E60011;" href="/delete-speciality/{{ $speciality->id }}"><i class="fa fa-trash-o" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Kustuta"></i></a>

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
</div>



@endsection

@section('scripts')

@endsection

