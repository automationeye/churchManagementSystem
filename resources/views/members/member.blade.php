@extends('layouts.dashboard')

@section('content')

<style>
    <style><blade keyframes|%20spinner%20%7B%0D>to {
        transform: rotate(360deg);
    }
    }

    .spinner {
        display: inline-block;
        width: 1em;
        height: 1em;
        border: 2px solid rgba(0, 0, 0, 0.2);
        border-radius: 50%;
        border-top-color: #000;
        animation: spinner 0.6s linear infinite;
    }

    .button-loading {
        position: relative;
    }

    .button-loading .spinner {
        position: absolute;
        top: 50%;
        left: 50%;
        margin-top: -0.5em;
        margin-left: -0.5em;
    }

</style>

</style>

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
            <div class="col-lg-12">

                <br><br>
                @if(auth()->user()->team==null && auth()->user()->team_status==0)

                    <div class="card card-primary card-outline alert alert-danger" style="text-align: left;"
                        data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <p style="cursor: pointer;"> <strong> You are currently not enrolled to a team, <b> CLICK HERE
                                </b> to select a team and join one today </strong></p>
                    </div>
                @elseif(auth()->user()->team_status==0)

                    <div class="card card-primary card-outline alert alert-warning" style="text-align: left;">
                        You belong to team {{ auth()->user()->team }} but awaiting confirmation from admin
                    </div>

                @else

                    <div class="card card-primary card-outline alert alert-success" style="text-align: left;">
                        You belong to team {{ auth()->user()->team }}
                    </div>

                @endif


                <!-- if there is a new bishop announcement -->
                @if(count($bishopAnnouncements) > 0)
                    <div class="card card-primary card-outline alert alert-success">
                        <h4>Bishop Announcements</h4>
                        @foreach($bishopAnnouncements as $announcement)
                            <span style="text-align:center;">{{ $announcement->details }}</span><br>
                        @endforeach
                    </div>
                @endif


                <!-- if there is a new leader announcement -->



                @if(count($bishopAnnouncements) > 0)
                    <div class="card card-primary card-outline alert alert-success">
                        <h4>Leader Announcements</h4>
                        @foreach($leaderAnnouncements as $announcement)
                            <span style="text-align:center;"> {{ $announcement->details }}</span>
                            <br>
                        @endforeach
                    </div>
                @endif



            </div>
        </div>

        <div class="row">
            <div class="col-md-6 card card-primary card-outline">
                <div class="card-header">
                    <a href="/memberleaverequest" type="submit" class="btn btn-default">
                        <i class="fas fa-add"></i> Request Leave
                    </a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <h5 class="card-title m-0">My Leaves</h5>
                        <table class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Reason</th>
                                    <th>Status</th>

                                </tr>
                            </thead>
                            <tbody>

                                @if(count($leaves)>0)

                                    @foreach($leaves as $leave)

                                        <tr>
                                            <td>
                                           {{
                                                App\Member::find($leave->user_id)->firstname
                                            }}
                                            </td>
                                            <td>
                                                {{
                                                App\Member::find($leave->user_id)->lastname
                                            
                                           }}

                                            </td>
                                            <td>{{ $leave->from }}</td>
                                            <td>{{ $leave->to }}</td>
                                            <td>{{ $leave->reason }}</td>

                                            <td>

                                                @if($leave->status==0)
                                                    <span class="badge bg-warning text-dark">Pending</span>
                                                @elseif($leave->status==1)
                                                    <span class="badge bg-success">Approved</span>
                                                @else
                                                    <span class="badge bg-danger">Rejected</span>

                                                @endif
                                            </td>

                                        </tr>
                                    @endforeach

                                @else
                                    <tr>
                                        <td colspan="8">No Leave found found</td>
                                    </tr>
                                @endif




                            </tbody>
                        </table>
                    </div>
                </div>

            </div>


            <div class="col-md-6 ">


                <div class="card card-primary card-outline">
                    <div class="card-header">


                        <button type="submit" class="btn btn-default">
                            <i class="fas fa-add"></i> Upcoming Meetings
                        </button>



                    </div>

                    <div class="card-body">
                        <div class="table-responsive">

                            <table class="table table-bordered table-striped table-sm">
                                <thead>
                                    <tr>

                                        <th>Title</th>
                                        <th>Venue</th>
                                        <th>Date & Time</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody id="meeting-table-body">

                                    @php
                                        $userId = auth()->user()->id;
                                        $checkedInMeetings = App\GeneralAttendances::where('user_id', $userId)
                                        ->where('type', 'meeting')
                                        ->pluck('eventormeetingid')
                                        ->toArray();
                                    @endphp

                                    <input type="hidden" id="user_id" value="{{ Auth::user()->id }}">
                                    <!-- Scheduled meetings will be inserted here -->
                                    <?php
                                    
                                    use Carbon\Carbon;
                                    $meetings = App\Meeting::where('datetime', '>', Carbon::now())->get();  
                                    
                                    ?>

                                    @foreach($meetings as $meeting)
                                        <tr>
                                            <input type="hidden" class="meetingid" id="meetingid{{ $meeting->id }}"
                                                value="{{ $meeting->id }}">

                                            <td>{{ $meeting->title }}</td>
                                            <td>{{ $meeting->venue }}</td>
                                            <td>{{ $meeting->datetime }}</td>

                                            <td>
                                                @if(in_array($meeting->id, $checkedInMeetings))
                                                    <button class="btn btn-info checkin-btn" data-meeting-id="{{ $meeting->id }}" disabled>Checked in</button>
                                                @else
                                                    <button class="btn btn-info checkin-btn" data-meeting-id="{{ $meeting->id }}">Check in</button>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">

                    </div>
                </div>
            </div>
        </div>


        <br><br>


        <div class="row">
            <div class="col-md-6 card card-primary card-outline">
                <div class="card-header">
                    <button type="submit" class="btn btn-default">
                        <i class="fas fa-add"></i> Upcoming events
                    </button>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <h5 class="card-title m-0">Upcoming events</h5>
                        <table class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Event Title</th>
                                    <th>Location</th>
                                    <th>DateTime</th>
                                 

                                </tr>
                            </thead>
                            <tbody>
                                <!-- Scheduled eventss will be inserted here -->
                                <?php

                                
                                $events = App\Event::where('date', '>', Carbon::now())->get();
                                
                                
                                
                                ?>

                                @foreach($events as $event)
                                    <tr>
                                       
                                        <td>{{ $event->title }}</td>
                                       
                                        <td>{{ $event->location }}</td>
                                        <td>{{ $event->date }} {{ $event->time }}</td>
                                        <td></td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>

            </div>


            <div class="col-md-6">


                <div class="card card-primary card-outline">
                    <div class="card-header">


                        <button type="submit" class="btn btn-default">
                            <i class="fas fa-add"></i> My attendance History
                        </button>



                    </div>

                    <div class="card-body">
                        <div class="table-responsive">

                            <table class="table table-bordered table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th>Meeting</th>
                                        <th>type</th>
                                        <th>Checkin time</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php $attendances = App\GeneralAttendances::where('user_id', Auth::user()->id)->get(); ?>

                                    @foreach($attendances as $attendance)
                                        <tr>
                                            <td>
                                                @if($attendance->type=='meeting')
                                                    {{ App\Meeting::find($attendance->eventormeetingid)->title }}
                                                @else
                                                    {{ App\Event::find($attendance->eventormeetingid)->title }}
                                                @endif
                                            </td>
                                            <td>{{ $attendance->type }}</td>
                                            <td>{{ $attendance->created_at }}</td>
                                        </tr>

                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">

                    </div>
                </div>
            </div>
        </div>

        <br><br>


        <br><br>

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Select team</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form class="form-group" method="POST" action="{{ url('update/team') }}">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- Use col-md-12 for full width on medium and larger screens -->
                                    <label for="teamSelect" class="form-label">Select Branch</label>

                                    <?php $users = App\User::all(); ?>
                                    <select class="form-control" id="teamSelect" name="branch">
                                        @foreach($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->branchname }}</option>
                                        @endforeach
                                        <!-- Add more options as needed -->
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <!-- Use col-md-12 for full width on medium and larger screens -->
                                    <label for="teamSelect" class="form-label">Select Team</label>

                                    <?php $teams = App\ChurchTeams::all(); ?>
                                    <select class="form-control" id="teamSelect" name="team">
                                        @foreach($teams as $team)
                                            <option value="{{ $team->team }}">{{ $team->team }}</option>
                                        @endforeach
                                        <!-- Add more options as needed -->
                                    </select>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <!-- Use Bootstrap spacing class to add margin top -->
                                <div class="col-md-6">
                                    <!-- Use appropriate col classes for responsive layout -->
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                                <br>
                                <div class="col-md-6">
                                    <!-- Use appropriate col classes for responsive layout -->
                                    <button type="submit" class="btn btn-default">Submit for Approval</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
