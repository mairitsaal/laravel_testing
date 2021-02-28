@extends('layouts.admin')
@section('title', 'Dynamic dropdown')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header ">
                    <h4 class="card-title ">Dynamic dropdown</h4>


                            <!--Dropdown menu getting list from db-->
                                    <div class="row col-md-12">
                                        <h6 class="ml-4 mt-4" style="color: #000">Vali praktikabaas</h6>
                                        <div class="form-group col-md-4">
                                            <select name="practice_base_id" id="practice_base_id" class="form-control input-lg dynamic" data-dependent="practice_unit_id">
                                                <option value="0">Vali praktikabaas</option>
                                                @foreach($holeList as $practiceBases)
                                                    <option value="{{$practiceBases->practice_base_id}}">
                                                        {{ $practiceBases->practice_base_id }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <select name="practice_unit_id" id="practice_unit_id" class="form-control input-lg dynamic" data-dependent="practice_department_id">
                                                <option value="0">Vali praktikaüksus</option>
                                            </select>

                                        </div>

                                        <div class="form-group col-md-4">
                                            <select name="practice_department_id" id="practice_department_id" class="form-control input-lg">
                                                <option value="0">Vali praktika osakond</option>
                                            </select>

                                        </div>
                                    </div>
                                    @csrf
                            <!--<div class="mb-3">

                                <button type="submit" class="btn btn-danger">Lisa praktikabaasile</button>
                                <a href="/dashboard" class="btn btn-success" style="margin-top:30px;">Tühista</a>
                                <a href="/baseUnitsDeps" class="btn btn-info" style="margin-top:30px;">Vaata tabelit</a>
                            </div>-->

                </div>
            </div>
        </div>

    </div>
        <script>
            $(document).ready(function(){

                $('.dynamic').change(function(){
                    if($(this).val() != '')
                    {
                        var select =$(this).attr("id");
                        var value = $(this).val();
                        var dependent = $(this).data('dependent');
                        var _token = $('input[name="_token"]').val();
                        $.ajax({
                            url: "{{ route('addunitdeptobase.fetch') }}",
                            method:"POST",
                            data: {select: select, value: value, _token: _token, dependent: dependent},
                            success: function (result) {
                                $('#' + dependent).html(result);
                            }
                        });
                    }
                });
            });


        </script>

@endsection
@section('scripts')

@endsection



