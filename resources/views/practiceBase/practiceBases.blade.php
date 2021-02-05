@extends('layouts.app')
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Praktikabaasid</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/a8018f10c4.js" crossorigin="anonymous"></script>
</head>
<style>
    .form-group {
        padding-top: 2px;
        padding-bottom: 2px;
    }
</style>
<body>
<section style="padding-top:60px">
    <div class="container-fluid m-0">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h3 class="m-4" style="color: #E60011">PRAKTIKABAASID</h3>
                <a href="/add-practice-base" class="btn btn-danger ml-4">Lisa uus praktikabaas</a>
                <div class="card" style="border: none;">
                    <div class="card-body">

                        @if(Session::has('practiceBase_deleted'))
                            <div class="alert alert-success" role="alert">
                                {{Session::get('practiceBase_deleted')}}
                            </div>
                        @endif

                        <table class="table table-striped">
                            <thead style="text-align:center;">
                                <tr>
                                    <th>Id</th>
                                    <th>Nimi</th>
                                    <th>Lep. nr</th>
                                    <th>Reg. nr</th>
                                    <th>Aadress</th>
                                    <th>Telefon</th>
                                    <th>Email</th>
                                    <th>Lepingu algus</th>
                                    <th>Lepingu lõpp</th>
                                    <th>Allkirjastaja</th>
                                    <th>Tunni hind</th>
                                    <th>Kontakt baasis</th>
                                    <th>Märkused</th>
                                    <th>Muuda</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($practiceBases as $practiceBase)
                                <tr>
                                    <td>{{$practiceBase->id}}</td>
                                    <td>{{$practiceBase->nimi}}</td>
                                    <td>{{$practiceBase->lepinguNr}}</td>
                                    <td>{{$practiceBase->registriNr}}</td>
                                    <td>{{$practiceBase->aadress}}</td>
                                    <td>{{$practiceBase->telefon}}</td>
                                    <td>{{$practiceBase->email}}</td>
                                    <td>{{$practiceBase->lepinguAlgus}}</td>
                                    <td>{{$practiceBase->lepinguLopp}}</td>
                                    <td>{{$practiceBase->allkirjastaja}}</td>
                                    <td>{{$practiceBase->tunniHind}}</td>
                                    <td>{{$practiceBase->kontaktBaasis}}</td>
                                    <td>{{$practiceBase->markused}}</td>
                                    <td>

                                        <a href="/practiceBases/{{ $practiceBase->id }}" class="btn btn-info mb-2">Vaata</a>
                                        <a href="/edit-practice-base/{{ $practiceBase->id }}" class="btn btn-success mb-2">Muuda</a>
                                        <a href="/delete-practice-base/{{ $practiceBase->id }}" class="btn btn-danger">Kustuta</a>
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
</section>
<!-- Include jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<!-- Include Date Range Picker -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>





<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

</body>
</html>
