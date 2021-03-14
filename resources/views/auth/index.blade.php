@extends('layouts.admin')
@section('title', 'Eriala ja kursus dropdown')
@section('content')

<!--Dropdown for base->unit->dep-->
<div class="card col-md-12">
    <div class="card-header">
        <h4 class="card-title">LISA KURSUS</h4>
        <div class="card-body p-4">
            <div class="row d-flex" >
                <label for="" class="mt-2">Lisa seos erialaga</label>
                <div class="form-group col-md-6">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" style="border: 1px solid #888888;" id="basic-addon1">
                                <i class="fas fa-school fa-sm" style="color: #E60011;"></i>
                            </span>
                       </div>
                       <select name="speciality" class="custom-select custom-select-lg form-control input-lg">
                           <option value="">Vali eriala</option>

                           @foreach ($specialities as $key => $speciality)
                               <option value="{{ $key }}">{{ $speciality }}</option>
                           @endforeach

                       </select>
                   </div>
               </div>

                <div class="form-group col-md-6">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" style="border: 1px solid #888888;" id="basic-addon1">
                                <i class="fas fa-school fa-sm" style="color: #E60011;"></i>
                            </span>
                        </div>
                        <select name="course_id" class="custom-select custom-select-lg form-control input-lg">
                            <option value="">Vali kursus</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@csrf
@yield('course')


@endsection
@section('scripts')

@endsection

