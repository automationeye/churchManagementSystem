@extends('layouts.app')

@section('title')
Teams
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
            <h1 class="page-header text-overflow">Teams</h1>
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
                <h1 class="panel-title text-primary text-bold">Add Team</h1>
            </div>
            <div class="panel-body">
                <!--div style="height:100px;border:1px solid green">
                    Sort by Newest Members, Gender
                  </div-->
                <form method="post" action="{{ route('sermons.store') }}">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputName">Team name</label>
                            <input type="text" class="form-control" id="inputName" name="team" placeholder="Sermon Title" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputName">Leader</label>
                            <select class="form-control">
                                <option></
                            </select>
                            <input type="text" class="form-control" name="by" id="inputName" placeholder="Sermon Leader" required>
                        </div>
                        
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
