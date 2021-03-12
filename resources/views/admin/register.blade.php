@extends('layouts.admin')

@section('title')
    Registreeritud kasutajad
@endsection


@section('content')

        <div class="col-md-12 m-0 p-0">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Registreeritud kasutajad</h4>

                    <div>
                        <a href="/register" class="btn btn-danger ml-5">
                            Registreeri uus kasutaja
                        </a>
                    </div>
                    @if(Session::has('user_deleted'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('user_deleted')}}
                        </div>
                    @endif

                    <!--Controlleri ja route lisamine-->
                    @if(Session::has('user_updated'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('user_updated') }}
                        </div>
                    @endif
                </div>
                <div class="card-body">

                    <button style="margin-bottom: 10px" class="btn btn-warning delete_all mb-3 mt-0 ml-5" data-url="{{ url('deleteAll-users') }}">Kustuta kõik</button>
                    <table id="dataTable" class="table table-striped">

                        <!-- Excel

                                    <form  method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="file" name="file" class="form-control">
                                        <br>
                                        <button class="btn btn-success">Import User Data</button>
                                        <a class="btn btn-warning" >Export User Data</a>
                                    </form>-->


                            <thead class="text-primary">
                            <th width="50px"><input type="checkbox" id="master"></th>
                            <th>Id</th>
                            <th class="text-left">Nimi</th>
                            <th class="text-left">Telefon</th>
                            <th class="text-left">Email</th>
                            <th class="text-left">Roll</th>
                            <th class="text-left">Amet</th>
                            <th class="text-left">Eriala</th>
                            <th class="text-center">Muuda</th>
                            </thead>
                            <tbody>

                            @if($users->count())
                                @foreach($users as $key => $row)

                                    <tr id="tr_{{$row->id}}">
                                        <td><input type="checkbox" class="sub_chk" data-id="{{$row->id}}"></td>
                                        <td>{{$row->id}}</td>

                                <td class="text-left">{{$row->name}}</td>
                                <td class="text-left">{{$row->phone}}</td>
                                <td class="text-left">{{$row->email}}</td>
                                <td class="text-left">{{$row->usertype}}</td>
                                <td class="text-left">{{$row->position}}</td>
                                <td class="text-left">{{$row->courses->nimi}}</td>

                                <td class="m-0 p-0">

                                    <!--<a class="mr-2" style="color: forestgreen" href="/edit-register-user/{{ $row->id }}"><i class="fa fa-pencil-square-o" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Muuda"></i></a>
                                    <a style="color: red" href="/delete-register-user/{{ $row->id }}"><i class="fa fa-trash-o" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Kustuta"></i></a>
-->

                                     <form action="/delete-role-register/{{$row->id}}" method="POST">
                                        <a href="/edit-register-user/{{ $row->id }}" style="color: forestgreen;">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Muuda"></i>
                                        </a>

                                        @csrf
                                        @method('DELETE')

                                        <button class="m-0 p-0" type="submit" style="color: red; background-color: transparent; border: none;" >
                                            <i class="fa fa-trash-o" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Kustuta"></i>
                                        </button>
                                    </form>
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



