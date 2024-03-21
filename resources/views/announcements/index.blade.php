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
                <h1 class="panel-title text-primary text-bold">List of Announcements</h1>
            </div>
            <div class="panel-body">
                <!--div style="height:100px;border:1px solid green">
                    Sort by Newest Members, Gender
                  </div-->


                <form method="post" action="{{ route('announcements.save') }}">
                    @csrf
                    <input type="hidden" name="announcement_id" value="{{ $announcement->id }}">
                    <div class="form-group">
                        <label for="title">Announcement Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Team name" value="{{ old('title', $announcement->details) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="leader">Leader</label>
                        <select class="form-control" name="leader">
                            @foreach ($announcements as $announcement)
                            <!-- Output details of each announcement -->
                            <div>{{ $announcement->title }}</div>
                            <!-- Add other details as needed -->
                            @endforeach



                        </select>
                    </div>
                    <!-- Other form fields -->
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