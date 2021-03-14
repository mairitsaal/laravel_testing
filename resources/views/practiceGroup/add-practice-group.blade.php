@extends('layouts.admin')
@section('title', 'Moodusta praktikagrupp')
@section('content')


    <div class="card col-md-12">
        <div class="card-header">
            <h4 class="card-title">MOODUSTA PRAKTIKAGRUPP</h4>
            <div class="card-body p-4">
                <div>
                           <!--Controlleri ja route lisamine-->
                           @if(Session::has('practiceGroup_created'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('practiceGroup_created') }}
                            </div>
                           @endif

                           <form method="POST" action="{{ route('practiceGroup.create') }}" enctype="multipart/form-data" ><!--class="was-validated" novalidate-->
                               @csrf



                               <form method="post" id="framework_form">
                                   <div class="form-group">
                                       <label>Select which Framework you have knowledge</label>
                                       <select id="framework" name="nimi[]" multiple class="form-control" >
                                           <option value="Codeigniter">Codeigniter</option>
                                           <option value="CakePHP">CakePHP</option>
                                           <option value="Laravel">Laravel</option>
                                           <option value="YII">YII</option>
                                           <option value="Zend">Zend</option>
                                           <option value="Symfony">Symfony</option>
                                           <option value="Phalcon">Phalcon</option>
                                           <option value="Slim">Slim</option>
                                       </select>
                                   </div>






                                   <button type="submit" class="btn btn-danger">Lisa praktikagrupp</button>
                                   <a href="/dashboard" class="btn btn-success" style="margin-top:30px;">Tühista</a>
                                   <a href="/practiceGroups" class="btn btn-info" style="margin-top:30px;">Vaata tabelit</a>



                           </form>


             </div>
         </div>
     </div>

    <!--layouts.app-->



<script>
    bootstrapValidate('#nimi', 'required:Sisesta praktikagrupi nimi')

</script>
        <script>
        $(document).ready(function(){
        $('#framework').multiselect({
        nonSelectedText: 'Select Framework',
        enableFiltering: true,
        enableCaseInsensitiveFiltering: true,
        buttonWidth:'400px'
        });

        $('#framework_form').on('submit', function(event){
        event.preventDefault();
        var form_data = $(this).serialize();
        $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        $.ajax({
        url:"{{ route('practiceGroup.store') }}",
        method:"POST",
        data:form_data,
        success:function(data)
        {
        $('#framework option:selected').each(function(){
        $(this).prop('selected', false);
        });
        $('#framework').multiselect('refresh');
        alert(data['success']);
        }
        });
        });
        });
        </script>
@endsection

@section('scripts')
    @endsection


