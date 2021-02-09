@extends('layouts.master')
@section('title', 'Praktikabaas täpsemalt')
@section('content')
<section style="padding-top:20px">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
               <div class="row mb-2">
                   <div class="col-10">
                       <h3 style="color: #E60011">{{$practiceBase->nimi}}</h3>
                   </div>
                   <div class="col-2">
                       <a href="/practiceBases" class="btn btn-danger mr-4">Praktikabaasid</a>
                   </div>
               </div>
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
@endsection
