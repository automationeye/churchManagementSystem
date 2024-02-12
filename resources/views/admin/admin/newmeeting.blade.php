@extends('admin.admin.layouts.main')
@section('content')
<div class="container">
    <div class=" text-center my-3 ">
        <h2> <b> Schedule Meetings</b></h2>
    </div>
    <div class="container mt-5">

        <form action="{{ url('meeting/post') }}">


            <div class="form-group">
                <label> Meeting Title :</label>
                <input type="text" class="form-control" value="" name="title">

            </div>


            <div class="form-group">
                <label>Meeting Details :</label>
                <input type="text" class="form-control" value=" " name="text">

            </div>

            <div class="form-group">

                <label for="meeting-date">Select Meeting Date and Time:</label>
                <input type="datetime-local" class="form-control" id="meeting-date" name="meeting-date">
            </div>
            <button type="submit" class="btn btn-primary">Schedule Meeting</button>
        </form>


        <!-- Meeting Table -->
        <h2 class="mt-5">Scheduled Meetings</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Details</th>
                    <th>Date</th>
                    <th>Time</th>
                </tr>
            </thead>
            <tbody id="meeting-table-body">
                <!-- Scheduled meetings will be inserted here -->
            </tbody>
        </table>
    </div>

</div>





@endsection