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
        @include('layouts.error')
        <!-- Basic Data Tables -->
        <!--===================================================-->
        <div class="panel rounded-top" style="background-color: #e8ddd3;">
            <div class="panel-heading card-block text-center">
                <h1 class="panel-title text-primary text-bold">List of Events</h1>
            </div>
            <div class="panel-body">
                <!--div style="height:100px;border:1px solid green">
                    Sort by Newest Members, Gender
                  </div-->
                <form id="users-form" onsubmit="return false;">
                    <div class="table-responsive">
                        <table id="users-table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Event Title</th>
                                    <th>Event Details</th>
                                    <th>Location</th>
                                    <th>Date Time</th>
                                   

                                </tr>
                            </thead>
                            <tbody>
                                <!-- Scheduled eventss will be inserted here -->
                                <?php $events = App\Event::all() ?>

                                @foreach($events as $event)
                                <tr>
                                    
                                    <td>{{ $event->title }}</td>
                                    <td>{{ $event->details }}</td>
                                    <td>{{ $event->location }}</td>
                                    <td>{{ $event->date }} {{ $event->time }}</td>
                                    
                                </tr>
                                @endforeach


                            </tbody>
                        </table>
                        <select id="action" name="action">
                            <option>with selected</option>
                            <option value="delete">delete</option>
                        </select>
                        <input class="btn-danger" id="apply" type="button" value="apply">
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