@extends('layouts.admin')

@section('title')
    Register Roles | Praktika
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Registreeritud rollid</h4>
                    <!--Controlleri ja route lisamine-->
                    @if(Session::has('user_updated'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('user_updated') }}
                        </div>
                    @endif
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                            <th>Id</th>
                            <th>Nimi</th>
                            <th>Telefon</th>
                            <th>Email</th>
                            <th>Roll</th>

                            <th>Muuda</th>
                            </thead>
                            <tbody>

                            @foreach ($users as $row)
                            <tr>
                                <td>{{$row->id}}</td>
                                <td>{{$row->name}}</td>
                                <td>{{$row->phone}}</td>
                                <td>{{$row->email}}</td>
                                <td>{{$row->usertype}}</td>
                                <td class="d-flex">
                                    <form action="/delete-role-register/{{$row->id}}" method="POST">
                                    <a  class="mr-2" style="color: darkorange"><i class="fa fa-eye" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Vaata lähemalt"></i></a>
                                    <a href="/edit-register-user/{{ $row->id }}" style="color: forestgreen"><i class="fa fa-pencil-square-o" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Muuda"></i></a>

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" style="color: red; background-color: transparent; border: none; " ><i class="fa fa-trash-o" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Kustuta"></i></button>
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
    </div>
@endsection


@section('scripts')

@endsection



