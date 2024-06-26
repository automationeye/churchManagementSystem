@extends('admin.admin.layouts.main')
@section('content')

<div class="container">
    <div class=" text-center my-3 ">
        <h2> <b> Scheduled Meetings</b></h2>
    </div>

    <div class="container mt-5">

        <!-- Meeting Table -->

        <table class="table table-striped table-bordered" cellspacing="0" width="100%;">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Venue</th>
                    <th>Date & Time</th>
                    
                </tr>
            </thead>
            <tbody id="meeting-table-body">
                <!-- Scheduled meetings will be inserted here -->


                @foreach($meetings as $meeting)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $meeting->title }}</td>
                    <td>{{ $meeting->description }}</td>
                    <td>{{ $meeting->venue }}</td>
                    <td>{{ $meeting->datetime }}</td>
                    <td>



                        <form action="{{ route('delete-meeting', ['meeting' => $meeting->id]) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-info" onclick="return confirm('Are you sure you want to delete this meeting?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach


            </tbody>
        </table>
    </div>
</div>


@endsection