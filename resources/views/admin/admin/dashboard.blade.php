@extends('admin.admin.layouts.main')
@section('content')
<div class="container">

    <div class=" text-center my-3 ">
        <h2> <b> Administrator Dashboard</b></h2>
    </div>

    <div class="row mt-5">
        <div class="col-4">
            <div class="card shadow " style="width: 18rem;">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item text-center">Meetings</li>
                    <li class="list-group-item">Total Admin : 0 </li>
                    <li class="list-group-item text-center"><a href="manage-admin.php"><b>View All Admins</b></a></li>
                </ul>
            </div>
        </div>
        <div class="col-4">
            <div class="card shadow " style="width: 18rem;">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item text-center">Announcements</li>
                    <li class="list-group-item">Total Announcements : 0</li>
                    <li class="list-group-item text-center"><a href="manage-employee.php"> <b>View All Announcements</b></a></li>
                </ul>
            </div>
        </div>
        <div class="col-4">
            <div class="card shadow " style="width: 18rem;">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item text-center">Attendance</li>
                    <li class="list-group-item">Today : </li>
                    <li class="list-group-item">Tomorrow : </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row mt-5 ">

        <div class="col-4">
            <div class="card shadow " style="width: 18rem;">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item text-center">Total Members </li>
                    <li class="list-group-item">All Members : </li>
                    <li class="list-group-item">Available Members : </li>
                </ul>
            </div>
        </div>


        <div class="col-4">
            <div class="card shadow " style="width: 18rem;">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item text-center">Members on Leave </li>
                    <li class="list-group-item">This Week : </li>
                    <li class="list-group-item">Next Week : </li>
                </ul>
            </div>
        </div>

        <div class="col-4">
            <div class="card shadow " style="width: 18rem;">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item text-center">Admins on Leave </li>
                    <li class="list-group-item">This Week : </li>
                    <li class="list-group-item">This Month : </li>
                </ul>
            </div>
        </div>
    </div>

</div>

@endsection