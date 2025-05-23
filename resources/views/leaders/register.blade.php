@extends('layouts.app')

@section('title')
Register Leaders
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
            <h1 class="page-header text-overflow">Register Leaders</h1>
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
                <h1 class="panel-title text-primary text-bold">Add Leader</h1>
            </div>
            <div class="panel-body">
                <!--div style="height:100px;border:1px solid green">
                    Sort by Newest Members, Gender
                  </div-->
                <form method="post" action="{{ route('leaders.register') }}">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label for="inputName" style="font-size: large;">Select Member For Promotion To Leadership Position</label>
                            <select name="memberId" class="form-control" data-style="btn-success" style="font-size: medium;" required>

                                <?php $members = App\Member::all() ?>

                                @foreach($members as $member)

                                <option value="{{ $member->id }}" style="font-size: large;">{{ $member->firstname }} {{ $member->lastname }} </option>

                                @endforeach

                            </select>

                        </div>


                    </div>

                    <br> <br> <br>

                    <button type="submit" class="btn btn-primary col-md-3" style="font-size: medium;">Register as Leader</button>

                </form>

                <form action="{{ route('delete-member', ['member' => $member->id]) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-info" onclick="return confirm('Are you sure you want to delete this member?')" style="font-size: medium;">Remove from the Members List</button>
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