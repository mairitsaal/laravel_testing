@extends('layouts.admin')
@section('title', 'Muuda eriala')
@section('content')

    <div class="card col-md-12">
        <div class="card-header">
            <h4 class="card-title">MUUDA ERIALA</h4>
            <div class="card-body p-4">
                <div>
                        <!--Controlleri ja route lisamine-->
                        @if(Session::has('speciality_updated'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('speciality_updated') }}
                            </div>
                        @endif

                        <form method="POST" action="{{route('speciality.update')}}">
                        @csrf
                            <input type="hidden" name="id" value="{{$speciality->id}}" />

                            <!--Eriala nimi-->
                            <div class="form-group col-md-12">
                                <label for="nimi" class="required-field">Eriala nimi</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                           <span class="input-group-text" style="background-color:#fff; border: 1px solid #888888;" id="basic-addon1">
                                               <i class="fas fa-envelope-open-text fa-sm" style="color: #E60011;"></i>
                                           </span>
                                    </div>
                                    <input type="text" name="nimi" id="nimi" class="form-control" aria-label="Eriala nimi" aria-describedby="basic-addon1" style="border: 1px solid #888888;" required data-toggle="tooltip" rel="tooltip" data-placement="top" title="Eriala nimi" value="{{$speciality->nimi}}">
                                </div>
                            </div>
                            <div class="row d-flex m-0 p-0">
                                <div class="form-group col-md-4">
                                    <label for="oppekava">Õppekava</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                               <span class="input-group-text" style="border: 1px solid #888888;" id="basic-addon1">
                                                   <i class="fas fa-school fa-sm" style="color: #E60011;"></i>
                                               </span>
                                        </div>
                                        <select name="oppekava" class="form-control label-control custom-select custom-select-lg">
                                            <option value="{{ $speciality->oppekava }}">{{ $speciality->oppekava }}</option>
                                            <option value="Rakenduskõrgharides">Rakenduskõrgharidus</option>
                                            <option value="Kutseõpe">Kutseõpe</option>
                                            <option value="Magistriõpe">Magistriõpe</option>
                                            <option value=""></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="oppevorm">Õppevorm</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                               <span class="input-group-text" style="border: 1px solid #888888;" id="basic-addon1">
                                                   <i class="fas fa-graduation-cap fa-sm" style="color: #E60011;"></i>
                                               </span>
                                        </div>
                                        <select name="oppevorm" class="form-control label-control custom-select custom-select-lg">
                                            <option value="{{ $speciality->oppevorm }}">{{ $speciality->oppevorm }}</option>
                                            <option value="Sessioonõpe">Sessioonõpe</option>
                                            <option value="Töökohapõhine">Töökohapõhine õpe</option>
                                            <option value="Statsionaarne">Statsionaarne õpe</option>
                                            <option value="Osakoormusega">Osakoormusega õpe</option>
                                            <option value=""></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="kestvus">Õppetöö kestvus</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                               <span class="input-group-text" style="border: 1px solid #888888;" id="basic-addon1">
                                                   <i class="fas fa-hourglass-half fa-sm" style="color: #E60011;"></i>
                                               </span>
                                        </div>
                                        <select name="kestvus" class="form-control label-control custom-select custom-select-lg">
                                            <option value="{{ $speciality->kestvus }}">{{ $speciality->kestvus }}</option>
                                            <option value="0.6">Pool aastat</option>
                                            <option value="1.0">Üks aasta</option>
                                            <option value="1.6">Poolteist aastat</option>
                                            <option value="2.0">Kaks aastat</option>
                                            <option value="2.6">Kaks ja pool aastat</option>
                                            <option value="3.0">Kolm aastat</option>
                                            <option value="3.6">Kolm ja pool aastat</option>
                                            <option value="4.0">Neli aastat</option>
                                            <option value="4.6">Neli ja pool aastat</option>
                                            <option value=""></option>
                                        </select>
                                    </div>
                                </div>
                            </div>



                            <div>
                                <button type="submit" class="btn btn-danger">Muuda</button>
                                <a href="/dashboard" class="btn btn-success" style="margin-top:30px;">Tühista</a>
                                <a href="/specialities" class="btn btn-info" style="margin-top:30px;">Vaata tabelit</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Include jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<!-- Include Date Range Picker -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>




<script>
    bootstrapValidate('#nimi', 'required:Sisesta eriala nimi')
    bootstrapValidate('#oppekava', 'required:Sisesta praktikabaasi aadress')
    bootstrapValidate('#oppetoo', 'required:Sisesta praktikabaasi aadress')
    bootstrapValidate('#kestvus', 'numeric:Sisesta telefoninumbrer')
</script>


@endsection
@section('scripts')

@endsection
