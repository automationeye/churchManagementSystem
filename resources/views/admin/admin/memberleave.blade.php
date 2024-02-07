@extends('admin.admin.layouts.main')
@section('content')
<div class="container">


    <div class="row mt-5 bg-white shadow ">
        <div class="col-12">
            <div class=" text-center my-3 ">
                <h4>Member's Leave Requests</h4>
            </div>
            <table class="table  table-hover">
                <thead>
                    <tr class="bg-dark">
                        <th scope="col">Name</th>
                        <th scope="col">Tel. No</th>

                        <th scope="col"> Email</th>
                        <th scope="col">Reason</th>
                        <th scope="col">Starting Date :</th>
                        <th scope="col">Last Date :</th>
                        <th scope="col">Status :</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection