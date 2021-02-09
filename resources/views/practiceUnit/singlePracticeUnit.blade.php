@extends('layouts.master')
@section('title', 'Praktikaüksus täpsemalt')
@section('content')
<section style="padding-top:20px">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
               <div class="row mb-2">
                   <div class="col-8">
                       <h3 style="color: #E60011">{{$practiceUnit->nimi}}</h3>
                   </div>
                   <div class="col-4">
                       <a href="/practiceBases" class="btn btn-outline-danger mr-4">Praktikabaasid</a>
                       <a href="/practiceUnits" class="btn btn-outline-danger mr-4">Praktikaüksused</a>
                   </div>
               </div>
            </div>
        </div>
    </div>
</section>
@endsection
