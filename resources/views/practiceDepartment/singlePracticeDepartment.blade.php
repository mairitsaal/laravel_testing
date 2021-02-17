@extends('layouts.master')
@section('title', 'Praktikaüksus täpsemalt')
@section('content')
<section style="padding-top:20px">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
               <div class="row mb-2">
                   <div class="col-6">
                       <h3 style="color: #E60011">{{$practiceDepartment->nimi}}</h3>
                   </div>
                   <div class="col-6">
                       <a href="/practiceBases" class="btn btn-outline-danger mr-4">Praktikabaasid</a>
                       <a href="/practiceUnits" class="btn btn-outline-danger mr-4">Praktikaüksused</a>
                       <a href="/practiceDepartments" class="btn btn-outline-danger mr-4">Praktika osakonnad</a>
                   </div>
               </div>
            </div>
        </div>
    </div>
</section>
@endsection
