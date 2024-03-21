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
            <div class="col-lg-12">






                @if(auth()->user()->team==null && auth()->user()->team_status==0)

                <div class="card card-primary card-outline alert alert-danger" style="text-align: left;" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <p>You are currently not enrolled to a team, Click here to select a team and join one today</p>
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



                <div class="card card-primary card-outline alert alert-success">

                    <h4>Bishop Announcement</h4>
                    <span style="text-align:center;"> Welcome to New Breed City Chapel.</span>
                </div>


                <div class="card card-primary card-outline alert alert-success">

                    <h4>Leader Announcement</h4>
                    <marquee> 📣 We are pleased to announce the marriage of brother benard which will happen on 14th feb
                        2024 at new breed chapel starting from 10am.</marquee>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-md-6 card card-primary card-outline">
                <div class="card-header">
                    <a href="/memberleaverequest" type="submit" class="btn btn-primary btn-block">
                        <i class="fas fa-add"></i> Request Leave
                    </a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <h5 class="card-title m-0">My Leaves</h5>
                        <table class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>

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
                                    <td>{{ $leave->from }}</td>
                                    <td>{{ $leave->to }}</td>
                                    <td>{{ $leave->reason }}</td>

                                    <td>

                                        @if($leave->status==0)
                                        <span class="badge bg-warning text-dark">Pending</span>
                                        @elseif($leave->status==1)
                                        <span class="badge bg-success">Approved</span>
                                        @else
                                        <span class="badge bg-success">Rejected</span>

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


                        <button type="submit" class="btn btn-primary btn-block">
                            <i class="fas fa-add"></i> Upcoming Meetings
                        </button>



                    </div>

                    <div class="card-body">
                        <div class="table-responsive">

                            <table class="table table-bordered table-striped table-sm">
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
                                    <?php $meetings = App\Meeting::all() ?>

                                    @foreach($meetings as $meeting)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $meeting->title }}</td>
                                        <td>{{ $meeting->description }}</td>
                                        <td>{{ $meeting->venue }}</td>
                                        <td>{{ $meeting->datetime }}</td>
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
                    <button type="submit" class="btn btn-primary btn-block">
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
                                    <th>Event Details</th>
                                    <th>Location</th>
                                    <th>Date</th>
                                    <th>Time</th>

                                </tr>
                            </thead>
                            <tbody>
                                <!-- Scheduled eventss will be inserted here -->
                                <?php $events = App\Event::all() ?>

                                @foreach($events as $event)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $event->title }}</td>
                                    <td>{{ $event->details }}</td>
                                    <td>{{ $event->location }}</td>
                                    <td>{{ $event->date }}</td>
                                    <td>{{ $event->time }}</td>
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


                        <button type="submit" class="btn btn-primary btn-block">
                            <i class="fas fa-add"></i> My attendance History
                        </button>



                    </div>

                    <div class="card-body">
                        <div class="table-responsive">

                            <table class="table table-bordered table-striped table-sm">
                                <thead>
                                    <tr>

                                        <th>Member</th>
                                        <th>Status</th>


                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td colspan="8">No attendance history found</td>
                                    </tr>

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
                    <button type="submit" class="btn btn-primary btn-block">
                        <i class="fas fa-add"></i> Upcoming events
                    </button>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <h5 class="card-title m-0">Upcoming events</h5>
                        <table class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>

                                    <th>Event description</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Status</th>

                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td colspan="8">No upcoming event found found</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>


            <div class="col-md-6">


                <div class="card card-primary card-outline">
                    <div class="card-header">


                        <button type="submit" class="btn btn-primary btn-block">
                            <i class="fas fa-add"></i> Upcoming birthdays
                        </button>



                    </div>

                    <div class="card-body">
                        <div class="table-responsive">

                            <table class="table table-bordered table-striped table-sm">
                                <thead>
                                    <tr>

                                        <th>Member</th>
                                        <th>Date of Celebration</th>


                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td colspan="8">No Upcoming birthday</td>
                                    </tr>

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

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                        <option value="{{ $team->id }}">{{ $team->team }}</option>
                                        @endforeach
                                        <!-- Add more options as needed -->
                                    </select>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <!-- Use Bootstrap spacing class to add margin top -->
                                <div class="col-md-6">
                                    <!-- Use appropriate col classes for responsive layout -->
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                                <br>
                                <div class="col-md-6">
                                    <!-- Use appropriate col classes for responsive layout -->
                                    <button type="submit" class="btn btn-primary">Submit for Approval</button>
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


@endsection
@section('scripts')


<script>
    $(function() {

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