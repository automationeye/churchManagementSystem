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
                <div class="card card-primary card-outline alert alert-success">
                    <marquee> 📣 We are pleased to announce the marriage of brother benard which will happen on 14th feb
                        2024 at new breed chapel starting from 10am.</marquee>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-md-6 card card-primary card-outline">
                <div class="card-header">
                    <button type="submit" class="btn btn-primary btn-block">
                        <i class="fas fa-add"></i> Request Leave
                    </button>
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

                                <tr>
                                    <td colspan="8">No Leave found found</td>
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

                            <div class="md-6">
                                <label for="teamSelect" class="form-label">Select Team</label>
                                <div class="col-md-2 mb-2">
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



                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit for Approval</button>
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
