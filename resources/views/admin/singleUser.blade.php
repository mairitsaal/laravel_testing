@extends('layouts.admin')
@section('title', 'Kasutaja täpsemalt')
@section('content')

    <div class="row">
        <div class="card col-md-12">
            <div class="card-header">
                <div class="title mt-4 ml-4" style="color: #E60011;"><h3>{{$users->name}}</h3></div>
                <div class="card-body">
                    <table class="table table-striped display">
                        <tbody>

                        <tr>
                            <th class="text-left pl-4">Telefon</th>
                            <td class="text-left">{{$users->telefon}}</td>

                        </tr>
                        <tr>
                            <th class="text-left pl-4">Email</th>
                            <td class="text-left">{{$users->email}}</td>

                        </tr>
                        <tr>
                            <th class="text-left pl-4">Kasutaja roll/õigused</th>
                            <td class="text-left">{{$users->usertype}}</td>

                        </tr>
                        <tr>
                            <th class="text-left pl-4">Kasutaja amet</th>
                            <td class="text-left">{{$users->position}}</td>

                        </tr>
                        <tr>
                            <th class="text-left pl-4">Seotud kursus</th>
                            <td class="text-left">{{$users->courses->nimi}}</td>

                        </tr>

                        </tbody>

                    </table>
                    <div>
                        <a href="/role-register" class="btn btn-info" style="margin-top:30px;">Vaata tabelit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
@endsection
