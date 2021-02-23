@extends('layouts.admin')

@section('title')
    Register Roles | Praktika
@endsection


@section('content')

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Registreeritud kasutajad</h4>

                    <div>
                        <a href="/register" class="btn btn-danger ml-5 mb-3">
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
                    <table id="dataTable" class="table table-striped">

                            <thead class="text-primary">
                            <th>Id</th>
                            <th class="text-left">Nimi</th>
                            <th class="text-left">Telefon</th>
                            <th class="text-left">Email</th>
                            <th class="text-left">Roll</th>
                            <th class="text-center">Muuda</th>
                            </thead>
                            <tbody>

                            @foreach ($users as $row)
                            <tr>
                                <td>{{$row->id}}</td>
                                <td class="text-left">{{$row->name}}</td>
                                <td class="text-left">{{$row->phone}}</td>
                                <td class="text-left">{{$row->email}}</td>
                                <td class="text-left">{{$row->usertype}}</td>

                                <td class="text-center">

                                    <!--<a class="mr-2" style="color: forestgreen" href="/edit-register-user/{{ $row->id }}"><i class="fa fa-pencil-square-o" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Muuda"></i></a>
                                    <a style="color: red" href="/delete-register-user/{{ $row->id }}"><i class="fa fa-trash-o" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Kustuta"></i></a>
-->

                                     <form action="/delete-role-register/{{$row->id}}" method="POST">
                                        <a href="/edit-register-user/{{ $row->id }}" style="color: forestgreen">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Muuda">

                                            </i>
                                        </a>

                                        @csrf
                                @method('DELETE')

                                    <button type="submit" style="color: red; background-color: transparent; border: none; " >
                                        <i class="fa fa-trash-o" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Kustuta">

                                        </i>
                                    </button>
                                </form>

                                </td>
                            </tr>

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

@endsection


@section('scripts')

@endsection



