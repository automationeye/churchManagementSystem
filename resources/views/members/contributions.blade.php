@extends('layouts.dashboard')

@section('content')

<div class="page-title-wrap typo-white">
    <div class="page-title-wrap-inner section-bg-img" data-bg="">
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


            <div class="row">
                <div class="col-md-6 card card-primary card-outline">
                    <div class="card-header">
                        <button type="submit" class="btn btn-primary btn-block">
                            <i class="fas fa-add"></i> Contributions
                        </button>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <h5 class="card-title m-0">My Contribution</h5>
                            <table class="table table-bordered table-striped table-sm">
                                <thead>
                                    <tr>

                                        <th>Tithe</th>
                                        <th>Offering</th>
                                        <th>Thanksgiving</th>


                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td colspan="8">No Contributions found</td>
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
                                <i class="fas fa-add"></i> Any Other Contribution
                            </button>



                        </div>

                        <div class="card-body">
                            <div class="table-responsive">

                                <table class="table table-bordered table-striped table-sm">
                                    <thead>
                                        <tr>

                                            <th>Name</th>
                                            <th>Date </th>


                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <td colspan="8">No Contributions found</td>
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
                <div class="col-lg-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h5 class="card-title m-0">Search Transaction</h5>
                        </div>
                        <div class="card-body">
                            <form class="row" method="GET">
                                <div class="col-md-2 mb-2">
                                    <input type="text" class="form-control" name="TransID" placeholder="Transaction ID">
                                </div>
                                <div class="col-md-2 mb-2">
                                    <input type="text" class="form-control" name="BillRefNumber" placeholder="Account number">
                                </div>
                                <div class="col-md-2 mb-2">
                                    <input type="text" class="form-control" name="MSISDN" placeholder="Phone number">
                                </div>


                                <div class="col-md-2 mb-2">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        <i class="fas fa-search"></i> Search
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div><!-- /.card -->



                    <div class="row">
                        <div class="col-md-6 card card-primary card-outline">
                            <div class="card-header">
                                <button type="submit" class="btn btn-primary btn-block">
                                    <i class="fas fa-add"></i> Transactions
                                </button>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <h5 class="card-title m-0">My Transactions</h5>
                                    <table class="table table-bordered table-striped table-sm">
                                        <thead>
                                            <tr>

                                                <th>Tithe</th>
                                                <th>Offering</th>
                                                <th>Thanksgiving</th>


                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                <td colspan="8">No Transactions found</td>
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
                                        <i class="fas fa-add"></i> Any Other Transactions
                                    </button>



                                </div>

                                <div class="card-body">
                                    <div class="table-responsive">

                                        <table class="table table-bordered table-striped table-sm">
                                            <thead>
                                                <tr>

                                                    <th>Name</th>
                                                    <th>Date </th>


                                                </tr>
                                            </thead>
                                            <tbody>

                                                <tr>
                                                    <td colspan="8">No Transactions found</td>
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
                                <form class="form-group" method="POST" action="{{url('update/team')}}">
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
    </div>

    @endsection
    @section('scripts')


    <script>
        $(function() {

        });

        function confirmDelete(id) {
            Swal.fire({
                title: 'Are you sure?',
                <<
                <<
                <<
                <
                HEAD
                text: "You want to delete this channel!",
                ===
                ===
                =
                text: "You want to delete this member!",
                >>>
                >>>
                >
                origin / main
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
    <<<<<<< HEAD=======>>>>>>> origin/main
        @endsection