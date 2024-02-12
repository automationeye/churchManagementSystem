@extends('admin.admin.layouts.main')
@section('content')
<div class="container">
    <div class=" text-center my-3 ">
        <h2> <b> Schedule Meetings</b></h2>
    </div>
    <div class="container mt-5">

        <form method="POST" action="{{ url('meeting/post') }}">
            @csrf

            <div class="form-group">
                <label> Meeting Title :</label>
                <input type="text" class="form-control" value="" name="title">

            </div>


            <div class="form-group">
                <label>Meeting Details :</label>
                <input type="text" class="form-control" value=" " name="description">

            </div>

            <div class="form-group">
                <label>Meeting Details:</label>
                <select class="form-control" name="venue">

                    <option value="physical">Physical</option>
                    <option value="virtual">virtual</option>

                </select>
            </div>

            <div class="form-group">

                <label for="meeting-date">Select Meeting Date and Time:</label>
                <input type="datetime-local" class="form-control" id="meeting-date" name="datetime">
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