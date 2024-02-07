@extends('admin.admin.layouts.main')
@section('content')

<div class="container">
    <div class=" text-center my-3 ">
        <h2> <b> Scheduled Meetings</b></h2>
    </div>

    <div class="container mt-5">

        <!-- Meeting Table -->

        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Details</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Status</th>
                    <th>Adjust Details</th>
                </tr>
            </thead>
            <tbody id="meeting-table-body">
                <!-- Scheduled meetings will be inserted here -->
            </tbody>
        </table>
    </div>
</div>


@endsection