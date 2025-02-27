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


            <div class="col-lg-8">
                <div class="offset-md-2 col-md-8">
                    <div class="title-wrap text-center">
                        <div class="section-title">

                            <h2 class="section-title margin-top-5">
                                <a href="/team">
                                    {{ auth()->user()->team }} Team Members
                                </a>
                            </h2>
                            <span class="border-bottom center"></span>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">


                        <table class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>First Name:</th>
                                    <th>Last Name:</th>

                                </tr>


                            </thead>
                            <tbody>
                                @foreach($teamMembers as $member)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $member->firstname }}</td>
                                    <td>{{ $member->lastname }}</td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>





    </div>
</div>




@endsection