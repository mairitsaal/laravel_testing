@extends('layouts.adminOthers')

@section('title')
    Student | Praktika
@endsection


@section('content')



            <div class="card col-md-12">
                <div class="card-header">
                    <h4 class="card-title">
                        {{$users->name}}
                    </h4>
                    <h5 style="margin-left: 60px;">
                        {{$users->courses->nimi}}
                    </h5>



                    <div class="card-body p-4">
                        <table id="" class="table table-striped display">
                            <thead style="text-align:center;">
                            <tr>

                                <th class="text-left">Praktikabaas</th>
                                <th class="text-left">Praktikaüksus</th>
                                <th class="text-left">Praktika osakond</th>
                                <th class="text-left">Praktikajuhendaja</th>
                                <th class="text-left">Hinnang</th>
                                <th class="text-left">Koolijuhendaja</th>
                                <th class="text-left">Hinnang</th>
                                <th class="text-left">Praktikanõuded</th>
                                <th class="text-left">Maht</th>
                                <th class="text-left">Praktika algus</th>
                                <th class="text-left">Praktika lõpp</th>
                                <th class="text-left">Staatus</th>

                            </tr>
                            </thead>
                            <tbody>


                                        <td class="text-left"></td>
                                        <td class="text-left"></td>
                                        <td class="text-left"></td>
                                        <td class="text-left"></td>
                                        <td class="text-left">Puudub</td>
                                        <td class="text-left"></td>
                                        <td class="text-left">Puudub</td>
                                        <td class="text-left">{{ $users->courses->reqruiment_id }}</td>
                                        <td class="text-left"></td>
                                        <td class="text-left"></td>
                                        <td class="text-left"></td>
                                        <td class="text-left">Praktikal</td>

                                        <td>



                                        </td>
                                    </tr>

                            </tbody>

                        </table>

                    </div>
                </div>
            </div>


@endsection


@section('scripts')

@endsection
