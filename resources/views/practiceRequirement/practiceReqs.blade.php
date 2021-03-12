@extends('layouts.admin')
@section('title', 'Praktikabnõuded')
@section('content')


<div class="row">
    <div class="card col-md-12">
        <div class="card-header">
            <h4 class="card-title"> PRAKTIKANÕUDED</h4>
            <div class="card-body">
                <div>
                    <a href="/add-practice-requirement" class="btn btn-danger ml-5">
                         Lisa uus praktikanõue
                    </a>
                </div>

                        @if(Session::has('practiceReq_deleted'))
                            <div class="alert alert-success" role="alert">
                                {{Session::get('practiceReq_deleted')}}
                            </div>
                        @endif

                <button style="margin-bottom: 10px" class="btn btn-warning delete_all mb-3 mt-0 ml-5" data-url="{{ url('deleteAll-practice-requirements') }}">Kustuta kõik</button>

                        <table id="dataTable" class="table table-striped display">
                            <thead style="text-align:center;">
                                <tr>
                                    <th width="50px"><input type="checkbox" id="master"></th>
                                    <th class="text-center">Id</th>
                                    <th class="text-left">Nimi</th>
                                    <th class="text-left">Kursus</th>
                                    <th class="text-center">Maht</th>
                                    <th class="text-left">Kirjeldus</th>
                                    <th class="text-left">Esimene päev kaasa</th>
                                    <th class="text-center">Muuda</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if($practiceRequirements->count())
                                @foreach($practiceRequirements as $key => $practiceRequirement)

                                    <tr id="tr_{{$practiceRequirement->id}}">
                                        <td><input type="checkbox" class="sub_chk" data-id="{{$practiceRequirement->id}}"></td>

                                    <td>{{$practiceRequirement->id}}</td>
                                    <td class="text-left">{{$practiceRequirement->nimi}}</td>
                                    <td class="text-left">{{$practiceRequirement->courses->nimi}}</td>
                                    <td>{{$practiceRequirement->maht}}</td>
                                    <td class="text-left">{{$practiceRequirement->kirjeldus}}</td>
                                    <td class="text-left">{{$practiceRequirement->esimenePaevKaasa}}</td>
                                    <td>

                                        <a class="mr-2" style="color: #ff8c00;" href="/practiceReqs/{{ $practiceRequirement->id }}"><i class="fa fa-eye" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Vaata lähemalt"></i></a>
                                        <a class="mr-2" style="color: #228B22;" href="/edit-practice-requirement/{{ $practiceRequirement->id }}"><i class="fa fa-pencil-square-o" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Muuda"></i></a>
                                        <a style="color: #E60011;" href="/delete-practice-requirement/{{ $practiceRequirement->id }}"><i class="fa fa-trash-o" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Kustuta"></i></a>

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

