@extends('layouts.master')
@section('title', 'Praktikaosakond täpsemalt')
@section('content')
<section style="padding-top:20px">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
               <div class="row mb-2">
                   <div class="col-12">
                       <h3 style="color: #E60011">Praktikaüksus: {{$baseUnits->practice_base_id}}</h3>
                       <h3 style="color: #E60011">Praktika osakond: {{$baseUnits->practice_unit_id}}</h3>
                   </div>
                   <div class="col-12 m-2 text-right">
                       <a href="/practiceBases" class="btn btn-outline-danger mr-4">Praktikabaasid</a>
                       <a href="/practiceUnits" class="btn btn-outline-danger mr-4">Praktikaüksused</a>
                       <a href="/baseUnits" class="btn btn-outline-danger mr-4">Üksused ühendatud baasiga</a>

                   </div>
               </div>
            </div>
        </div>
    </div>
</section>
@endsection
