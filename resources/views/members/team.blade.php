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
                                    Team Members
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
                                    <th>Name:</th>
                                    <th>Email: </th>
                                    <th>Phone:</th>
                                    <th>Date </th>
                                </tr>


                            </thead>
                            <tbody>

                                <tr>
                                    <td colspan="4">No Records found</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>





    </div>
</div>




@endsection