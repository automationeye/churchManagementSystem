@extends('layouts.app')

@section('title')
Edit Member Profile
@endsection

@section('content')

<!--CONTENT CONTAINER-->
<!--===================================================-->
<div id="content-container">
    <div id="page-head">

        <!--Page Title-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <div id="page-title">
            <h1 class="page-header text-overflow">Edit Team Details</h1>
        </div>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--End page title-->


        <!--Breadcrumb-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <ol class="breadcrumb">
            <li>
                <a href="forms-general.html#">
                    <i class="demo-pli-home"></i>
                </a>
            </li>
            <li>
                <a href="{{ route('teams') }}">Team</a>
            </li>
            <li class="active">Edit</li>
        </ol>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--End breadcrumb-->

    </div>


    <!--Page content-->
    <!--===================================================-->
    <div id="page-content">



        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <div class="panel">
                    <div class="panel-heading">
                        <h1 class="text-center" style="padding-top:5px">Edit Team Details</h2>
                    </div>
                    <div class="col-lg-10 col-lg-offset-2">
                        @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                        @endif
                        @if (count($errors) > 0)
                        @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">{{ $error }}</div>
                        @endforeach
                        @endif
                    </div>


                    <div class="row panel-body">
                        <div class="">
                            <!-- BASIC FORM ELEMENTS -->
                            <!--===================================================-->
                            <div class="card-body">
                                <form action="{{ route('update-team', ['team' => $churchTeams->id]) }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-group">
                                        <label for="team">Team Name:</label>
                                        <input type="text" class="form-control" name="team" value="{{ $churchTeams->team }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="leader">Leader:</label>
                                        <input type="text" class="form-control" name="leader" value="{{ $churchTeams->leader }}" required>
                                    </div>



                                    <!-- Add more input fields for other member details -->

                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--===================================================-->
                    <!-- END BASIC FORM ELEMENTS -->



                    <!--Default Bootstrap Modal-->
                    <!--===================================================-->

                    <!--===================================================-->
                    <!--End Default Bootstrap Modal-->



                </div>
            </div>
        </div>


    </div>
    <!--===================================================-->
    <!--End page content-->

</div>
<!--===================================================-->
<!--END CONTENT CONTAINER-->

@endsection