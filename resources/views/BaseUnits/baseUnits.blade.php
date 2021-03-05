@extends('layouts.admin')
@section('title', 'Baasiga seotud üksused')
@section('content')

    <div class="card col-md-12">
        <div class="card-header">
            <h4 class="card-title">LISA PRAKTIKABAASILE ÜKSUS</h4>
            <div class="card-body p-4">
                <div>
                    <div>
                        <a href="/add-unit-to-base" class="btn btn-danger ml-5">
                            Lisa uus praktikabaas
                        </a>
                    </div>

                        @if(Session::has('BaseUnits_deleted'))
                            <div class="alert alert-success" role="alert">
                                {{Session::get('BaseUnits_deleted')}}
                            </div>
                        @endif

                        <table id="datatable" class="table table-striped display">
                            <thead style="text-align:center;">
                                <tr>
                                    <th class="text-center">Id</th>
                                    <th class="text-center">Id</th>
                                    <th class="text-left">Praktikabaas</th>
                                    <th class="text-center">Id</th>
                                    <th class="text-left">Praktikaüksus</th>

                                    <th class="text-center">Muuda</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($baseUnits as $baseUnit)
                                <tr>
                                    <td class="text-center">{{$baseUnit->id}}</td>
                                    <td class="text-center">{{$baseUnit->practice_base_id}}</td>

                                    <!-- Name from primary table-->

                                    <td class="text-left">{{$baseUnit->practiceBase->nimi}}</td>
                                    <!-- Id from base_units table-->


                                    <td class="text-center">{{$baseUnit->practice_unit_id}}</td>
                                    <!-- Unit name from practice_units table-->

                                    <td class="text-left">{{$baseUnit->practiceUnit->nimi}}</td>
                                    <td>
                                        <!--<a class="mr-2" style="color: darkorange" href="/baseUnits/{{ $baseUnit->id }}"><i class="fa fa-eye" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Vaata lähemalt"></i></a>-->
                                        <a class="mr-2" style="color: forestgreen" href="/edit-unit-to-base/{{ $baseUnit->id }}"><i class="fa fa-pencil-square-o" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Muuda"></i></a>
                                        <a style="color: red" href="/delete-unit-to-base/{{ $baseUnit->id }}"><i class="fa fa-trash-o" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Kustuta"></i></a>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>

        $(document).ready(function() {
            $('#datatable').DataTable({
                "pagingType": "full_numbers",
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search records",
                }

            });

            var table = $('#datatable').DataTable();

            // Edit record
            table.on( 'click', '.edit', function () {
                $tr = $(this).closest('tr');
                if($($tr).hasClass('child')){
                    $tr = $tr.prev('.parent');
                }

                var data = table.row($tr).data();
                alert( 'You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.' );
            } );

            // Delete a record
            table.on( 'click', '.remove', function (e) {
                $tr = $(this).closest('tr');
                if($($tr).hasClass('child')){
                    $tr = $tr.prev('.parent');
                }
                table.row($tr).remove().draw();
                e.preventDefault();
            } );

            //Like record
            table.on( 'click', '.like', function () {
                alert('You clicked on Like button');
            });
        });


    </script>


@endsection

@section('scripts')

@endsection

