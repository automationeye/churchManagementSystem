@extends('layouts.app')

@section('title')
Sermons
@endsection

@section('link')
<link href="{{ URL::asset('plugins/bootstrap-datepicker/bootstrap-datepicker.min.css') }}"
    rel="stylesheet">
<link href="{{ URL::asset('css/sweetalert.css') }}" rel="stylesheet">
<link href="{{ URL::asset('plugins/datatables/media/css/dataTables.bootstrap.css') }}"
    rel="stylesheet">
@endsection

@section('content')
<!--CONTENT CONTAINER-->
<!--===================================================-->
<div id="content-container">
    <div id="page-head">
        <!--Page Title-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <div id="page-title">
            <h1 class="page-header text-overflow">Sermons</h1>
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

                                    <th>Title</th>
                                    <th>By</th>
                                    <th>Verses</th> 
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($sermons as $sermon)
                                    <tr>

                                        <td>{{ $sermon->title }}</td>
                                        <td>{{ $sermon->by }}</td>
                                        <td>{{ $sermon->verses }}</td>
                                        <td>{{ $sermon->date }}</td>
                                        <td>
                                            @php
                                                // Convert the event date to a Carbon instance for easy comparison
                                                $eventDate = \Carbon\Carbon::parse($event->date);

                                                // Check if the event date is in the past
                                                $isPast = now()->gt($eventDate);
                                            @endphp

                                            @if($isPast)
                                                Passed
                                            @else
                                                Upcoming
                                            @endif
                                        </td>
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
