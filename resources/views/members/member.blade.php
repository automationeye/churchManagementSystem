@extends('layouts.dashboard')

@section('content')


<div class="row">
    <div class="col-lg-3 col-6">
        <!-- small card -->
        <div class="small-box bg-danger">
            <div class="inner">

                @if(auth()->user()->team==null)
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Select team
                </button>

                @else
                <h3>
                    {{ auth()->user()->team }}

                </h3>
                @endif
                <p>My Team</p>
            </div>
            <div class="icon">
                <i class="fas fa-user-plus"></i>
            </div>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small card -->
        <div class="small-box bg-danger" style="filter: opacity(0);">
            <div class="inner">
                <h3>KES 100,000</h3>

                <p>Tithe contribution (total)</p>
            </div>
            <div class="icon">
                <i class="fas fa-money-bill"></i>
            </div>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small card -->
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>
                    KES
                    180,000

                </h3>

                <p>Collection contribution (total)</p>
            </div>
            <div class="icon">
                <i class="fas fa-wallet"></i>
            </div>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small card -->
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>0</h3>

                <p>Any other contribution</p>
            </div>
            <div class="icon">
                <i class="fas fa-chart-pie"></i>
            </div>
        </div>
    </div>
    <!-- ./col -->
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

        <div class="card card-primary card-outline">
            <div class="card-header">
                <h5 class="card-title m-0">Transactions</h5>
                <div class="card-tools">

                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-sm">
                        <thead>
                            <tr>

                                <th>TransactionType</th>
                                <th>TransID</th>
                                <th>TransAmount</th>
                                <th>Member</th>
                                <th>Channel</th>
                                <th>Phone</th>
                                <th>FirstName</th>
                                <th>created at</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td colspan="8">No transactions found</td>
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