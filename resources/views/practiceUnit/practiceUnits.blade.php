@extends('layouts.admin')
@section('title', 'Praktikaüksused')
@section('content')

        <div class="card col-md-12">
            <div class="card-header">
                <h4 class="card-title"> PRAKTIKAÜKSUSED</h4>
                <div class="card-body">
                    <div>
                        <a href="/add-practice-unit" class="btn btn-danger ml-5 mb-3">
                            Lisa uus praktikaüksus
                        </a>
                    </div>
                    </div>
                    <div class="card-body">

                        @if(Session::has('practiceUnit_deleted'))
                            <div class="alert alert-success" role="alert">
                                {{Session::get('practiceUnit_deleted')}}
                            </div>
                        @endif

                            <button style="margin-bottom: 10px" class="btn btn-warning delete_all" data-url="{{ url('deleteAll-practice-unit') }}">Kustuta kõik</button>

                        <table id="dataTable" class="table table-striped" style="text-align:center;">
                            <thead>
                                <tr>
                                    <th width="50px"><input type="checkbox" id="master"></th>
                                    <th class="text-center">Id</th>
                                    <th class="text-left">Praktikaüksus</th>
                                    <th class="text-center">Muuda</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if($practiceUnits->count())
                                @foreach($practiceUnits as $key => $practiceUnit)

                                    <tr id="tr_{{$practiceUnit->id}}">
                                        <td><input type="checkbox" class="sub_chk" data-id="{{$practiceUnit->id}}"></td>
                                    <td>{{$practiceUnit->id}}</td>

                                    <td class="text-left">{{$practiceUnit->nimi}}</td>
                                    <td>

                                        <!--<a class="mr-2" style="color: darkorange" href="/practiceUnits/{{ $practiceUnit->id }}"><i class="fa fa-eye" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Vaata lähemalt"></i></a>-->
                                        <a class="mr-2" style="color: forestgreen" href="/edit-practice-unit/{{ $practiceUnit->id }}"><i class="fa fa-pencil-square-o" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Muuda"></i></a>
                                        <a style="color: red" href="/delete-practice-unit/{{ $practiceUnit->id }}"><i class="fa fa-trash-o" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Kustuta"></i></a>

                                    </td>
                                </tr>
                                @endforeach
                            @endif
                            </tbody>

                        </table>

                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(document).ready(function () {

                $('#master').on('click', function(e) {
                    if($(this).is(':checked',true))
                    {
                        $(".sub_chk").prop('checked', true);
                    } else {
                        $(".sub_chk").prop('checked',false);
                    }
                });

                $('.delete_all').on('click', function(e) {

                    var allVals = [];
                    $(".sub_chk:checked").each(function() {
                        allVals.push($(this).attr('data-id'));
                    });

                    if(allVals.length <=0)
                    {
                        alert("Palun vali read.");
                    }  else {

                        var check = confirm("Oled sa kindel, et soovid valitud ridu kustutada?");
                        if(check == true){

                            var join_selected_values = allVals.join(",");

                            $.ajax({
                                url: $(this).data('url'),
                                type: 'GET',
                                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                                data: 'ids='+join_selected_values,
                                success: function (data) {
                                    if (data['success']) {
                                        $(".sub_chk:checked").each(function() {
                                            $(this).parents("tr").remove();
                                        });
                                        alert(data['success']);
                                    } else if (data['error']) {
                                        alert(data['error']);
                                    } else {
                                        alert('Midagi läks viltu!');
                                    }
                                },
                                error: function (data) {
                                    alert(data.responseText);
                                }
                            });

                            $.each(allVals, function( index, value ) {
                                $('table tr').filter("[data-row-id='" + value + "']").remove();
                            });
                        }
                    }
                });

                $('[data-toggle=confirmation]').confirmation({
                    rootSelector: '[data-toggle=confirmation]',
                    onConfirm: function (event, element) {
                        element.trigger('confirm');
                    }
                });

                $(document).on('confirm', function (e) {
                    var ele = e.target;
                    e.preventDefault();

                    $.ajax({
                        url: ele.href,
                        type: 'GET',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        success: function (data) {
                            if (data['success']) {
                                $("#" + data['tr']).slideUp("slow");
                                alert(data['success']);
                            } else if (data['error']) {
                                alert(data['error']);
                            } else {
                                alert('Whoops Something went wrong!!');
                            }
                        },
                        error: function (data) {
                            alert(data.responseText);
                        }
                    });

                    return false;
                });
            });
        </script>
@endsection

@section('scripts')

@endsection