</div>


</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Attach click event listener to all buttons with class 'checkin-btn'
        document.querySelectorAll('.checkin-btn').forEach(button => {
            button.addEventListener('click', function () {


                // Get the meeting ID from the data attribute
                const meetingId = this.getAttribute('data-meeting-id');
                const hiddenInput = document.getElementById('meetingid' + meetingId);
                const userid = {{ Auth::user()->id }}; // Get the user ID from the hidden input

                // Add loading spinner
                button.classList.add('button-loading');
                button.innerHTML = '<div class="spinner"></div> Checking in...';
                button.disabled = true; // Disable button to prevent multiple clicks

                console.log("Button clicked".meetingId, hiddenInput.value);

                // Get current location
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(
                        function (position) {
                            const latitude = position.coords.latitude;
                            const longitude = position.coords.longitude;
                            console.log("Meeting ID: " + hiddenInput.value);
                            console.log("User ID: " + userid);
                            console.log("Latitude: " + latitude + ", Longitude: " +
                                longitude);

                            // You can send this data to your server or process it further here
                            // Example: Send data to the server using AJAX

                            fetch('/api/checkin', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}' // Include CSRF token for Laravel
                                },
                                body: JSON.stringify({
                                    meeting_id: hiddenInput.value,
                                    user_id: userid,
                                    type: 'meeting',
                                    latitude: latitude,
                                    longitude: longitude
                                })
                            }).then(response => {
                                return response.json();
                            }).then(data => {
                                console.log('Success:', data);
                                // Remove loading spinner
                                button.classList.remove('button-loading');
                                button.innerHTML = 'Checked in';
                                button.disabled =
                                true; // Disable button after check-in

                            }).catch(error => {
                                console.error('Error:', error);

                                button.classList.remove('button-loading');
                                button.innerHTML = 'Check in';
                                button.disabled = false;
                            });

                        },
                        function (error) {
                            console.error("Error Code = " + error.code + " - " + error
                                .message);
                        }
                    );
                } else {
                    console.error("Geolocation is not supported by this browser.");
                }
            });
        });
    });

</script>

@endsection
@section('scripts')





<script>
    $(function () {

    });

    function confirmDelete(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You want to delete this member!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#aaa',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $('#deleteRecord' + id).submit();
            }
        })
    }

</script>



@endsection
