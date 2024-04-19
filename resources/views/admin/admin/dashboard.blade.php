@extends('admin.admin.layouts.main')
@section('content')
<div class="container">

    <div class=" text-center my-3 ">
        <h2> <b> Administrator Dashboard</b></h2>
    </div>

    <?php
    $user = Auth::guard('leader')->user();

    ?>




    <div class="row mt-5">
        <div class="cardy">
            <div class="col-4">
                <div class="card shadow " style="width: 18rem;">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item text-center">Meetings</li>
                        <li class="list-group-item">Total Meetings : {{ $total['meetings'] }}</li>
                        <li class="list-group-item text-center"><a href=""><b>View All Meetings</b></a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="cardy">
            <div class="col-4">
                <div class="card shadow " style="width: 18rem;">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item text-center">Announcements</li>
                        <li class="list-group-item">Total Announcements :{{ $total['announcements'] }}</li>
                        <li class="list-group-item text-center"><a href="/editannouncement"> <b>View All Announcements</b></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="cardy">
            <div class="col-4">
                <div class="card shadow " style="width: 18rem;">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item text-center">Number Of Teams</li>
                        <li class="list-group-item" style="text-align: center;"> {{ $total['teams'] }} </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5 ">

        <div class="cardy">
            <div class="col-4">
                <div class="card shadow " style="width: 18rem;">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item text-center">Total Members </li>
                        <li class="list-group-item" style="text-align: center;">All Members : {{ $total['members'] }} </li>

                    </ul>
                </div>
            </div>
        </div>

        <div class="cardy">
            <div class="col-4">
                <div class="card shadow " style="width: 18rem;">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item text-center">Members on Leave </li>
                        <li class="list-group-item" style="text-align: center;"> {{ $total['leaves'] }}</li>
                        <li class="list-group-item text-center"><a href="/memberleave"> <b>View A List Of Members On Leave</b></a></li>

                    </ul>
                </div>
            </div>
        </div>
        <div class="cardy">
            <div class="col-4">
                <div class="card shadow " style="width: 18rem;">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item text-center">Leaders </li>
                        <li class="list-group-item">Number Of Leaders {{ $total['admins'] }} </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection