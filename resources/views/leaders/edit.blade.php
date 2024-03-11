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
            <h1 class="page-header text-overflow">Edit Leader Profile</h1>
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
                <a href="{{ route('leaders.index') }}">Leaders</a>
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
                        <h1 class="text-center" style="padding-top:5px">Edit Leader Profile</h2>
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
                                <form action="{{ route('update-leader', $leaders->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-group">
                                        <label for="firstname">full Name:</label>
                                        <input type="text" class="form-control" id="fullName" name="fullName" value="{{ $leaders->firstname }}" required>
                                    </div>





                                    <div class="form-group">
                                        <label for="lastname">Phone:</label>
                                        <input type="text" class="form-control" id="phone" name="phone" value="{{ $leaders->phone }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="lastname">Team:</label>
                                        <input type="text" class="form-control" id="team" name="team" value="{{ $leaders->team }}" required>
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
                    <div class="modal fade" id="demo-default-modal" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <!--Modal header-->
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                                    <h4 class="modal-title">Add a Relative</h4>
                                </div>


                                <!--Modal body-->
                                <div class="modal-body">

                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="demo-email-input">Search
                                            Relative</label>
                                        <div class="col-md-10">
                                            <input type="text" id="search-relative-input" class="form-control" name="name" placeholder="Enter relative Name">
                                        </div>
                                    </div>

                                    <div class="col-md-12" id="relatives-result-container"></div>
                                </div>

                                <!--Modal footer-->
                                <div class="modal-footer">
                                    <button data-dismiss="modal" id="close-modal-btn" class="btn btn-default" type="button">Close</button>
                                    <button class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
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