@extends('admin.admin.layouts.main')
@section('content')
<div class="container">
    <div class=" text-center my-3 ">
        <h2> <b> Schedule Meetings</b></h2>
    </div>
    <div class="row mt-5">

        <div class="col-4">

            <div class="card shadow " style="width: 18rem; ">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item text-center">Upcoming Meetings </li>
                    <li class="list-group-item">Total Meetings : 0 </li>
                    <li class="list-group-item text-center"><a href="/viewmeeting"><b>View All Meetings</b></a>

                    </li>
                </ul>
            </div>
        </div>
        <div class="col-4">
            <div class="card shadow " style="width: 18rem;">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item text-center"> Set Up New Meeting</li>

                    <li class="list-group-item text-center"><a href="/newmeeting"><b>Select The Date</b></a></li>
                </ul>
            </div>
        </div>
        <div class="col-4">
            <div class="card shadow " style="width: 18rem;">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item text-center">Cancel A Meeting</li>

                    <li class="list-group-item text-center"><a href="/viewmeeting"><b>Select The Date</b> </a></li>
                </ul>
            </div>
        </div>




    </div>





</div>



@endsection