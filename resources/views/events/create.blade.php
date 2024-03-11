@extends('layouts.app')

@section('title')
Events
@endsection

@section('link')
<link href="{{ URL::asset('plugins/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('css/sweetalert.css') }}" rel="stylesheet">
<link href="{{ URL::asset('plugins/datatables/media/css/dataTables.bootstrap.css') }}" rel="stylesheet">
@endsection

@section('content')
<!--CONTENT CONTAINER-->
<!--===================================================-->
<div id="content-container">
    <div id="page-head">
        <!--Page Title-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <div id="page-title">
            <h1 class="page-header text-overflow">Events</h1>
        </div>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--End page title-->
        <!--Breadcrumb-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-home"></i><a href="{{ route('dashboard') }}"> Dashboard</a>
            </li>
            <li class="active">All</li>
        </ol>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--End breadcrumb-->
    </div>
    <!--Page content-->
    <!--===================================================-->
    <div id="page-content">
        <!-- Basic Data Tables -->
        <!--===================================================-->
        <div class="panel rounded-top" style="background-color: #e8ddd3;">
            <div class="panel-heading card-block text-center">
                <h1 class="panel-title text-primary text-bold">Add Event</h1>
            </div>
            <div class="panel-body">
                <!--div style="height:100px;border:1px solid green">
                    Sort by Newest Members, Gender
                  </div-->
                <form method="post" action="{{ route('events.store') }}">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputTitle">Event Title</label>
                            <input type="text" class="form-control" id="inputTitle" name="title" placeholder="Event Title" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputLocation">Location</label>
                            <input type="text" class="form-control" name="location" id="inputLocation" placeholder="Event Location" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputDate">Date</label>
                            <input type="date" class="form-control" name="date" id="inputDate" placeholder="Event Date" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputTime">Time</label>
                            <input type="time" class="form-control" name="time" id="inputTime" placeholder="Event Time" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputDetails">Event Details</label>
                            <textarea rows="5" class="form-control" name="details" id="inputDetails" placeholder="Event Details"></textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputAssign">Assign To</label>
                            <input type="text" class="form-control" name="assign[]" id="inputAssign" placeholder="Assign To">
                            <!-- This field can be multiple, hence using [] in name -->
                        </div>
                        <!-- Other form fields go here -->
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>
        <!--===================================================-->
        <!-- End Striped Table -->
    </div>
    <!--===================================================-->
    <!--End page content-->
</div>
<!--===================================================-->
<!--END CONTENT CONTAINER-->
@endsection