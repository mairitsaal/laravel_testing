@extends('layouts.admin')

@section('title')
    Infolaud | Praktika
@endsection


@section('content')
    <!--Messages-->
<div class="row d-flex">
    <div class="col-lg-3 col-sm-6">
        <div class="card card-stats">
            <div class="card-body ">
                <div class="statistics statistics-horizontal">
                    <div class="info info-horizontal">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon icon-primary icon-circle">
                                    <img src="/svg/love2.svg" style="width: 50px;">
                                </div>
                            </div>
                            <div class="col-7 text-right">
                                <h3 class="info-title">2</h3>
                             <h6 class="stats-title">UUT TEADET</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <hr>
            <div class="card-footer ">
                <div class="stats">
                    <i class="now-ui-icons arrows-1_refresh-69"></i> Update now
                </div>
            </div>
        </div>
    </div>
    <!--All users-->
    <div class="col-lg-3 col-sm-6">
        <div class="card card-stats">
            <div class="card-body ">
                <div class="statistics statistics-horizontal">
                    <div class="info info-horizontal">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon icon-primary icon-circle">
                                    <img src="/svg/group.svg" style="width: 60px;">
                                </div>
                            </div>
                            <div class="col-7 text-right">
                                <h3 class="info-title">{{ $count }}</h3>
                                <h6 class="stats-title">KASUTAJAT</h6>
                            </div>
                            <div class="col-12 text-right">
                                <h3 class="sorting m-0">{{ $students }} õpilast</h3>
                            </div>
                            <div class="col-12 text-right">
                                <h3 class="sorting m-0">{{ $practiceBaseInstructor }} praktikajuhendajat</h3>
                            </div>
                            <div class="col-12 text-right">
                                <h3 class="sorting m-0">{{ $schoolInstructor }} koolijuhendajat</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="card-footer ">
                <div class="stats">
                    <i class="now-ui-icons arrows-1_refresh-69"></i> Vaata lähemalt
                </div>
            </div>
        </div>
    </div>
    <!--All bases, units, departments-->
    <div class="col-lg-3 col-sm-6">
        <div class="card card-stats">
            <div class="card-body ">
                <div class="statistics statistics-horizontal">
                    <div class="info info-horizontal">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon icon-primary icon-circle">
                                    <img src="/svg/base_green.svg" style="width: 110px;">
                                </div>
                            </div>
                            <div class="col-7 text-right">
                                <h3 class="info-title">{{ $practiceBase }}</h3>
                                <h6 class="stats-title">PRAKTIKABAASI</h6>
                            </div>
                            <div class="col-12 text-right">
                                <h3 class="sorting m-0">{{ $practiceUnit }} praktikaüksust</h3>
                            </div>
                            <div class="col-12 text-right">
                                <h3 class="sorting m-0">{{ $practiceDepartment }} praktika osakonda</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="card-footer ">
                <div class="stats">
                    <i class="now-ui-icons arrows-1_refresh-69"></i> Vaata lähemalt
                </div>
            </div>
        </div>
    </div>
    <!--All specialities, courses-->
    <div class="col-lg-3 col-sm-6">
        <div class="card card-stats">
            <div class="card-body ">
                <div class="statistics statistics-horizontal">
                    <div class="info info-horizontal">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon icon-primary icon-circle">
                                    <img src="/svg/group_yellow.svg" style="width: 60px;">
                                </div>
                            </div>
                            <div class="col-7 text-right">
                                <h3 class="info-title">{{ $course }}</h3>
                                <h6 class="stats-title">KURSUST</h6>
                            </div>
                            <div class="col-12 text-right">
                                <h3 class="sorting m-0">{{ $speciality }} eriala</h3>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="card-footer ">
                <div class="stats">
                    <i class="now-ui-icons arrows-1_refresh-69"></i> Vaata lähemalt
                </div>
            </div>
        </div>
    </div>
</div>
    <!--All specialities, courses-->
<div class="row d-flex">
    <div class="col-lg-3 col-sm-6">
        <div class="card card-stats">
            <div class="card-body ">
                <div class="statistics statistics-horizontal">
                    <div class="info info-horizontal">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon icon-primary icon-circle">
                                    <img src="/svg/group_blue.svg" style="width: 60px;">
                                </div>
                            </div>
                            <div class="col-7 text-right">
                                <h3 class="info-title">x</h3>
                                <h6 class="stats-title">praktikat käimas</h6>
                            </div>
                            <div class="col-12 text-right">
                                <h3 class="sorting m-0">x praktikagruppi</h3>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="card-footer ">
                <div class="stats">
                    <i class="now-ui-icons arrows-1_refresh-69"></i> Vaata lähemalt
                </div>
            </div>
        </div>
    </div>
</div>



@endsection


@section('scripts')

@endsection



