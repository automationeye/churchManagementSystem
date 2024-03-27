@extends('layouts.app')

@section('title')
Leaders
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
            <h1 class="page-header text-overflow">Leaders</h1>
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
        @include('layouts.error')
        <!-- Basic Data Tables -->
        <!--===================================================-->
        <div class="panel rounded-top" style="background-color: #e8ddd3;">
            <div class="panel-heading card-block text-center">
                <h1 class="panel-title text-primary text-bold">Create Announcement</h1>
            </div>
            <div class="panel-body">
                <!--div style="height:100px;border:1px solid green">
                    Sort by Newest Members, Gender
                  </div-->
                <form method="POST" action=" {{ url('announcement/post') }}">
                    @csrf
                    <div class="form-group">
                        <label> Announcement Details :</label>
                        <input type="text" class="form-control" value="" name="details">

                    </div>


                    <div class="form-group">
                        <label>By Who:</label>
                        <select class="form-control" name="by_who">
                            <option value="Bishop">Bishop</option>
                            <option value="leader1">leader1</option>
                            <option value="leader2">leader2</option>
                            <!-- Add more options as needed -->
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="start-date">Select Start Date:</label>
                        <input type="date" class="form-control" id="start-date" name="start_date">
                    </div>

                    <div class="form-group">
                        <label for="stop-date">Select Stop Date:</label>
                        <input type="date" class="form-control" id="stop-date" name="stop_date">
                    </div>

                    <div class="form-group">
                        <label for="start-time">Select Start Time:</label>
                        <input type="time" class="form-control" id="start-time" name="start_time">
                    </div>

                    <div class="form-group">
                        <label for="stop-time">Select Stop Time:</label>
                        <input type="time" class="form-control" id="stop-time" name="stop_time">
                    </div>

                    <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
                        <div class="btn-group">
                            <input type="submit" value="Save" class="btn btn-primary w-20 " name="save_changes">
                        </div>
                        <div class="input-group">
                            <a href="" class="btn btn-primary w-20">Close</a>
                        </div>
                    </div>
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