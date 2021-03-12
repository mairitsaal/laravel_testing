@extends('layouts.admin')
@section('title', 'Praktikanõue täpsemalt')
@section('content')

    <div class="row">
        <div class="card col-md-12">
            <div class="card-header">
                <div class="title mt-4 ml-4" style="color: #E60011;"><h3>{{$practiceRequirement->nimi}}</h3></div>
                <div class="card-body">
                    <table class="table table-striped display">
                        <tbody>
                        <tr>
                            <th class="text-left pl-4">Seotud erialaga</th>
                            <td class="text-left">{{$practiceRequirement->courses->nimi}}</td>

                        </tr>
                        <tr>
                            <th class="text-left pl-4">Maht</th>
                            <td class="text-left">{{$practiceRequirement->maht}}</td>

                        </tr>
                        <tr>
                            <th class="text-left pl-4">Kirjeldus</th>
                            <td class="text-left">{{$practiceRequirement->kirjeldus}}</td>

                        </tr>
                        <tr>
                            <th class="text-left pl-4">Esimene päev kaasa võtta</th>
                            <td class="text-left">{{$practiceRequirement->esimenePaevKaasa}}</td>

                        </tr>
                        </tbody>

                    </table>
                    <div>
                        <a href="/practiceReqs" class="btn btn-info" style="margin-top:30px;">Vaata tabelit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection

@section('scripts')
@endsection
