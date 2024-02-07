@extends('admin.admin.layouts.main')
@section('content')
<div class="container">


    <div class="row mt-5 bg-white shadow ">
        <div class="col-12">
            <div class=" text-center my-3 ">
                <h4>Members List</h4>
            </div>
            <table class="table  table-hover">
                <thead>
                    <tr class="bg-dark">
                        <th scope="col">Name</th>
                        <th scope="col">Tel. No</th>

                        <th scope="col"> Email</th>
                        <th scope="col">Team</th>
                        <th scope="col">Status</th>
                        <th scope="col">Attendance</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection