@extends('layouts.admin')
@section('title', 'Praktikagrupid')
@section('content')


<div class="row">
    <div class="card col-md-12">
        <div class="card-header">
            <h4 class="card-title"> PRAKTIKAGRUPID</h4>
            <div class="card-body">
                <div>
                    <a href="/add-practice-group" class="btn btn-danger ml-5">
                         Lisa uus praktikagrupp
                    </a>
                </div>

                        @if(Session::has('practiceGroup_deleted'))
                            <div class="alert alert-success" role="alert">
                                {{Session::get('practiceGroup_deleted')}}
                            </div>
                        @endif

                <button style="margin-bottom: 10px" class="btn btn-warning delete_all mb-3 mt-0 ml-5" data-url="{{ url('deleteAll-practice-groups') }}">Kustuta kõik</button>

                        <table id="dataTable" class="table table-striped display">
                            <thead style="text-align:center;">
                                <tr>
                                    <th width="50px"><input type="checkbox" id="master"></th>
                                    <th class="font-weight-light">Id</th>
                                    <th class="text-left font-weight-light">Nimi</th>
                                    <th class="text-left font-weight-light">Õpilane</th>
                                    <th class="text-center font-weight-light">Muuda</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if($practiceGroups->count())
                                @foreach($practiceGroups as $key => $practiceGroup)

                                    <tr id="tr_{{$practiceGroup->id}}">
                                        <td><input type="checkbox" class="sub_chk" data-id="{{$practiceGroup->id}}"></td>

                                    <td>{{$practiceGroup->id}}</td>
                                    <td class="text-left">{{$practiceGroup->nimi}}</td>
                                    <td>{{$practiceGroup->users->name}}</td>
                                    <td>

                                        <a class="mr-2" style="color: #ff8c00;" href="/practiceGroups/{{ $practiceGroup->id }}"><i class="fa fa-eye" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Vaata lähemalt"></i></a>
                                        <a class="mr-2" style="color: #228B22;" href="/edit-practice-group/{{ $practiceGroup->id }}"><i class="fa fa-pencil-square-o" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Muuda"></i></a>
                                        <a style="color: #E60011;" href="/delete-practice-group/{{ $practiceGroup->id }}"><i class="fa fa-trash-o" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Kustuta"></i></a>

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

