@extends('layouts.app')
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Praktikabaas täpsemalt</title>
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
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h3 class="m-4" style="color: #E60011">{{$practiceBase->nimi}}</h3>
                <div class="card" style="border: 1px solid #EDEDED; background-color: #F5F5F5">
                    <div class="card-body p-4">
                        <p>{{$practiceBase->lepinguNr}}</p>
                        <p>{{$practiceBase->registriNr}}</p>
                        <p>{{$practiceBase->aadress}}</p>
                        <p>{{$practiceBase->telefon}}</p>
                        <p>{{$practiceBase->email}}</p>
                        <p>{{$practiceBase->lepinguAlgus}}</p>
                        <p>{{$practiceBase->lepinguLopp}}</p>
                        <p>{{$practiceBase->tunniHind}}</p>
                        <p>{{$practiceBase->allkirjastaja}}</p>
                        <p>{{$practiceBase->kontaktBaasis}}</p>
                        <p>{{$practiceBase->markused}}</p>

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
