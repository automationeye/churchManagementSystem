@extends('layouts.app')

@section('title')
Sermons
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
                <h1 class="panel-title text-primary text-bold">List of Leaders</h1>
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


                                    <th>Leader id</th>
                                    <th>Leader name</th>
                                    <th>Team</th>

                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($leaders as $leader)
                                <tr>
                                    <td>{{ $leader->id }}</td>
                                    <td>{{ $leader->fullName }}</td>
                                    <td>{{ App\ChurchTeams::where('id', $leader->team)->value('team') }}</td>
                                    <td>{{ $leader->created_at }}</td>
                                    <td>
                                        <button class="btn btn-info">Edit</button>
                                        <button class="btn btn-danger">Delete</button>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>

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