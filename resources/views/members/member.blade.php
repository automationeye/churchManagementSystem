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




                <br><br>

                @if(auth()->user()->team==null && auth()->user()->team_status==0)

                    <div class="card card-primary card-outline alert alert-danger" style="text-align: center;"
                        data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <p>You are currently not enrolled to a team, Click here to select a team and join one today</p>
                    </div>
                @elseif(auth()->user()->team_status==0)

                    <div class="card card-primary card-outline alert alert-warning" style="text-align: center;">
                        You belong to team {{ auth()->user()->team }} but awaiting confirmation from admin
                    </div>

                @else

                    <div class="card card-primary card-outline alert alert-success" style="text-align: center;">
                        You belong to team {{ auth()->user()->team }}
                    </div>

                @endif

                <div class="card card-primary card-outline alert alert-success">
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
                                    <label for="teamSelect" class="form-label">Select Team</label>
                                    <select class="form-control" id="teamSelect" name="team">
                                        <option value="1">Team 1</option>
                                        <option value="2">Team 2</option>
                                        <option value="3">Team 3</option>
                                        <option value="4">Team 4</option>
                                        <option value="5">Team 5</option>
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