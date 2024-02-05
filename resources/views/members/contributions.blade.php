@extends('layouts.dashboard')
@section('title', 'Channels')

@section('content')
<div class="row">
    <div class="col-lg-12">

        <div class="card card-primary card-outline">
            <div class="card-header">
                <h5 class="card-title m-0">Transactions</h5>

            </div>
            <div class="card card-primary card-outline">
                <div class="card-header">



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
                                    <td colspan="8">No contributions found</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="d-flex justify-content-center">

                </div>
            </div>

            <div class="row">

                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small card -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>
                                <!-- KES 100,000 -->
                            </h3>

                            <h6>Tithe contribution (total)</h6>
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
                                <!-- KES 180,000 -->

                            </h3>

                            <h6>Collection contribution (total)</h6>
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
                            <h3>
                                <!-- 0 -->
                            </h3>

                            <h6>Any other contribution</h6>
                        </div>
                        <div class="icon">
                            <i class="fas fa-chart-pie"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <div class="d-flex justify-content-center">



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
            text: "You want to delete this channel!",
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