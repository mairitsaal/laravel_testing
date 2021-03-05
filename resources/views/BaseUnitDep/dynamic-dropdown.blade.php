@extends('layouts.admin')
@section('title', 'Dynamic dropdown')
@section('content')

    <!--Dropdown for base->unit->dep-->
    <div class="row d-flex" >
        <label for="" class="mt-2">Lisa seos praktikabaasiga</label>
        <div class="form-group col-md-4">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" style="border: 1px solid #888888;" id="basic-addon1">
                        <i class="fas fa-school fa-sm" style="color: #E60011;"></i>
                    </span>
                </div>
                <select name="practice_base_id" id="practice_base_id" class="custom-select custom-select-lg form-control input-lg dynamic " data-dependent="practice_unit_id" style="border: 1px solid #888888;" >
                    <option value="">Vali praktikabaas</option>

                </select>
            </div>
        </div>

        <div class="form-group col-md-4">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" style="border: 1px solid #888888;" id="basic-addon1">
                        <i class="fas fa-school fa-sm" style="color: #E60011;"></i>
                    </span>
                </div>
                <select name="practice_unit_id" id="practice_unit_id" class="custom-select custom-select-lg form-control input-lg dynamic" data-dependent="practice_department_id">
                    <option value="">Vali praktikaüksus</option>
                </select>
            </div>
        </div>

        <div class="form-group col-md-4">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" style="border: 1px solid #888888;" id="basic-addon1">
                        <i class="fas fa-school fa-sm" style="color: #E60011;"></i>
                    </span>
                </div>
                <select name="practice_department_id" id="practice_department_id" class="custom-select custom-select-lg form-control input-lg">
                    <option value="">Vali praktika osakond</option>
                </select>
            </div>
        </div>
    </div>
    @csrf
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script type=text/javascript>
        $('#practice_bases').change(function(){
            var practice_bases_id = $(this).val();
            if(practice_bases_id){
                $.ajax({
                    type:"GET",
                    url:"{{url('getUnits')}}?practice_base_id="+practice_bases_id,
                    success:function(res){
                        if(res){
                            $("#practice_units").empty();
                            $("#practice_units").append('<option>Vali praktikaüksus</option>');
                            $.each(res,function(key,value){
                                $("#practice_units").append('<option value="'+key+'">'+value+'</option>');
                            });

                        }else{
                            $("#practice_units").empty();
                        }
                    }
                });
            }else{
                $("#practice_units").empty();
                $("#practice_departments").empty();
            }
        });
        $('#practice_units').on('change',function(){
            var practice_units_id = $(this).val();
            if(practice_units_id){
                $.ajax({
                    type:"GET",
                    url:"{{url('getDepartments')}}?practice_units_id="+practice_units_id,
                    success:function(res){
                        if(res){
                            $("#practice_departments").empty();
                            $("#practice_departments").append('<option>Vali praktika osakond</option>');
                            $.each(res,function(key,value){
                                $("#practice_departments").append('<option value="'+key+'">'+value+'</option>');
                            });

                        }else{
                            $("#practice_departments").empty();
                        }
                    }
                });
            }else{
                $("#practice_departments").empty();
            }

        });
    </script>

@endsection
@section('scripts')

@endsection



