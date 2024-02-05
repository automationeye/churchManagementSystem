@extends('admin.admin.layouts.main')
@section('content')
<div class="container">

    <div class="row mt-5">
        <div class="col-4">
            <div class="card shadow " style="width: 18rem;">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item text-center">Admins</li>
                    <li class="list-group-item">Total Admin : 0 </li>
                    <li class="list-group-item text-center"><a href="manage-admin.php"><b>View All Admins</b></a></li>
                </ul>
            </div>
        </div>
        <div class="col-4">
            <div class="card shadow " style="width: 18rem;">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item text-center">Members</li>
                    <li class="list-group-item">Total Members : 0</li>
                    <li class="list-group-item text-center"><a href="manage-employee.php"> <b>View All Members</b></a></li>
                </ul>
            </div>
        </div>
        <div class="col-4">
            <div class="card shadow " style="width: 18rem;">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item text-center">Members on  Leave (Daywise)</li>
                    <li class="list-group-item">Today :    </li>
                    <li class="list-group-item">Tomorrow :   </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- <div class="row mt-5">
        <div class="col-4">       
        </div>

        <div class="col-4">
            <div class="card shadow " style="width: 18rem;">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item text-center">Employees on Leave (Weekwise) </li>
                    <li class="list-group-item">This Week : </li>
                    <li class="list-group-item">Next Week : </li>
                </ul>
            </div>
        </div>
    </div> -->
    <div class="row mt-5 bg-white shadow "> 
    <div class="col-12">
            <div class=" text-center my-3 "> <h4>Members Leadership Board</h4> </div>
            <table class="table  table-hover">
        <thead>
            <tr class="bg-dark">
            <th scope="col">No.</th>
            <th scope="col">Members Id</th>
            <th scope="col">Members Name</th>
            <th scope="col">Members Email</th>
            <th scope="col">Total</th>
            </tr>
        </thead>
        <tbody>
        
        </tbody>
        </table>
    </div>
    </div>
</div>

@endsection
