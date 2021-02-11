@extends('layouts.admin')

@section('title')
    Register Roles | Praktika
@endsection


@section('content')
    <div class="row">

        <!-- Delete Modal -->
        <div class="modal fade" id="deleteModalPop" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Delete Modal -->

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



