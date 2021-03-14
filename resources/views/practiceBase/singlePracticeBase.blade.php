@extends('layouts.admin')
@section('title', 'Praktikabaas täpsemalt')
@section('content')

    <div class="row">
        <div class="card col-md-12">
            <div class="card-header">
                <div class="title mt-4 ml-4" style="color: #E60011;"><h3>{{$practiceBase->nimi}}</h3></div>
                <div class="card-body">
                    <table class="table table-striped display">
                        <tbody>
                        <tr>
                            <th class="text-left pl-4">Lepingu number</th>
                            <td class="text-left">{{$practiceBase->lepinguNr}}</td>

                        </tr>
                        <tr>
                            <th class="text-left pl-4">Registri number</th>
                            <td class="text-left">{{$practiceBase->registriNr}}</td>

                        </tr>
                        <tr>
                            <th class="text-left pl-4">Praktikabaasi aadress</th>
                            <td class="text-left">{{$practiceBase->aadress}}</td>

                        </tr>
                        <tr>
                            <th class="text-left pl-4">Kontakttelefon</th>
                            <td class="text-left">{{$practiceBase->telefon}}</td>

                        </tr>
                        <tr>
                            <th class="text-left pl-4">Telefon</th>
                            <td class="text-left">{{$practiceBase->email}}</td>

                        </tr>
                        <tr>
                            <th class="text-left pl-4">Lepingu alguskuupäev</th>
                            <td class="text-left">{{$practiceBase->lepinguAlgus}}</td>

                        </tr>
                        <tr>
                            <th class="text-left pl-4">Lepingu lõppkuupäev</th>
                            <td class="text-left">{{$practiceBase->lepinguLopp}}</td>

                        </tr>
                        <tr>
                            <th class="text-left pl-4">Tunnihind</th>
                            <td class="text-left">{{$practiceBase->tunniHind}}</td>

                        </tr>
                        <tr>
                            <th class="text-left pl-4">Praktikabaasi allkirjastaja</th>
                            <td class="text-left">{{$practiceBase->allkirjastaja}}</td>

                        </tr>
                        <tr>
                            <th class="text-left pl-4">Kontakt praktikabaasis</th>
                            <td class="text-left">{{$practiceBase->kontaktBaasis}}</td>

                        </tr>
                        <tr>
                            <th class="text-left pl-4">Lisamärkused</th>
                            <td class="text-left">{{$practiceBase->markused}}</td>

                        </tr>
                        </tbody>

                    </table>
                    <div>
                        <a href="/practiceBases" class="btn btn-info" style="margin-top:30px;">Vaata tabelit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
@endsection
