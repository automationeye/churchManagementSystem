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
                <label>Meeting Description :</label>
                <input type="text" class="form-control" value=" " name="description">

            </div>

            <div class="form-group">
                <label>Meeting Venue:</label>
                <input type="text" class="form-control" value=" " name="venue">


            </div>

            <div class="form-group">

                <label for="meeting-date">Select Meeting Date and Time:</label>
                <input type="datetime-local" class="form-control" id="meeting-date" name="datetime">
            </div>
            <button type="submit" class="btn btn-primary">Schedule Meeting</button>
        </form>


    </div>

</div>





@endsection