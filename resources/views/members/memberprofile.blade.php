@extends('layouts.dashboard')

@section('content')

<div class="page-title-wrap typo-white">
    <div class="page-title-wrap-inner section-bg-img" data-bg="images/page-title.jpg">
        <span class="theme-overlay"></span>
        <div class="container">
            <div class="row text-center">
                <div class="col-md-12">

                </div>
            </div>
        </div>
    </div>
</div>

<div class="content-wrapper pad-none">
    <div class="content-inner">






        <div class="row">
            <div class="col-md-6 card card-primary card-outline" style="margin-left: 450px;">
                <div class="card-header">
                    <div class="button-section margin-top-35">
                        <div class="button-section margin-top-35"> <a class="btn btn-default"> {{ auth()->user()->team }} Member</a> </div>


                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <h5 class="card-title m-0">User</h5>
                        <table class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>

                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Team</th>
                                    <th>Phone Number</th>
                                    <th>Email</th>


                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $user->firstname }}</td>
                                    <td>{{ $user->lastname }}</td>
                                    <td>{{ $user->team }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->email }}</td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>



        </div>


        <br><br>






    </div>
</div>


</div>


@endsection
@section('scripts')





@endsection