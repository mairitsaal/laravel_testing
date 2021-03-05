@extends('layouts.admin')
@section('title', 'Lisa kursus erialale')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Lisa kursus erialale</h4>

                            <!--Controlleri ja route lisamine-->
                            @if(Session::has('specialityCourse_created'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('specialityCourse_created') }}
                                </div>
                            @endif

                            <form method="POST" action="{{ route('specialityCourse.create') }}" ><!--class="was-validated" novalidate-->
                            @csrf

                            <!--Dropdown menu getting list from db-->
                            <row class="col-12 d-flex mt-4">
                                <div class="col-4">
                                    <h6 class="ml-2" style="color: #000">Vali eriala</h6>
                                <select for="dropdown" class="form-control input-sm custom-select custom-select-lg" name="speciality" id="speciality">

                                        <option selected>Vali eriala</option>

                                        @foreach ($specialities as $speciality)
                                            <option value="{{ $speciality->id }}">
                                                {{ $speciality->nimi }}
                                            </option>
                                        @endforeach

                                    </select>


                                    @if ($errors->has('dropdown'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('dropdown') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-4">
                                    <h6 class="ml-2" style="color: #000">Vali kursus</h6>
                                    <select for="dropdown" class="form-control input-sm custom-select custom-select-lg" name="course" id="course">

                                    </select>
                                </div>
                            </row>


                            <div class="mb-3">

                                <button type="submit" class="btn btn-danger">Lisa erialale kursus</button>
                                <a href="/dashboard" class="btn btn-success" style="margin-top:30px;">Tühista</a>
                                <a href="/specialityCourses" class="btn btn-info" style="margin-top:30px;">Vaata tabelit</a>
                            </div>

                            </form>
                        </div>
                    </div>
                 </div>
            </div>

@endsection
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function () {
        $('#speciality').on('change',function(e) {
            var speciality_id = e.target.value;
            $.ajax({
                url:"{{ route('sub-cat') }}",
                type:"POST",
                data: {
                    speciality_id: speciality_id
                },
                success:function (data) {
                    $('#course').empty();
                    $.each(data.courses[0].courses,function(index,course){
                        $('#course').append('<option value="'+course.id+'">'+course.name+'</option>');
                    })
                }
            })
        });
    });
</script>

@section('scripts')

@endsection


